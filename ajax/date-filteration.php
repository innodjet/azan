<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include_once '../mvc/modele/Connection.php';

$pdo = Connection::getConnexion();


if((!empty($_POST['startDate'])&&(!empty($_POST['endDate'])))) {	// Check whether the date is empty
    $startDate = date('Y-m-d',strtotime($_POST['startDate']));
    $endDate = date('Y-m-d',strtotime($_POST['endDate']));

    $req = $pdo->prepare("SELECT * FROM evenement WHERE datedbeve BETWEEN  '".$startDate."' AND '".$endDate."' ");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    $str = '<div class="media">';
    foreach($data as $key => $value){
        //echo $value["id"];

        $req = $pdo->prepare("SELECT p.lien FROM photos p, evenement e WHERE p.ideve=e.id and p.ideve = '".$value["id"]."'  ");
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


/*
    $result = mysqli_query($con,'SELECT * from countries where date between  "'.$startDate.'" and "'.$endDate.'"');  // Execute the query
    $num_rows = mysqli_num_rows($result); //Check whether the result is 0 or greater than 0.
    if($num_rows > 0){
        $str = '<div class="media">';
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){  //Fetching the data from the database
            $str.='<div class="well">
				<div class="row">
				<div class="col-sm-8">
				<a class="pull-left" href="#">
				<img class="media-object"  alt="64x64" style="height: 80px;" src="flag/'.strtolower($row['countries_iso_code']).'.png">
					</a><div class="media-body">
					<p id="cname"><strong>'.$row['countries_name'].'</strong></p>
					<p><strong>ISO Code :</strong>'.$row['countries_iso_code'].'</p>
					<p><strong>ISD Code :</strong>'.$row['countries_isd_code'].'</p>

					</div></div>
					<div class="col-sm-4"><p class="pull-right"><strong>Created Date: </strong>'.$row['date'].'</p></div>
					</div></div><hr>';
        }
        $str.= '</div>';
        echo $str;
    }else{
        echo "<p class='alert alert-warning'>No record found</p>";
    }
*/

} else{
    echo "<p class='alert alert-warning'>No record found</p>";
}
?>
