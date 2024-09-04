<?php
namespace App\Backend\Controller;
use App\Backend\Model\User;

class UserController {

    public function getUsers(){
        $u1 = new User(1,'Joia',19);
        $u2 = new User(2,'Fefa',18);
        return [
            $u1,
            $u2
        ];
    }

    public function insertUsers(User $user){}

    public function updateUsers(){}

    public function deleteUsers(){}

}