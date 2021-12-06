<?php

// Récupération des BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);

// Récupération de tous les produits
$allCategories = $cr->findAll()->fetchAll();

// Préparation des données à afficher
foreach ($allCategories as $category) {

    // Récupération du nombre de produits
    $category->quantity = count($pr->findByCategory($category->id)->fetchAll());
    
}