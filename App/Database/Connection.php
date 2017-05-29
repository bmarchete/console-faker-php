<?php

namespace App\Database;

class Connection
{

    public static function connect()
    {
        $config = require 'config.php';

        try {
            return new \PDO(
                $config['database']['connection'].';dbname='.$config['database']['name'],
                $config['database']['username'],
                $config['database']['password'],
                $config['database']['options']
                    );
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }
}
