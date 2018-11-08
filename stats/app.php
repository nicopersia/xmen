<?php

/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Google\Cloud\Datastore\DatastoreClient;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// create the Silex application
$app = new Application();

$app['datastore'] = function () use ($app) {
    $projectId = $app['project_id'];
    # [START gae_flex_datastore_client]
    $datastore = new DatastoreClient([
        'projectId' => $projectId
    ]);
    # [END gae_flex_datastore_client]
    return $datastore;
};

$app->get('/', function (Application $app, Request $request) {

    if (empty($app['project_id'])) {
        return 'Set the GCLOUD_PROJECT environment variable to run locally';
    }
    /** @var \Google_Service_Datastore $datastore */
    $datastore = $app['datastore'];

    $countNm=0;$countM=0;

    # [START gae_flex_datastore_query]
    // Query recent visits.
    $query = $datastore->query()
        ->kind('mutantes')
        ->filter('is_mutant', '=', true);
        // ->order('timestamp', 'DESCENDING')
        //->limit(10);
    $results = $datastore->runQuery($query);
    //$visits = [];
    foreach ($results as $entity) {
        $countM+=1;
        // $visits[] = sprintf('Dna: %s Addr: %s',
        //     $entity['dna'],
        //     ($entity['isMutant']) == true ? 1 : 0);
    }
    $query = $datastore->query()
        ->kind('mutantes')
        ->filter('is_mutant', '=', false);
        // ->order('timestamp', 'DESCENDING')
        //->limit(10);
    $results = $datastore->runQuery($query);
    //$visits = [];
    foreach ($results as $entity) {
        $countNm+=1;
        // $visits[] = sprintf('Dna: %s Addr: %s',
        //     $entity['dna'],
        //     ($entity['isMutant']) == true ? 1 : 0);
    }
    $resultado = [
        "count_mutant_dna" => $countM,
        "count_human_dna" => $countNm,
        "ratio" => ($countM >= $countNm) ? round(($countNm / $countM),2) : round(($countM / $countNm),2) 
    ];

    # [END gae_flex_datastore_query]
    // array_unshift($visits, "Ultimos 10 registros:");
     return new Response(json_encode($resultado), 200,
         ['Content-Type' => 'Content-Type: application/json']);
});

return $app;
