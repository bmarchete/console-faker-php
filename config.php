<?php

use Faker\Factory;

  $faker = Factory::create('pt_BR');
       

return [
    'database' => [
        'name' => 'db',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=localhost',
        'options' => [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
        ]
    ]
];
