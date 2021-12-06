<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;

// Vérification de l'enregistrement de l'utilisateur
require_once 'config/auth.php';

// Vérification des droits de l'utilisateur
require_once 'config/session.php';
require_once 'config/admin.php';

// Initialisation de la variable message
$message = "";
// Récupération de la BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);
$ur = new UserRepository($pdo);

$categories = $cr->findAll()->fetchAll();
$sellers = $ur->findAll()->fetchAll();

// Identification Modification/Nouvelle catégorie
if (isset($_GET["id"])) {
    if (empty($_GET["id"])) {
        header("location:?page=adminProduct");
    } else {
        $productId = $_GET["id"];
        $productData = $pr->findBy($productId, "(0, 1)")->fetch();
        $product = new Product(
            $productData->id,
            $productData->categoryId,
            $productData->name,
            $productData->slug,
            $productData->description,
            $productData->seller,
            $productData->price / 100,
            $productData->trash
        );
    }
}

// Traitement de la requête
if (isset($_POST["request"])) {

    // Vérification de la saisie des informations
    $msgDetails = "";
    $isValid = true;
    if (!(isset($_POST["productName"]) && !empty($_POST["productName"]))) {
        $isValid = false;
        $msgDetails = "nom manquant";
    }
    if (!(isset($_POST["productCategoryId"]) && !empty($_POST["productCategoryId"]))) {
        $isValid = false;
        $msgDetails = "catégorie manquante";
    }
    if (!(isset($_POST["productSlug"]) && !empty($_POST["productSlug"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "slug manquant";
    }
    if (!(isset($_POST["productDescription"]) && !empty($_POST["productDescription"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "description manquante";
    }
    if (!(isset($_POST["productSeller"]) && !empty($_POST["productSeller"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "vendeur manquant";
    }
    if (!(isset($_POST["productPrice"]) && !empty($_POST["productPrice"]))) {
        $isValid = false;
        $alt = $msgDetails === "" ? "" : ", ";
        $msgDetails .= $alt . "prix manquant";
    }
    
    // Envoi de la requête
    if ($isValid) {
        $product = new Product(
            isset($_GET["id"]) ? $_GET["id"] : null,
            $_POST["productCategoryId"],
            $_POST["productName"],
            $_POST["productSlug"],
            $_POST["productDescription"],
            $_POST["productSeller"],
            str_replace(",", ".", $_POST["productPrice"]) * 100,
            isset($_POST["productTrash"]) ? 1 : 0
        );

        // Modification catégorie
        if (isset($_GET["id"])) {
            $pr->update($product);

        // Ajout catégorie
        } else {
            $pr->insert($product);
            $productId = $pr->lastInsert();
        }
        // Redirection vers page catégories
        // echo ('<pre>');
        // var_dump($product);
        // echo ('</pre>');
        // echo($_POST['productTrash']);
        header("location:?page=adminProducts");

    } else {
        $message = "Informations incorrectes : " . $msgDetails;
    }
}