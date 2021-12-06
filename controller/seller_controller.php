<?php

// Vérification de la présence d'un id
if (!!!$_GET['id']) header('Location: ?page=products');

// Récupération des BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);
$ur = new UserRepository($pdo);

// Récupération de tous les produits
$products = $pr->findBySeller($_GET['id'])->fetchAll();
$productsSeller = $ur->findBy($_GET['id'])->fetch();

// Préparation des données à afficher
foreach ($products as $product) {

    // Recherche de la catégorie
    $cat = $cr->findBy($product->categoryId)->fetch();
    $product->categoryName = $cat->name;

    // Conversion du prix
    $product->price /= 100;
}