<?php

use Google\Cloud\Datastore\DatastoreClient;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

function insertar($dna = array(), $isMutant){

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
    /** @var \Google_Service_Datastore $datastore */
    $datastore = $app['datastore'];

    // determine the user's IP
     $dna = $app['dna'];
     $isMutant = $app['isMutant'];

    //$dna = '["CCCAGC","GCTCGG","CTACAA","ATTGCT","GGCGGG","TCTTCG"]';
    //$isMutant = 1;

    # [START gae_flex_datastore_entity]
    // Create an entity to insert into datastore.
    $key = $datastore->key('mutantes');
    $entity = $datastore->entity($key, [
        'dna' => $dna,
        'is_mutant' => $isMutant,
    ]);
    $datastore->insert($entity);
    # [END gae_flex_datastore_entity]

//return $app;

}