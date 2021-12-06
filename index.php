<?php 

use App\Helper\HelperBootstrap;
use App\Helper\HelperFileSystem;
use App\Helper\HelperSecurite;

require './vendor/autoload.php';

// inclusion des fichiers pricipaux
require_once "config/config.php";
// require_once "helper/HelperBootstrap.php";
// require_once "helper/HelperFileSystem.php";
// require_once "helper/HelperHtml.php";
// require_once "helper/HelperSecurite.php";
$hbs = new HelperBootstrap();
$hfs = new HelperFileSystem();
// $hh = HelperHtml::getSingleton();
$hs = new HelperSecurite();
// require_once "config/db.php";
require_once "config/session.php";

// Nom de l'application 
// $appName = "MVC";

// Définition de la route courante 
if (isset($_GET['page']) && !empty($_GET['page'])) {
    // Récupération de l'attribut page
    $page = trim($_GET['page']);
} else {
    // Page par défaut si aucune autre page est demandée
    $page = "home";
}

// Array contenant toutes les pages disponibles 
$pageList = scandir("controller/");

// Test si la page demandée par le visiteur est disponible
if (in_array($page . '_controller.php', $pageList)) {
    // Ajout des fichiers nécessaires au traitement de la demande du visiteur
    require_once 'model/' . $page . '_model.php';
    require_once 'controller/' . $page . '_controller.php';
    require_once 'view/' . $page . '_view.php';
} else {
    // Page demandée non disponible
    echo "Page demandée non disponible : erreur 404";
}
