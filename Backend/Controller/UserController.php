<?php
namespace App\Backend\Controller;
use App\Backend\Model\User;
use App\Backend\Repository\UserRepository;

class UserController {

    public function getUsers(){

        $users = [];
        $query = UserRepository::getUsers();
        
    }

    public function insertUsers(User $user){



    }

    public function updateUsers(){}

    public function deleteUsers(){}

}