<?php

require_once "Model/formations.php";
require_once "Model/stagiaire.php";

class ControllerAccueil
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function c_showFormations()
    {
        $formation = new Formation($this->db);
        $stmt = $formation->showFormations();
        $lesFormations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once "View/v_accueil.php";
    }

    public function c_connexion()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            session_start();

            $stagiaire = new Stagiaire($this->db);
            $stagiaire->setMailStagiaire($_POST["connexionMail"]);
            $passwordInput = $_POST["connexionPassword"];

            $stmt = $stagiaire->connexion();
            $user = $stmt->fetch();

            if($user && password_verify($passwordInput, $user["password"])) {
                $_SESSION["user_id"] = $user["id"]; // se renseigner sur $_SESSION
                $_SESSION["user_name"] = $user["nomStagiaire"]; 
                $_SESSION["logged_in"] = true;

            } else { ?>
                <h2>Identifiant incorrecte</h2> <!-- TODO : remplacer le h2 !-->
            <?php
            }
            
        } 
    }
}
?>