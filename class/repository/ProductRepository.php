<?php

class ProductRepository {

    // Attributs
    protected $pdo;

    // Constructeur
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode
    public function findAll($trash = "(0)") {
        try {
            $sql = "SELECT * FROM product WHERE trash IN $trash;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findBy($productId, $trash = "(0)") {
        try {
            $sql = "SELECT * FROM product WHERE id = $productId AND trash IN $trash;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findByCategory($categoryId, $trash = "(0)") {
        try {
            $sql = "SELECT * FROM product WHERE categoryId = $categoryId AND trash IN $trash;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findBySeller($sellerId, $trash = "(0)") {
        try {
            $sql = "SELECT * FROM product WHERE seller = $sellerId AND trash IN $trash;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function update(Product $product) {
        try {
            $sql = "UPDATE product
                SET categoryId = :productCategoryId,
                    name = :productName,
                    slug = :productSlug,
                    description = :productDescription,
                    seller = :productSeller,
                    price = :productPrice,
                    trash = :productTrash
                WHERE id = :productId;";
            $data = [
                ':productId' => $product->getProductId(),
                ':productCategoryId' => $product->getProductCategoryId(),
                ':productName' => $product->getProductName(),
                ':productSlug' => $product->getProductSlug(),
                ':productDescription' => $product->getProductDescription(),
                ':productSeller' => $product->getProductSeller(),
                ':productPrice' => $product->getProductPrice(),
                ':productTrash' => $product->getProductTrash()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    // Création d'un nouvel utilisateur
    public function insert(Product $product) {
        try {
            $sql = "INSERT INTO product (categoryId, name, slug, description, seller, price, trash)
                VALUES (:productCategoryId, :productName, :productSlug, :productDescription, :productSeller, :productPrice, :productTrash);";
            $data = [
                ':productCategoryId' => $product->getProductCategoryId(),
                ':productName' => $product->getProductName(),
                ':productSlug' => $product->getProductSlug(),
                ':productDescription' => $product->getProductDescription(),
                ':productSeller' => $product->getProductSeller(),
                ':productPrice' => $product->getProductPrice(),
                ':productTrash' => $product->getProductTrash()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function lastInsert() {
        try {
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
}
?>