<?php

// Vérification de la présence d'un id
if (!!!$_GET['id']) header('Location: ?page=products');

// Récupération des BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);
$ur = new UserRepository($pdo);

// Préparation des données à afficher
$products = $pr->findByCategory($_GET['id'])->fetchAll();
$categoryName = $cr->findBy($_GET['id'])->fetch()->name;

foreach ($products as $product) {
    $product->sellerName = $ur->findBy($product->seller)->fetch()->alias;
    $product->price /= 100;
}
