<?php

// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

//!\\ A enlever lors du déploiement
// error_reporting(E_ERROR | E_PARSE);
// ini_set('display_errors', true);

// --------------------------- //
//          CONSTANTS          //
// --------------------------- //

// PATHS
// Pour fonctions d'inclusion php
define("PATH_FOR_PHP", substr($_SERVER['SCRIPT_FILENAME'], 0, -9));

// Pour images, fichiers etc (html)
define("PATH_FOR_HTML", substr($_SERVER['PHP_SELF'], 0, -9));

// Website informations
define("WEBSITE_NAME", "MVC");
define("WEBSITE_URL", "https://www.mvc.com");
define("WEBSITE_DESCRIPTION", "Projet PHP en MVC");
define("WEBSITE_LANGUAGE", "fr");
define("WEBSITE_AUTHOR", "Arnaud FLEURENTIN");
define("WEBSITE_AUTHOR_MAIL", "arnaud.fleurentin@gmail.com");
