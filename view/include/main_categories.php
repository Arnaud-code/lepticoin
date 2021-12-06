<div class="container mt-3">
    <h1>Liste des catégories</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>

<?php
    foreach ($allCategories as $category) {
        $qActiv = "";
        if ($category->quantity > 0) {
            $qActiv = "<span class='badge rounded-pill bg-success'>$category->quantity</span>";
        }
        echo <<<HTML
            <tr>
                <th scope="row">
                    <a href="?page=category&id={$category->id}">
                        $category->name
                        $qActiv
                    </a>
                </th>
                <td>$category->description</td>
            </tr>
HTML;
    }
?>

        </tbody>
    </table>
</div>
