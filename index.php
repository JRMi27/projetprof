<?php

require_once "View/v_header.php";
require_once "Model/connexionBdd.php";
require_once "Controller/c_accueil.php";
require_once "Controller/c_stagiaire.php";

$database = new Database();
$db = $database->getBdd();

$action = $_GET["action"] ?? "accueil";

$ca = new ControllerAccueil($db);
$cs = new ControllerStagiaire($db);

switch($action){
    case "accueil":
        require_once $ca->c_showFormations(); // TODO : modifier (pour la fonctionnalité connexion, pour l'insta,nt cela importe seulement la fonctionnalité showFormations)
        break;
    case "createAccount":
        require_once $cs->c_createAccount(); // TODO : régler le problème "permission denied"
        break;
    case "test":
        require_once "View/test.php";
        break;
}

require_once "View/v_footer.php";

?>