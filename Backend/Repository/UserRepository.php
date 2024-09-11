<?php
namespace App\Backend\Repository;
use App\Backend\Model\User;
use App\Backend\Database\Database;

class UserRepository{

    public static function insertUser(User $user) : array {

        $pdo = Database::connectMysql();

        $insert = 'INSERT INTO users(nameUser, ageUser) VALUES (?,?)';
        $prepare = $pdo->prepare($insert);
        $prepare->bindValue(1, $user->getName());
        $prepare->bindValue(2, $user->getAge());

        try{

            $prepare->execute();
            return ['status'=>true];

        } catch(PDOException $e){

            return ['status'=>false,'error'=> $e->getMesssage()];

        }

    }

    public static function getUsers() : array {

        $pdo = Database::connectMysql();

        $select = 'SELECT * FROM users';

        try{

            $query = $pdo->query($select);
            $lista = $query->fetchAll();
            $users = [];

            foreach ($lista as $key => $user) {
                $u = new User();
                $u->setId($user['idUser']);
                $u->setName($user['nameUser']);
                $u->setAge($user['ageUser']);
                $u->setSigninDate($user['signinDate']);
                array_push($users, $u);
            }
    
            return ['status'=>true, 'users'=>$users];

        } catch(PDOException $e){

            return ['status'=>false,'error'=> $e->getMesssage()];

        }    
    }

    public static function getUser(User $user) : array {

        $pdo = Database::connectMysql();

        $select = 'SELECT * FROM users WHERE idUser = ?';
        $prepare = $pdo->prepare($select);
        $prepare->bindValue(1, $user->getId());

        try{

            $prepare->execute();
            $lista = $query->fetch();
            $u = new User();
            $u->setId($lista['idUser']);
            $u->setName($lista['nameUser']);
            $u->setAge($lista['ageUser']);
            $u->setSigninDate($lista['signinDate']);
    
            return ['status'=>true, 'user'=>$u];

        } catch(PDOException $e){

            return ['status'=>false,'error'=> $e->getMesssage()];

        }    
    }

    public static function updateUser(User $user) : array {

        $pdo = Database::connectMysql();

        $update = 'UPDATE users SET nameUser = ?, ageUser = ? WHERE idUser = ?';
        $prepare = $pdo->prepare($update);
        $prepare->bindValue(1, $user->getName());
        $prepare->bindValue(2, $user->getAge());
        $prepare->bindValue(3, $user->getId());

        try{

            $prepare->execute();
            return ['status'=>true];

        } catch(PDOException $e){

            return ['status'=>false,'error'=> $e->getMesssage()];

        }

    }

    public static function deleteUser(User $user){

        $pdo = Database::connectMysql();

        $delete = 'DELETE FROM users WHERE idUser = ?';
        $prepare = $pdo->prepare($delete);
        $prepare->bindValue(1, $user->getId());

        try{

            $prepare->execute();
            return ['status'=>true];

        } catch(PDOException $e){

            return ['status'=>false,'error'=> $e->getMesssage()];

        }

    }

}