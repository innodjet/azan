<?php

include_once 'autoload.php';

class EvenementManager{

    private $pdo;


    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function createEvenement(Evenement $evenement, $tab){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("INSERT INTO evenement(nomeve,lieueve,datepubeve,datedbeve,datefneve,
                                    contact,prix,description,iduser,idtype)
            VALUES (:nomeve, :lieueve, :datepubeve, :datedbeve, :datefneve, :contact, :prix, :description, :iduser, :idtype)");

            $req->bindValue(':nomeve', $evenement->getNom(), PDO::PARAM_STR);
            $req->bindValue(':lieueve', $evenement->getLieu(), PDO::PARAM_STR);
            $req->bindValue(':datepubeve', date("Y-m-d", strtotime($evenement->getDatePub())), PDO::PARAM_STR);
            $req->bindValue(':datedbeve', date("Y-m-d H:i:s", strtotime($evenement->getDateDb())), PDO::PARAM_STR);
            $req->bindValue(':datefneve',date("Y-m-d H:i:s", strtotime($evenement->getDateFn())), PDO::PARAM_STR);
            $req->bindValue(':contact', $evenement->getContact(), PDO::PARAM_STR);
            $req->bindValue(':prix', $evenement->getPrix(), PDO::PARAM_STR);
            $req->bindValue(':description', trim($evenement->getDesription()), PDO::PARAM_STR);
            $req->bindValue(':iduser', $evenement->getUser(), PDO::PARAM_INT);
            $req->bindValue(':idtype', $evenement->getTypePublication(), PDO::PARAM_INT);


            $req->execute();
            $lastId = $pdo->lastInsertId();


            $photoManager = new PhotosManager($pdo);
            foreach($tab as $value){
                $photos = new Photos($lastId, $value['typePhoto'], $value['fileName']);
                $photoManager->createPhtotos($photos);
            }


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