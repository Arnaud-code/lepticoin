<?php 

//Gestion des Sessions 
if(!isset($_COOKIE['user'])) header("location: ?page=home");
