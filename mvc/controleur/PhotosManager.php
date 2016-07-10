<?php

include_once 'autoload.php';

class PhotosManager{


    private $pdo;


    public function __construct($pdo){
        $this->setPdo($pdo);
    }


    public function createPhtotos(Photos $photos){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("INSERT INTO photos(lien,sponsor,ideve) VALUES (:lien, :sponsor, :evenement)");

            $req->bindValue(':lien', $photos->getLien(), PDO::PARAM_STR);
            $req->bindValue(':sponsor', $photos->getSponsor(), PDO::PARAM_STR);
            $req->bindValue(':evenement', $photos->getEvenement(), PDO::PARAM_INT);

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

    public function updatePhotos(Photos $photos){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("UPDATE photos set lien :lien, sponsor = :sponsor, ideve= :evenement, WHERE id= :id ");

            $req->bindValue(':lien', $photos->getLien(), PDO::PARAM_STR);
            $req->bindValue(':sponsor', $photos->getSponsor(), PDO::PARAM_STR);
            $req->bindValue(':evenement', $photos->getEvenement(), PDO::PARAM_INT);
            $req->bindValue(':id', $photos->getId(), PDO::PARAM_INT);

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

    public function deletePhotos($id){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("DELETE FROM photos WHERE id= :id");

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


    public function getPdo(){
        return $this->pdo;
    }


    public function setPdo($pdo){
        $this->pdo = $pdo;
    }



}