<?php
namespace App\Backend\Controller;

class UserController {

    public function getUsers(){
        return [
            ['nome'=> 'Joia', 'idade'=> 19],
            ['nome'=>'Fefa', 'idade'=> 18]
        ];
    }

    public function insertUsers(){}

    public function updateUsers(){}

    public function deleteUsers(){}

}