<?php

namespace App\Helper;

use App\Helper\HelperFileSystem;
use PDO;
use Exception;

class HelperPDO
{
    // attribut
    private static $singleton;

    //méthodes
    /**
     * @return HelperPDO
     */
    public static function getSingleton(): HelperPDO
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new HelperPDO();
        }
        return self::$singleton;
    }

    public function getPdo() {
        $bdd = 'mvc.db';
        $bddPath = new HelperFileSystem;
        $bddPath->pathCreate('s', ['sqlite', 'Data']) . $bdd;

        try {
            $pdo = new PDO(
                'sqlite:' . $bddPath,
                null,
                null,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]
            );
            return $pdo;
        } catch(Exception $e) {
            die('connection_unsuccessful: ' . $e->getMessage());
        }
    }
}
