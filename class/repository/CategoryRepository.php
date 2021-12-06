<?php

class CategoryRepository {

    // Attributs
    protected $pdo;

    // Constructeur
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode
    public function findAll() {
        try {
            $sql = "SELECT * FROM category ORDER BY sort";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findBy($categoryId) {
        try {
            $sql = "SELECT * FROM category WHERE id = $categoryId;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function update(Category $category) {
        try {
            $sql = "UPDATE category
                SET name = :categoryName,
                    slug = :categorySlug
                    description = :categoryDescription
                    sort = :categorySort
                WHERE id = :categoryId;";
            $data = [
                ':categoryId' => $category->getCategoryId(),
                ':categoryName' => $category->getCategoryName(),
                ':categorySlug' => $category->getCategorySlug(),
                ':categoryDescription' => $category->getCategoryDescription(),
                ':categorySort' => $category->getCategorySort()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    // Création d'un nouvel utilisateur
    public function insert(Category $category) {
        try {
            $sql = "INSERT INTO category (name, slug, description, sort)
                VALUES (:categoryName, :categorySlug, :categoryDescription, :categorySort);";
            $data = [
                ':categoryName' => $category->getCategoryName(),
                ':categorySlug' => $category->getCategorySlug(),
                ':categoryDescription' => $category->getCategoryDescription(),
                ':categorySort' => $category->getCategorySort()
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