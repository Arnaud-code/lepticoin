<div class="container mt-3">
    <h1>Mon compte</h1>
    <div class="card">
        <div class="container">
            <form method="post">
                <input type="hidden" name="request" value="$request">
                <div class="my-3 form-group">
                    <label for="formName" class="form-label">Nom</label>
                    <input type="text" class="form-control" value="<?= $user->getUserName() ?>" name="userName" id="formName">
                </div>
                <div class="mb-3 form-group">
                    <label for="userSurname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" value="<?= $user->getUserSurname() ?>" name="userSurname">
                </div>
                <div class="mb-3 form-group">
                    <label for="userAlias" class="form-label">Alias</label>
                    <input type="text" class="form-control" value="<?= $user->getUserAlias() ?>" name="userAlias">
                </div>
                <div class="mb-3 form-group">
                    <label for="userMail" class="form-label">Mail</label>
                    <input type="email" class="form-control" value="<?= $user->getUserMail() ?>" name="userMail">
                </div>
                <div class="mb-3 form-group">
                    <label for="userPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" value="" name="userPassword">
                </div>
                <div class="mb-3 form-group">
                    <label for="userConfirm" class="form-label">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" value="" name="userConfirm">
                </div>
                <div class="mb-3 form-group">
                    <label for="userRole" class="form-label">Role</label>
                    <input type="text" class="form-control" value="<?= $user->getUserRole() ?>" name="userRole" aria-describedby="roleHelp">
                    <div id="roleHelp" class="form-text">Saisir 1 pour un administrateur, 2 pour un simple utilisateur</div>
                </div>
                <div>
                    <p class="fst-italic text-danger"><?= $message ?></p>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
