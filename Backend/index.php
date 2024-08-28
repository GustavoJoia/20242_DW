<?php
namespace App\Backend;

require(__DIR__.'/../vendor/autoload.php');

use App\Backend\Router\Carro;

$carro = new Carro('Relampago Marquinhos');

echo($carro->visualizar());