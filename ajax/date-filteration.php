<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include_once '../mvc/controleur/autoload.php';

$pdo = Connection::getConnexion();


if((!empty($_POST['startDate'])&&(!empty($_POST['endDate'])))) {	// Check whether the date is empty
    $startDate = date('Y-m-d',strtotime($_POST['startDate']));
    $endDate = date('Y-m-d',strtotime($_POST['endDate']));

    $req = $pdo->prepare("SELECT * FROM evenement WHERE datepubeve <= now() and datedbeve BETWEEN  '".$startDate."' AND '".$endDate."' ");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    if(!$data){
        echo "<p class='alert alert-warning'>Aucun résultat</p>";
    }else{
        $str = '<div class="media">';
        foreach($data as $key => $value){

            $req = $pdo->prepare("SELECT p.lien FROM photos p, evenement e, typephoto t
            WHERE p.ideve=e.id and p.typephoto = t.id and t.id = 5 and p.ideve = '".$value["id"]."'  ");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $photoData){
                //echo $photoData["lien"];

                $str.='<div class="well">
				<div class="row">
				<div class="col-sm-8">
				<a class="pull-left" href="#">
				<img class="media-object"  alt="64x64" style="height: 80px;" src="images/'.strtolower($photoData['lien']).'">
					</a><div class="media-body">
					<p id="cname"><strong>'.utf8_encode($value['nomeve']).'</strong></p>
					<p><strong>Lieu: </strong> '.utf8_encode($value['lieueve']).'</p>
					<p><strong>Contact :</strong> '.$value['contact'].'</p>

					</div></div>
					<div class="col-sm-4"><p class="pull-right"><strong>Date début: </strong>'.date_format(date_create($value['datedbeve']),"d-m-Y").' <strong>à</strong> '.date_format(date_create($value['datedbeve']),"H:i").'</p></div>
					</div></div><hr>';

            }
        }
        $str.= '</div>';
        echo $str;
    }






}else{
    echo "<p class='alert alert-warning'>Renseigner une date</p>";
}
?>
