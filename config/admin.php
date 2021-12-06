<?php 

// Vérification des droits de l'utilisateur
if (!(!!$_SESSION["users"] && $_SESSION['users']->role === "1")) header("location: ?page=home");

