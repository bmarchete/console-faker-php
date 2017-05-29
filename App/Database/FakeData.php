<?php

namespace App\Database;

use Faker\Factory;

class FakeData
{

   public static function getTable()
   {
       return 'tabela';
   }
   

    public static function getData($num)
    {

        $config = require 'config.php';
        $faker = Factory::create('pt_BR');

        $data = [];
        for ($i=0; $i < $num; $i++) { 
            
            array_push($data, [
                'id' => $faker->unique()->numberBetween($min = 1, $max = ($num*2)),
                'nome' => $faker->name
            ]);
        }

        return $data;
    }
}
