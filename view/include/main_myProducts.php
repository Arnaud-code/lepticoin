<div class="container mt-3">
    <h1>Mes produits</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Descriptif</th>
                <th scope="col">Prix</th>
                <th scope="col">Etat</th>
            </tr>
        </thead>
        <tbody>

<?php
    foreach ($products as $product) {
        if ($product->trash) {
            $tableClass = 'table-danger';
            $colorButton = 'success';
            $iconButton = 'eye';
        } else {
            $tableClass = '';
            $colorButton = 'danger';
            $iconButton = 'trash';
        }
        echo <<<HTML
            <tr class="{$tableClass}">
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
                <td>
                    <a href="?page=myProduct&id={$product->id}" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                    <a href="?page=myProducts&trash&id={$product->id}" class="btn btn-sm btn-{$colorButton}"><i class="bi bi-{$iconButton}"></i></a>
                </td>
            </tr>
HTML;
    }
?>

        </tbody>
    </table>
    <a href="?page=myProduct" class="btn btn-primary">Nouveau</a>
</div>
