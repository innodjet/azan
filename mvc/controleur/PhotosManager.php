<?php

include_once 'autoload.php';

class PhotosManager
{


    private $pdo;


    public function __construct($pdo)
    {
        $this->setPdo($pdo);
    }


    public function createPhtotos(Photos $photos)
    {

        try {
            global $pdo;

            // $pdo->beginTransaction();
            $req = $pdo->prepare("INSERT INTO photos(ideve, typephoto, lien) VALUES (:evenement, :typephoto, :lien)");

            $req->bindValue(':evenement', $photos->getEvenement(), PDO::PARAM_INT);
            $req->bindValue(':typephoto', $photos->getTypePhoto(), PDO::PARAM_INT);
            $req->bindValue(':lien', $photos->getLien(), PDO::PARAM_STR);

            $req->execute();
            //$pdo->commit();

        } catch (Exception $ex) {
            $pdo->rollback();
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            echo "Error: " . $req . "<br>" . $pdo->error;

            exit();
        }

    }

    public function updatePhotos(Photos $photos)
    {

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

    public function deletePhotos($id)
    {

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

    public function getPhotosById($value){

        global $pdo;
        $req = $pdo->prepare("SELECT p.id, p.ideve, p.typephoto, p.lien  FROM  photos p, evenement e WHERE p.ideve = :val and p.ideve=e.id");
        $req->bindValue(':val', trim($value), PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $tab = array();
        foreach ($data as $value) {
            $tab[] = new Photos($value["id"], $value["ideve"], $value["typephoto"], $value["lien"]);
        }
//new Photos($data["id"], $data["ideve"], $data["typephoto"], $data["lien"]);

        return $tab;
    }

    public function getPhotoRepById($value){

        global $pdo;
        $req = $pdo->prepare("SELECT p.id, p.ideve, p.typephoto, p.lien  FROM  photos p, evenement e, typephoto t
       WHERE t.id=1 AND e.id = :val AND p.ideve=e.id AND t.id=p.typephoto");
        $req->bindValue(':val', trim($value), PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return new Photos($data["id"], $data["ideve"], $data["typephoto"], $data["lien"]);


    }


    public function getPdo()
    {
        return $this->pdo;
    }


    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }


}