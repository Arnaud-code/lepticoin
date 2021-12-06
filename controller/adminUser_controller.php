<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;

// Vérification de l'enregistrement de l'utilisateur
require_once 'config/auth.php';

// Vérification des droits de l'utilisateur
require_once 'config/session.php';
require_once 'config/admin.php';

// Initialisation de la variable message
$message = "";

// Récupération de la BDD
$ur = new UserRepository($pdo);

// Identification Modification/Nouvel utilisateur
if (isset($_GET["id"])) {
    if (empty($_GET["id"])) {
        header("location:?page=adminUser");
    } else {
        $userId = $_GET["id"];
        $userData = $ur->findBy($userId)->fetch();
        $user = new User(
            $userData->id,
            $userData->name,
            $userData->surname,
            $userData->alias,
            $userData->mail,
            "",
            $userData->role
        );
    }
}

// Traitement de la requête
if (isset($_POST["request"])) {

    // Vérification de la saisie des informations
    $msgDetails = "";
    $isValid = true;
    if (!(isset($_POST["userName"]) && !empty($_POST["userName"]))) {
        $isValid = false;
        $msgDetails = "nom manquant";
    }
    if (!(isset($_POST["userSurname"]) && !empty($_POST["userSurname"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "prénom manquant";
    }
    if (!(isset($_POST["userAlias"]) && !empty($_POST["userAlias"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "alias manquant";
    }
    if (!(isset($_POST["userMail"]) && !empty($_POST["userMail"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "mail manquant";
    }
    if (!(isset($_POST["userPassword"]) && !empty($_POST["userPassword"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "mot de passe manquant";
    }
    if (!(isset($_POST["userConfirm"]) && !empty($_POST["userConfirm"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "confirmation du mot de passe manquante";
    }
    if (!(isset($_POST["userRole"]) && !empty($_POST["userRole"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "rôle manquant";
    }
    if ($_POST["userPassword"] !== $_POST["userConfirm"]) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "mots de passe différents";
    }
    
    // Envoi de la requête
    if ($isValid) {
        $user = new User(
            isset($_GET["id"]) ? $_GET["id"] : null,
            $_POST["userName"],
            $_POST["userSurname"],
            $_POST["userAlias"],
            $_POST["userMail"],
            $_POST["userPassword"],
            $_POST["userRole"]
        );

        // Modification utilisateur
        if (isset($_GET["id"])) {
            $ur->update($user);

        // Ajout utilisateur
        } else {
            $ur->insert($user);
            $userId = $ur->lastInsert();
        }
        // Redirection vers page utilisateurs
        // echo ('<pre>');
        // var_dump($user);
        // echo ('</pre>');
        header("location:?page=adminUsers");

    } else {
        $message = "Informations incorrectes : " . $msgDetails;
    }
}