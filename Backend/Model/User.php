<?php
namespace App\Backend\Model;

class User {

    private int $id;
    private string $name;
    private int $age;
    private string $signinDate;

    public function __construct(int $id, string $name, int $age) {
        $this->$id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getAge() : int {
        return $this->age;
    }

    public function getSigninDate() : string {
        $this->signinDate;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setAge(int $age){
        $this->age = $age;
    }

    public function setSigninDate(string $age){
        $this->age = $age;
    }

}