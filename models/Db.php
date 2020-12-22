<?php
class Db
{
    public static function getConnection()
    {
        $settingsadd = ROOT . '/static/settings/connect.php';
        $settings = include($settingsadd);
        $dsn = "mysql:host={$settings['host']};dbname={$settings['dbname']}";
        $db = new PDO($dsn, $settings['user'], $settings['password']);
        $db->exec("set names utf8");
        return $db;
    }

}
