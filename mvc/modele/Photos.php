<?php

include_once 'Evenement.php';

class Photos{

    private $id;
    protected $evenement;
    protected $lien;
    protected $sponsor;

    public function __construct(){

        $num = func_num_args();

        switch ($num) {
            case 4:
                $this->id = func_get_arg(0);
                if(func_get_arg(1) instanceof Evenement){
                    $this->evenement = func_get_arg(1);
                }
                $this->lien = func_get_arg(2);
                $this->sponsor = func_get_arg(3);
                break;

            case 3:
                $this->evenement = func_get_arg(0);
                $this->lien = func_get_arg(1);
                $this->sponsor = func_get_arg(2);
                break;

            default:
        }

    }


    public function getId(){
        return $this->id;
    }

    public function getEvenement()
    {
        return $this->evenement;
    }


    public function setEvenement($evenement){

        if($evenement instanceof Evenement){
            $this->evenement = $evenement;
        }

    }

    public function getLien()
    {
        return $this->lien;
    }


    public function setLien($lien)
    {
        $this->lien = $lien;
    }


    public function getSponsor()
    {
        return $this->sponsor;
    }

    public function setSponsor($sponsor)
    {
        $this->sponsor = $sponsor;
    }



}