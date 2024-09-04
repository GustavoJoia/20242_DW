<?php
namespace App\Backend\Model;

class User {

    private int $id;
    private String $nome;
    private int $idade;

    public function __construct(int $id, String $nome, int $idade){
        $this->$id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setNome(String $nome){
        $this->nome = $nome;
    }

    public function setIdade(int $idade){
        $this->idade = $idade;
    }

}