<div class="container mt-3">
    <h1>Gestion des utilisateurs</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Alias</th>
                <th scope="col">Mail</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>

<?php
    foreach ($users as $user) {
        $tableClass = "";
        $qActiv = "";
        $qTrash = "";
        if ($user->qActiv > 0) {
            $qActiv = "<span class='badge rounded-pill bg-success'>$user->qActiv</span>";
        }
        if ($user->qTrash > 0) {
            $qTrash = "<span class='badge rounded-pill bg-danger'>$user->qTrash</span>";
        }
        if ($user->role === "1") {
            $tableClass = 'table-warning';
        }

        echo <<<HTML
            <tr class="$tableClass">
                <td>
                    $user->id
                </td>
                <th scope="row">
                    <a href="?page=adminUser&id={$user->id}">
                        $user->alias
                        $qActiv
                        $qTrash
                    </a>
                </th>
                <td>
                    <a href="?page=adminUser&id={$user->id}">
                        $user->name
                    </a>
                </td>
                <td>
                    <a href="?page=adminUser&id={$user->id}">
                        $user->surname
                    </a>
                </td>
                <td>
                    <a href="?page=adminUser&id={$user->id}">
                        $user->mail
                    </a>
                </td>
                <td>
                    $user->roleName
                </td>
            </tr>
HTML;
    }
?>

        </tbody>
    </table>
    <a href="?page=adminUser" class="btn btn-primary">Nouveau</a>
</div>
