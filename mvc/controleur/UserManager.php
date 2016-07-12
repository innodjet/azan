<?php

include_once 'autoload.php';

class UserManager{

    private $pdo;

    public function __construct($pdo){
        $this->setPdo($pdo);
    }


    public function createUser(User $user){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("INSERT INTO user(pseudouser,datecreation,sexe,email,password)
            VALUES (:pseudo, :date, :sexe, :email, :password)");

            $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
            $req->bindValue(':date', $user->getDateCreation());
            $req->bindValue(':sexe', $user->getSexe(), PDO::PARAM_STR);
            $req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $req->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);

            $req->execute();
            $pdo->commit();

        } catch (Exception $ex) {
            $pdo->rollback();
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            echo "Error: " . $req . "<br>" . $pdo->error;

            exit();
        }

    }

    public function updateUser(User $user){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("UPDATE user set pseudouser :pseudo, telephone = :telephone, sexe= :sexe,
                 email= :email, prenomuser= :prenom,  nomuser= :nom  WHERE id= :id");

            $req->bindValue(':telephone', $user->getTelephone(), PDO::PARAM_STR);
            $req->bindValue(':sexe', $user->getSexe(), PDO::PARAM_STR);
            $req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $req->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
            $req->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
            $req->bindValue(':id', $user->getId(), PDO::PARAM_INT);
            $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);

            $req->execute();
            $pdo->commit();

        } catch (Exception $ex) {
            $pdo->rollback();
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            echo "Error: " . $req . "<br>" . $pdo->error;

            exit();
        }

    }

    public function updateUserPassword(User $user){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("UPDATE user set password :password  WHERE id= :id");

            $req->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT), PDO::PARAM_STR);
            $req->bindValue(':id', $user->getId(), PDO::PARAM_INT);

            $req->execute();
            $pdo->commit();

        } catch (Exception $ex) {
            $pdo->rollback();
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            echo "Error: " . $req . "<br>" . $pdo->error;

            exit();
        }

    }

    public function deleteUser($id){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("DELETE FROM user WHERE iduser= :id");

            $req->bindValue(':id', $id, PDO::PARAM_INT);

            $req->execute();
            $pdo->commit();

        } catch (Exception $ex) {
            $pdo->rollback();
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            echo "Error: " . $req . "<br>" . $pdo->error;

            exit();
        }

    }

    public function checkLogin($login, $password){

        global $pdo;
        if(Utilities::VerifierAdresseMail(trim($login))==1){
            $column="email";
        }else{$column="pseudouser"; }

        $req = $pdo->prepare("select password from user where '".$column."' = :val ");
        $req->bindValue(':val', trim($login), PDO::PARAM_STR);
        $result = $req->execute();

        $data = $result->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password, $data["password"])){
            return $this->getUser($column, $login);
        }else{
            return null;
        }

    }

    public function getUser($column, $value){

        global $pdo;
        $req = $pdo->prepare("SELECT *  FROM  user WHERE ".$column." = :val ");
        $req->bindValue(':val', trim($value), PDO::PARAM_STR);
        $result = $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return new User($data["iduser"], $data["nomuser"], $data["prenomuser"], $data["sexe"], $data["pseudouser"],
            $data["datecreation"], $data["telephone"], $data["email"]);
    }

    public function getUserById($value){

        global $pdo;
        $req = $pdo->prepare("SELECT *  FROM  user WHERE iduser = :val ");
        $req->bindValue(':val', trim($value), PDO::PARAM_STR);
        $result = $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return new User($data["iduser"], $data["nomuser"], $data["prenomuser"], $data["sexe"], $data["pseudouser"],
            $data["datecreation"], $data["telephone"], $data["email"]);
    }

    public function exists($donne, $type)
    {
        global $pdo;
        $req = $pdo->prepare("SELECT COUNT(" . $type . ") FROM  user WHERE " . $type . " = :value ");
        $req->bindValue(':value', trim($donne), PDO::PARAM_STR);
        $result = $req->execute();

        if ($result) {
            $count = $req->fetchColumn();
        } else {
            trigger_error('Error executing statement.', E_USER_ERROR);
        }
        return $count;
    }

    public function getPdo(){
        return $this->pdo;
    }

    public function setPdo($pdo){
        $this->pdo = $pdo;
    }



}