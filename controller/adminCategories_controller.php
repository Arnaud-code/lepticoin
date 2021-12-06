<?php

// Vérification de l'enregistrement de l'utilisateur
require_once 'config/auth.php';

// Vérification des droits de l'utilisateur
require_once 'config/session.php';
require_once 'config/admin.php';

// Récupération de la BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);

$categories = $cr->findAll()->fetchAll();

foreach ($categories as $category) {
    $category->qActiv = count($pr->findByCategory($category->id, "(0)")->fetchAll());
    $category->qTrash = count($pr->findByCategory($category->id, "(1)")->fetchAll());
}