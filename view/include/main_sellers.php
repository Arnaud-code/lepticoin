<div class="container mt-3">
    <h1>Liste des vendeurs</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Alias</th>
                <th scope="col">Mail</th>
            </tr>
        </thead>
        <tbody>

<?php
    foreach ($allSellers as $seller) {
        $qActiv = "";
        if ($seller->productsQuantity > 0) {
            $qActiv = "<span class='badge rounded-pill bg-success'>$seller->productsQuantity</span>";
        }
        echo <<<HTML
            <tr>
                <th scope="row">
                    <a href="?page=seller&id={$seller->id}">
                        $seller->alias
                        $qActiv
                    </a>
                </th>
                <td>
                    <a href="?page=seller&id={$seller->id}">
                        $seller->mail
                    </a>
                </td>
            </tr>
HTML;
    }
?>

        </tbody>
    </table>
</div>
