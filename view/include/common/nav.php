<!-- Configuration de la personnalisation utilisateur -->
<?php
    // session_start();
    if (isset($_COOKIE['user'])) {
        $dispName = $_COOKIE['user'];
        $logPage = 'home&logout';
        $logLabel = 'Se déconnecter';
        $logStyle = 'warning';
    } else {
        $dispName = '';
        $logPage = 'login';
        $logLabel = 'Se connecter';
        $logStyle = 'primary';
    };
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="?page=home">
            <img src="asset/img/logo-32x32.png" alt="" width="32" height="32">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse me-auto" id="navbar">
            <ul class="navbar-nav">
                <?= $hbs->bs5Li("home", "Accueil") ?>
                <?= $hbs->bs5Li("products", "Produits") ?>
                <?= $hbs->bs5Li("categories", "Catégories") ?>
                <?= $hbs->bs5Li("sellers", "Vendeurs") ?>
<?php
if (isset($_SESSION['users']) && $_SESSION['users']->role === "1") {
echo <<<HTML
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-outline-success" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Administrateur
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li disabled><a class="dropdown-item" href="?page=adminProducts">Produits</a></li>
                        <li class="disabled"><a class="dropdown-item" href="?page=adminCategories">Catégories</a></li>
                        <li><a class="dropdown-item" href="?page=adminUsers">Utilisateurs</a></li>
                    </ul>
                </li>
HTML;
}
?>
            </ul>
        </div>
        
        <div class="d-inline-flex">
<?php
if (isset($_COOKIE['user'])) {
echo <<<HTML
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-dark text-light" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {$dispName}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li><a class="dropdown-item" href="#">Mon compte</a></li>
                        <li><a class="dropdown-item" href="?page=myProducts">Mes produits</a></li>
                    </ul>
                </div>
HTML;
}
?>
                <a class="btn btn-<?= $logStyle ?>" href="?page=<?= $logPage ?>"><?= $logLabel ?></a>
            </ul>
        </div>
    </div>
</nav>