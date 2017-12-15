<?php

namespace Application\Components;

class DB 
{
    const DB_CONFIG_PATH = ROOT . 'config/db_config.php';
    
    public static function getConnection()
    {
        $config = include(self::DB_CONFIG_PATH);
        
        $dsn = "mysql:host={$config['host']};dbname={$config['name']}";
        $db = new \PDO($dsn, $config['user'], $config['pass']);
        
        return $db ?: false;
    }
}
