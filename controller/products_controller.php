<?php

namespace App\Controller;

use App\Helper\HelperPDO;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;

$pdo = new HelperPDO();
$pdo->getPdo();

// Récupération des BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);
$ur = new UserRepository($pdo);

// Récupération de tous les produits
$allProducts = $pr->findAll()->fetchAll();

// Préparation des données à afficher
foreach ($allProducts as $product) {

    // Recherche de la catégorie
    $cat = $cr->findBy($product->categoryId)->fetch();
    $product->categoryName = $cat->name;

    // Conversion du prix
    $product->price /= 100;
    
    // Recherche du vendeur
    $sel = $ur->findBy($product->seller)->fetch();
    $product->sellerName = $sel->alias;
}