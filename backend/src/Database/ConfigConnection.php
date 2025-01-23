<?php

namespace Application\App\Database;

use PDO;
use PDOException;


class ConfigConnection
{
    private $pdo;
    private static $instance;

    public function __construct()
    {
        $config = require __DIR__ . '/Connection.php';

        $sqlitePath = $config['mysql'];

        try {
            $this->pdo = new PDO("sqlite:" . __DIR__ . '/' . $sqlitePath);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão com o banco de dados: " . $e->getMessage());
        }
    }


    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}