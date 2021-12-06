<?php
if (isset($productId) && !empty($productId)) {
    $productName = $product->getProductName();
    $title = "Modification de " . $productName;
    $productSlug = $product->getProductSlug();
    $productDescription = $product->getProductDescription();
    $productPrice = $product->getProductPrice();
    $productCategoryId = $product->getProductCategoryId();
    $productSeller = $product->getProductSeller();
    $productTrash = $product->getProductTrash() === "1" ? " checked" : "";
} else {
    $title = "Nouveau produit";
    $productName = "";
    $productSlug = "";
    $productDescription = "";
    $productPrice = "";
    $productCategoryId = "";
    $productSeller = "";
    $productTrash = "";
}
$catForm = "<option value='' " . ($productCategoryId === "" ? "selected " : "") . "disabled>Sélectionner une catégorie</option>"; 
foreach ($categories as $category) {
    $catForm .= "<option value='$category->id'" . ($productCategoryId === $category->id ? "selected" : "") . ">$category->name</option>";
}
$selForm = "<option value='' " . ($productSeller === "" ? "selected " : "") . "disabled>Sélectionner un vendeur</option>"; 
foreach ($sellers as $seller) {
    $selForm .= "<option value='$seller->id'" . ($productSeller === $seller->id ? "selected" : "") . ">$seller->alias</option>";
}
?>
<div class="container mt-3">
    <h1><?= $title ?></h1>
    <div class="card">
        <div class="container">
            <form method="post">
                <input type="hidden" name="request" value="$request">
                <div class="my-3 form-group">
                    <label for="formName" class="form-label">Nom</label>
                    <input type="text" class="form-control" value="<?= $productName ?>" name="productName" id="formName">
                </div>
                <div class="mb-3 form-group">
                    <label for="productSlug" class="form-label">Slug</label>
                    <input type="text" class="form-control" value="<?= $productSlug ?>" name="productSlug">
                </div>
                <div class="mb-3 form-group">
                    <label for="productDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" value="<?= $productDescription ?>" name="productDescription">
                </div>
                <div class="mb-3 form-group">
                    <label for="productCategory" class="form-label">Catégorie</label>
                    <select name="productCategoryId" id="productCategory" class="form-select" aria-label="Default select example">
                        <?= $catForm ?>
                    </select>
                </div>
                <div class="mb-3 form-group">
                    <label for="productPrice" class="form-label">Price</label>
                    <input type="text" class="form-control" value="<?= $productPrice ?>" name="productPrice">
                </div>
                <div class="mb-3 form-group">
                    <label for="productSeller" class="form-label">Vendeur</label>
                    <select name="productSeller" id="productSeller" class="form-select" aria-label="Default select example">
                        <?= $selForm ?>
                    </select>
                </div>
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="productTrash">Corbeille</label>
                    <input type="checkbox" class="form-check-input" value="" id="productTrash" name="productTrash" <?= $productTrash ?>>
                </div>
                <div>
                    <p class="fst-italic text-danger"><?= $message ?></p>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
            </form>
        </div>
    </div>
</div>