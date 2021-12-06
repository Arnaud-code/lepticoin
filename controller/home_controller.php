<?php 

namespace App\Controller;

//Gestion de la déconnexion
if (isset($_GET['logout'])) {
    unset($_COOKIE['user']); 
    setcookie('user', '', -1); 
}

