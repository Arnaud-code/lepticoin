<?php

// création d'un objet PDO
$bdd = 'mvc.db';
$bddPath = $hfs->pathCreate('s', ['sqlite', 'Data']) . $bdd;

try {
    $pdo = new PDO(
        'sqlite:' . $bddPath,
        null,
        null,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]
    );
} catch(Exception $e) {
    die('connection_unsuccessful: ' . $e->getMessage());
}
?>