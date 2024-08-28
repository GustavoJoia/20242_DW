<?php
namespace App\Backend\Router;

class Carro{

    private String $nome;
    
    public function __construct(String $nome){
        $this->nome = $nome;
    }

    public function visualizar() : String{
        return 'Oi, eu sou '.$this->nome.', um carro!';
    }

}