<?php
namespace App\Backend;
require(__DIR__.'/../vendor/autoload.php');

$metodo = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if($metodo==='GET' && $uri==='/Backend/index.php'){
    http_response_code(200);
    echo json_encode(
        ['status'=>true, 'message'=> 'Chegou com sucesso']
    );
} elseif ($metodo==='POST' && '/Backend/index.php'){
    $input = json_decode(file_get_contents('php://input'), true);
    http_response_code(201);
    echo json_encode(
        ['message'=>'Usuário criado.', 'user'=>$input]
    );
} elseif($metodo==='PUT' && preg_match('/Backend/index.php', $uri, $matches)){
    $id = $matches[1];
    $input = json_decode(file_get_contents('php://input'),true);
    $users[$id] = $input;
    http_response_code(200);
    echo json_encode(
        ['status'=>true,'message'=>'Usuário atualizado.','users'=>$input]
    );
} elseif($metodo==='DELETE' && preg_match('/Backend/index.php',$uri, $matches)){
    $id = $matches[1];
    unset($users[$id]);
    http_response_code(204);
    echo json_encode(
        ['status'=>true,'message'=>'Usuário deletado.']
    );
}