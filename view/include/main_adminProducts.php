<div class="container mt-3">
    <h1>Gestion des produits</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Vendeur</th>
                <th scope="col">Prix</th>
            </tr>
        </thead>
        <tbody>

<?php
    foreach ($products as $product) {
        $tableClass = '';
        if ($product->trash) $tableClass = 'table-danger';
        echo <<<HTML
            <tr class="$tableClass">
                <td>
                    $product->id
                </td>
                <th scope="row">
                    <a href="?page=adminProduct&id={$product->id}">
                        $product->name
                    </a>
                </th>
                <td>
                    <a href="?page=adminCategory&id={$product->categoryId}">
                        $product->categoryName
                    </a>
                </td>
                <td>
                    $product->slug
                </td>
                <td>
                    $product->description
                </td>
                <td>
                    <a href="?page=adminUser&id={$product->seller}">
                        $product->sellerAlias
                    </a>
                </td>
                <td>
                    <span class="badge bg-warning text-dark">$product->price €</span>
                </td>
            </tr>
HTML;
    }
?>

        </tbody>
    </table>
    <a href="?page=adminProduct" class="btn btn-primary">Nouveau</a>
</div>
