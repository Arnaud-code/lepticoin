<?php

namespace App\Helper;

class HelperFileSystem
{
    // attribut
    private static $singleton;

    // Construction du singleton
    public static function getSingleton()
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new HelperFileSystem();
        }
        return self::$singleton;
    }

    /*
        Fonction permettant de retourner un chemin avec les bons 
        séparateur de dossier en fonction de l'OS utilisé.
        $postion peut prendre deux valeurs :
            1 - s pour serveur
            2 - c pour client
    */
    public function pathCreate(string $position, array $fsfolders): string
    {
        // Obtient le chemin racine du projet
        if ($position === "s") {
            $fspath = $_SERVER["DOCUMENT_ROOT"];
        }
        if ($position === "c") {
            $fspath = "";
        }

        foreach ($fsfolders as $fsfolder) {
            $fspath .= DIRECTORY_SEPARATOR . $fsfolder;
        }

        // Génération d'une chaine de caractères html
        return $fspath . DIRECTORY_SEPARATOR;
    }

    public function fileCreate($fsfile): string
    {
        $fsfolder = dirname($fsfile);

        if (!is_dir($fsfolder)) {
            mkdir($fsfolder, 0777, true);
        }

        if (!file_exists($fsfile)) {
            touch($fsfile);
        }

        return $fsfile;
    }

    public function fileDelete($fsfile): bool
    {
        return unlink($fsfile);
    }
}
