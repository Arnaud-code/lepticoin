<?php

require_once 'config/auth.php';

// Récupération des BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);
$ur = new UserRepository($pdo);

// Gestion de l'action trash
if (isset($_GET['trash']) && isset($_GET['id'])) {
    $prod = $pr->findBy($_GET['id'], "(0, 1)")->fetch();
    $prod->trash = $prod->trash ? '0' : '1';
    $product = new Product(
        $prod->id,
        $prod->categoryId,
        $prod->name,
        $prod->slug,
        $prod->description,
        $prod->seller,
        $prod->price,
        $prod->trash);
    $pr->update($product);
    header("location: ?page=myProducts");
}

// Préparation des données
$products = $pr->findBySeller($_SESSION['users']->id, "(0, 1)")->fetchAll();

foreach ($products as $product) {
    $product->categoryName = $cr->findBy($product->categoryId)->fetch()->name;
    $product->price /= 100;
}