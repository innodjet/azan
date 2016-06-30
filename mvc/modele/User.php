<?php


class User{

    private $id;
    protected $nom;
    protected $prenom;
    protected $sexe;
    protected $pseudo;
    protected $dateCreation;
    protected $telephone;
    protected $email;
    protected $password;


    public function __construct(){

        $num = func_num_args();

        switch ($num) {
            case 8:
                $this->id = func_get_arg(0);
                $this->nom = func_get_arg(1);
                $this->prenom = func_get_arg(2);
                $this->sexe = func_get_arg(3);
                $this->pseudo = func_get_arg(4);
                $this->dateCreation = func_get_arg(5);
                $this->telephone = func_get_arg(6);
                $this->email = func_get_arg(7);
                break;

            case 5:
                $this->pseudo = func_get_arg(0);
                $this->sexe = func_get_arg(1);
                $this->email = func_get_arg(2);
                $this->login = func_get_arg(3);
                $this->password = func_get_arg(4);
                break;

            case 2:
                $this->id = func_get_arg(0);
                $this->password = func_get_arg(1);
                break;

            case 7:
                $this->pseudo = func_get_arg(0);
                $this->telephone = func_get_arg(1);
                $this->sexe = func_get_arg(2);
                $this->email = func_get_arg(3);
                $this->prenom = func_get_arg(4);
                $this->nom = func_get_arg(5);
                $this->id = func_get_arg(6);
                break;

            case 8:
                $this->id = func_get_arg(0);
                $this->nom = func_get_arg(1);
                $this->prenom = func_get_arg(2);
                $this->sexe = func_get_arg(3);
                $this->pseudo = func_get_arg(4);
                $this->dateCreation = func_get_arg(5);
                $this->telephone = func_get_arg(6);
                $this->email = func_get_arg(7);
                break;

            default:
        }

    }


    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }


    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }


    public function getDateCreation()
    {
        return $this->dateCreation;
    }


    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }




}