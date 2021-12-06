<div class="container mt-3">
    <h1>Main Login !</h1>
    <form method="post">
        Adresse mail : <input type="text" name="loginUser" value="" class="form-control mb-2">
        Mot de passe : <input type="password" name="userPassword" value="" class="form-control mb-2">
        <div class="erreur"><?= $message ?></div>
        <input type="submit" name="submitLogin" class="btn button btn-primary mt-3" value="Connexion">
    </form>

</div>
