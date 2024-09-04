<?php
namespace App\Backend;
use App\Backend\Controller\UserController;

require_once '../vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

switch($method){
    default:
        http_response_code(204);
        echo json_encode(['status' => false, 'message'=> 'Erro na requisição']);
        break;
    case 'GET':
        switch($uri){
            case '/users':
                $controller = new UserController();
                $users = $controller->getUsers();
                if($users){
                    http_response_code(200);
                    echo json_encode(['status' => true, 'message'=> 'Recebido com sucesso', 'uri'=> $uri]);
                } else {
                    http_response_code(204);
                    echo json_encode(['status' => false, 'message'=> 'Recebido com falhas', 'users'=> []]);
                }
            break;
            case '/produtos':
                http_response_code(200);
                echo json_encode(['status' => true, 'message'=> 'Recebido com sucesso', 'uri'=> $uri]);
            break;
        }
    break;
    case 'POST':
        switch($uri){
            case '/users':
                $data = json_decode(file_get_contents('php://input'), true);
                http_response_code(200);
                echo json_encode(['status' => true, 'message'=> 'Recebido com sucesso', 'uri'=> $uri]);
                break;
            case '/produtos':
                $data = json_decode(file_get_contents('php://input'), true);
                http_response_code(200);
                echo json_encode(['status' => true, 'message'=> 'Recebido com sucesso', 'uri'=> $uri]);
                break;
            default:
                echo json_encode(['URI invalido']);
        }
    break;
    case 'PUT':
        case '/produtos':
            if(preg_match('/\users\(\d+)/', $uri, $match)){
                $id = $match[1];
                $data = json_decode(file_get_contents('php://input'), true);
                http_response_code(200);
                echo json_encode(['status' => true, 'message'=> 'Produto atualizado com sucesso', 'id'=> $id]);
            }
            break;
    break;
    case 'DELETE':
        case '/produtos':
            if(preg_match('/\users\(\d+)/', $uri, $match)){
                $id = $match[1];
                $data = json_decode(file_get_contents('php://input'), true);
                http_response_code(200);
                echo json_encode(['status' => true, 'message'=> 'Produto removido com sucesso', 'id'=> $id]);
            }
            break;
    break;
}

