<?php

// Vérification de la présence d'un id
if (!!!$_GET['id']) header('Location: ?page=products');

// Récupération des BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);
$ur = new UserRepository($pdo);

// Préparation des données à afficher
$product = $pr->findBy($_GET['id'])->fetch();

$product->categoryName = $cr->findBy($product->categoryId)->fetch()->name;
$product->sellerAlias = $ur->findBy($product->seller)->fetch()->alias;
$product->price /= 100;
