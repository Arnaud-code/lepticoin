<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;

// Vérification de l'enregistrement de l'utilisateur
require_once 'config/auth.php';

// Vérification des droits de l'utilisateur
require_once 'config/session.php';
require_once 'config/admin.php';

// Récupération de la BDD
$pr = new ProductRepository($pdo);
$cr = new CategoryRepository($pdo);
$ur = new UserRepository($pdo);

$products = $pr->findAll("(0, 1)")->fetchAll();

foreach ($products as $product) {
    $product->categoryName = $cr->findBy($product->categoryId)->fetch()->name;
    $product->sellerAlias = $ur->findBy($product->seller)->fetch()->alias;
    $product->price /= 100;
}