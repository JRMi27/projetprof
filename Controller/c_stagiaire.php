<?php
require_once "Model/stagiaire.php";

class ControllerStagiaire {
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function c_createAccount(){

        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $stagiaire = new Stagiaire($this->db);

            $stagiaire->setNomStagiaire($_POST["createLastName"]);
            $stagiaire->setPrenomStagiaire($_POST["createFirstName"]);
            $stagiaire->setMailStagiaire($_POST["createMail"]);
            $stagiaire->setTelStagiaire($_POST["createTel"]);
            $stagiaire->setLogin($_POST["createLogin"]);
            $stagiaire->setPassword($_POST["createPassword"]);

            if($stagiaire->createAccount()){ ?>
                <h2>Votre compte a été créé avec succès</h2> <!-- TODO : remplacer le h2 par une vu !-->
            <?php
            } 

        } else {
            require_once "View/v_createAccount.php";
        }
    }
    
}
?>