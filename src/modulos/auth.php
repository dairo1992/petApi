<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$db = new db();
$dbConnecion = $db->conectDB();
$app->post('/auth/register', function (Request $request, Response $response) {
    global $datos, $dbConnecion;
    
    $json = json_encode($datos);
    $jsonvalid = (json_decode($json));
    // echo(json_decode($json));
    // echo $json->ID_USER;
    if($json == 'null'){
        $resp = "{'CODIGO: 0, 'MENSAJE': 'JSON INVALIDO'}";
        return $resp;
    }
    
    $sql = "CALL SP_REGISTER_USER(:json)";
    $stmt = $dbConnecion->prepare($sql);
    try {
        $stmt->bindParam(':json', $json, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    echo json_decode(json_encode($result[0]->JSON_ROW_OUT));
});

$app->post('/auth/login', function (Request $request, Response $response) {
    global $datos, $dbConnecion;
    $json = $datos;
    var_dump($json);
    // $sql = "CALL SP_OBTENER_USUARIO(:json)";
    // $stmt = $dbConnecion->prepare($sql);
    // try {
    //     $stmt->bindParam(':json', $json->ID_USER, PDO::PARAM_STR);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    // }
    // echo json_encode(json_decode($result[0]->V_JSON_OUT));
});
