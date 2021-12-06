<div class="container mt-3">
    <h1>Catégorie <?= $categoryName ?></h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Vendeur</th>
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
                <td>$product->description</td>
                <td><span class="badge bg-warning text-dark">$product->price €</span></td>
                <td><a href="?page=seller&id={$product->seller}">$product->sellerName</a></td>
            </tr>
HTML;
    }
?>

        </tbody>
    </table>
</div>
