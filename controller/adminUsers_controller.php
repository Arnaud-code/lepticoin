<?php

// Vérification de l'enregistrement de l'utilisateur
require_once 'config/auth.php';

// Vérification des droits de l'utilisateur
require_once 'config/session.php';
require_once 'config/admin.php';

// Récupération de la BDD
$ur = new UserRepository($pdo);
$pr = new ProductRepository($pdo);

$users = $ur->findAll()->fetchAll();

// Préparation des données à afficher
foreach($users as $user) {
    $user->qActiv = count($pr->findBySeller($user->id, "(0)")->fetchAll());
    $user->qTrash = count($pr->findBySeller($user->id, "(1)")->fetchAll());
    if ($user->role === "1") {
        $user->roleName = "Administrateur";
    } else {
        $user->roleName = "Utilisateur";
    }
}

