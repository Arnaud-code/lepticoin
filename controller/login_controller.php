<?php

// Initialisation du tableau des utilisateurs autorisés via la table admin
$userRepository = new UserRepository($pdo);
$_SESSION['users'] = $userRepository->findAll()->fetchAll();

$message = "";

if (isset($_POST['submitLogin'])) {

    $message = "Identifiants invalides";

    if (!empty($_POST['loginUser']) && !empty($_POST['userPassword'])) {
        foreach ($_SESSION['users'] as $user) {
            if ($_POST['loginUser'] == $user->mail && password_verify($_POST['userPassword'] , $user->password )) {
                setcookie('user', $user->surname . ' ' . $user->name, time() + 3600);
                session_start();
                $_SESSION['users'] = $user;
                header("location: ?page=home");
            } // TODO: vider users si pas de match
        }
    }
}
