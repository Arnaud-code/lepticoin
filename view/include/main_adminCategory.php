<?php
if (isset($categoryId) && !empty($categoryId)) {
    $title = "Modification de " . $category->getCategoryName();
    $categoryName = $category->getCategoryName();
    $categorySlug = $category->getCategorySlug();
    $categoryDescription = $category->getCategoryDescription();
    $categorySort = $category->getCategorySort();
}else {
    $title = "Nouvelle catégorie";
    $categoryName = "";
    $categorySlug = "";
    $categoryDescription = "";
    $categorySort = "";
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
                    <input type="text" class="form-control" value="<?= $categoryName ?>" name="categoryName" id="formName">
                </div>
                <div class="mb-3 form-group">
                    <label for="categorySlug" class="form-label">Slug</label>
                    <input type="text" class="form-control" value="<?= $categorySlug ?>" name="categorySlug">
                </div>
                <div class="mb-3 form-group">
                    <label for="categoryDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" value="<?= $categoryDescription ?>" name="categoryDescription">
                </div>
                <div class="mb-3 form-group">
                    <label for="categorySort" class="form-label">Ordre</label>
                    <input type="text" class="form-control" value="<?= $categorySort ?>" name="categorySort">
                </div>
                <div>
                    <p class="fst-italic text-danger"><?= $message ?></p>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
            </form>
        </div>
    </div>
</div>