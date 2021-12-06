<?php

class UserRepository {

    // Attributs
    protected $pdo;

    // Constructeur
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode
    public function findAll() {
        try {
            $sql = "SELECT * FROM user ORDER BY alias;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function findBy($userId) {
        try {
            $sql = "SELECT * FROM user WHERE id = $userId;";
            return $this->pdo->query($sql);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }

    public function update(User $user) {
        try {
            $sql = "UPDATE user
                SET name = :userName,
                    surname = :userSurname,
                    alias = :userAlias,
                    mail = :userMail,
                    password = :userPassword,
                    role = :userRole
                WHERE id = :userId;";
            $data = [
                ':userId' => $user->getUserId(),
                ':userName' => $user->getUserName(),
                ':userSurname' => $user->getUserSurname(),
                ':userAlias' => $user->getUserAlias(),
                ':userMail' => $user->getUserMail(),
                ':userPassword' => $user->getUserPassword(),
                ':userRole' => $user->getUserRole()
            ];
            return $this->pdo->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo "Erreur Query sur : " . $e->getMessage();
        }
    }
    
    // Création d'un nouvel utilisateur
    public function insert(User $user) {
        try {
            $sql = "INSERT INTO user (name, surname, alias, mail, password, role)
                VALUES (:userName, :userSurname, :userAlias, :userMail, :userPassword, :userRole);";
            $data = [
                ':userName' => $user->getUserName(),
                ':userSurname' => $user->getUserSurname(),
                ':userAlias' => $user->getUserAlias(),
                ':userMail' => $user->getUserMail(),
                ':userPassword' => $user->getUserPassword(),
                ':userRole' => $user->getUserRole()
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