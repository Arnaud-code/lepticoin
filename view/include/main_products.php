<div class="container mt-3">
    <h1>Liste des produits</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Prix</th>
                <th scope="col">Vendeur</th>
            </tr>
        </thead>
        <tbody>

<?php
    foreach ($allProducts as $product) {
        echo <<<HTML
            <tr>
                <th scope="row"><a href="?page=product&id={$product->id}">$product->name</a></th>
                <td><a href="?page=category&id={$product->categoryId}">$product->categoryName</a></td>
                <td><span class="badge bg-warning text-dark">$product->price €</span></td>
                <td><a href="?page=seller&id={$product->seller}">$product->sellerName</a></td>
            </tr>
HTML;
    }
?>

        </tbody>
    </table>
</div>
