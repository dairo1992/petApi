<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require './src/config/db.php';
// require './src/config/validar_token.php';

$app = new \Slim\App;
$header = getallheaders();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$datos = $request;


require './src/modulos/auth.php';

$app->run();