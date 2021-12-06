<div class="container mt-3">
    <h1><?= $product->name ?></h1>
    <h2 class="h4"><a href="/?page=category&id=<?= $product->categoryId ?>"><?= $product->categoryName ?></a></h2>
<?php
    echo <<<HTML
        <div class="card" style="width: 25rem;">
            <img src="../../asset/img/products/{$product->id}.jpg" class="card-img-top">
            <div class="card-body">
                <p class="card-text">{$product->description}</p>
                <p><span class="badge bg-warning text-dark">$product->price €</span> par <a href="/?page=seller&id={$product->seller}">$product->sellerAlias</a></p>
            </div>
        </div>
HTML;
?>
</div>