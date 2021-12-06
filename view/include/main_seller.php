<div class="container mt-3">
    <h1>Produits de <?= $productsSeller->alias ?></h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Descriptif</th>
                <th scope="col">Prix</th>
            </tr>
        </thead>
        <tbody>

<?php
    foreach ($products as $product) {
        echo <<<HTML
            <tr>
                <th scope="row">
                    <a href="?page=product&id={$product->id}">
                        $product->name
                    </a>
                </th>
                <td>
                    <a href="?page=category&id={$product->categoryId}">
                        $product->categoryName
                    </a>
                </td>
                <td>
                    $product->description
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
</div>
