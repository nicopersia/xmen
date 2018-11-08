<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE");
header("Access-Control-Allow-Headers: Origin, clientId, Authorization, X-Requested-With, content-type, auth_cookie");
header('Content-Type: application/x-www-form-urlencoded');

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

// Install composer dependencies with "composer install"
// @see http://getcomposer.org for more information.

require __DIR__.'/vendor/autoload.php';

$app = require __DIR__ . '/app.php';

$request_body = file_get_contents('php://input');

$datos = json_decode($request_body, true);

// Run the app!
// use "gcloud app deploy"
$app['dna'] = $datos['dna'];
$app['isMutant'] = $datos['isMutant'];
$app['debug'] = true;
$app['project_id'] = 'xmen-221503';
$app->run();
//mostrarRegistros();
