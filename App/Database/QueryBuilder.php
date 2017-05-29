<?php

namespace App\Database;

class QueryBuilder
{
    
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function select($table, $fetch = \PDO::FETCH_CLASS)
    {
        $s = $this->pdo->prepare("select * from {$table}");

        $s->execute();

        return $s->fetchAll($fetch);
    }

    public function seed($table, $data)
    {
      
        foreach ($data as $value) {
            $this->insert($table, $value);
        }
    }

    public function insert($table, $data)
    {

        
        $columns = implode(',', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        $stmt = $this->pdo->prepare($sql);
        
        try {
            $stmt->execute($data);
        } catch (\PDOException $ex) {
            die($ex->getMessage());
        }
    }
}
