<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\UserRepository;

// Récupération des BDD
$pr = new ProductRepository($pdo);
$ur = new UserRepository($pdo);

// Récupération de tous les vendeurs
$allSellers = $ur->findAll()->fetchAll();

// Préparation des données à afficher
foreach ($allSellers as $seller) {

    // Recherche du nombre de produits
    $seller->productsQuantity = count($pr->findBySeller($seller->id)->fetchAll());
}