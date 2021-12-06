<?php

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
}
