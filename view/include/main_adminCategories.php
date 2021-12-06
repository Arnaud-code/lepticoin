<div class="container mt-3">
    <h1>Gestion des catégories</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Ordre</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>

<?php
    foreach ($categories as $category) {
        $qActiv = "";
        $qTrash = "";
        if ($category->qActiv > 0) {
            $qActiv = "<span class='badge rounded-pill bg-success'>$category->qActiv</span>";
        }
        if ($category->qTrash > 0) {
            $qTrash = "<span class='badge rounded-pill bg-danger'>$category->qTrash</span>";
        }

        echo <<<HTML
            <tr>
                <td>
                    $category->id
                </td>
                <td>
                    $category->sort
                </td>
                <th scope="row">
                    <a href="?page=adminCategory&id={$category->id}">
                        $category->name
                        $qActiv
                        $qTrash
                    </a>
                </th>
                <td>
                    $category->description
                </td>
            </tr>
HTML;
    }
?>

        </tbody>
    </table>
    <a href="?page=adminCategory" class="btn btn-primary">Nouveau</a>
</div>
