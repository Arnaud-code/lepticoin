<?php

class HelperBootstrap
{
    // attribut
    private static $singleton;

    // Construction du singleton
    public static function getSingleton()
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new HelperBootstrap();
        }

        return self::$singleton;
    }

    // Méhode
    public function bs5Li(string $lien, string $nomMenu, array $addClasses = []): string
    {
        // Met en surbrillance le menu qui est actif
        // Le lien passé en paramètre est de la forme '?page=' pour une utilisation en MVC
        $globalsPage = '';
        if (isset($GLOBALS['page']) && !empty($GLOBALS['page'])) {
            $globalsPage .= $GLOBALS['page'];
        }
        $classes = ($globalsPage === str_replace('?page=', '', $lien) ? 'active' : '');

        // Ajout du tableau $addClasses dans $classes
        foreach ($addClasses as $classe) {
            $classes .= ' ' . $classe;
        }

        // Génération d'une chaine de caractères html
        return <<<HTML
        <li class="nav-item">
            <a class="nav-link $classes" href="?page=$lien">$nomMenu</a>
        </li>
HTML;
    }
}
