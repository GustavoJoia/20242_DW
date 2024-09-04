<?php
namespace App\Backend;
require(__DIR__.'/../vendor/autoload.php');

$metodo = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

switch ($metodo) {
    default:
        http_response_code(200);
        echo json_encode(
            ['status' => false, 'message' => 'Erro na solicitação.']
        );
        break;

    case 'GET':
        if ($uri === '/Backend/index.php') {
            http_response_code(201);
            echo json_encode(
                ['status' => true, 'message' => 'Chegou com sucesso']
            );
        }
        break;

    case 'POST':
        if ($uri === '/Backend/index.php') {
            $input = json_decode(file_get_contents('php://input'), true);
            http_response_code(202);
            echo json_encode(
                ['message' => 'Usuário criado.', 'user' => $input]
            );
        }
        break;

    case 'PUT':
        if (preg_match('/Backend/index.php/', $uri, $matches)) {
            $id = $matches[1];
            $input = json_decode(file_get_contents('php://input'), true);
            $users[$id] = $input;
            http_response_code(203);
            echo json_encode(
                ['status' => true, 'message' => 'Usuário atualizado.', 'users' => $input]
            );
        }
        break;

    case 'DELETE':
        if (preg_match('/Backend/index.php/', $uri, $matches)) {
            $id = $matches[1];
            unset($users[$id]);
            http_response_code(204);
            echo json_encode(
                ['status' => true, 'message' => 'Usuário deletado.']
            );
        }
        break;
}