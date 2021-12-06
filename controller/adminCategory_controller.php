<?php

// Vérification de l'enregistrement de l'utilisateur
require_once 'config/auth.php';

// Vérification des droits de l'utilisateur
require_once 'config/session.php';
require_once 'config/admin.php';

// Initialisation de la variable message
$message = "";

// Récupération de la BDD
$cr = new CategoryRepository($pdo);

// Identification Modification/Nouvelle catégorie
if (isset($_GET["id"])) {
    if (empty($_GET["id"])) {
        header("location:?page=adminCategory");
    } else {
        $categoryId = $_GET["id"];
        $categoryData = $cr->findBy($categoryId)->fetch();
        $category = new Category(
            $categoryData->id,
            $categoryData->name,
            $categoryData->slug,
            $categoryData->description,
            $categoryData->sort
        );
    }
}

// Traitement de la requête
if (isset($_POST["request"])) {

    // Vérification de la saisie des informations
    $msgDetails = "";
    $isValid = true;
    if (!(isset($_POST["categoryName"]) && !empty($_POST["categoryName"]))) {
        $isValid = false;
        $msgDetails = "nom manquant";
    }
    if (!(isset($_POST["categorySlug"]) && !empty($_POST["categorySlug"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "slug manquant";
    }
    if (!(isset($_POST["categoryDescription"]) && !empty($_POST["categoryDescription"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "description manquante";
    }
    if (!(isset($_POST["categorySort"]) && !empty($_POST["categorySort"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "ordre manquant";
    }
    
    // Envoi de la requête
    if ($isValid) {
        $category = new Category(
            isset($_GET["id"]) ? $_GET["id"] : null,
            $_POST["categoryName"],
            $_POST["categorySlug"],
            $_POST["categoryDescription"],
            $_POST["categorySort"]
        );

        // Modification catégorie
        if (isset($_GET["id"])) {
            $cr->update($category);

        // Ajout catégorie
        } else {
            $cr->insert($category);
            $categoryId = $cr->lastInsert();
        }
        // Redirection vers page catégories
        // echo ('<pre>');
        // var_dump($category);
        // echo ('</pre>');
        header("location:?page=adminCategories");

    } else {
        $message = "Informations incorrectes : " . $msgDetails;
    }
}