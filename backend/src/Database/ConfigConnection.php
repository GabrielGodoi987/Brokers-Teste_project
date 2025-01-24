<?php

namespace Application\App\Database;

use PDO;
use PDOException;


class ConfigConnection
{
    private $pdo;
    private static $instance;

    public function __construct($databaseType = "postgres")
    {
        $config = require __DIR__ . '/Connection.php';

        $sqlPath = $config['postgres'];
        $driver = $sqlPath['driver'];
        try {
            switch ($databaseType) {
                case 'sqlite':
                    $dsn = "{$driver}:{$sqlPath['database']}";
                    $this->pdo = new PDO($dsn);
                    break;

                case 'mysql':
                case 'postgres':
                    $dsn = "{$driver}:host={$sqlPath['host']};port={$sqlPath['port']};dbname={$sqlPath['database']}";
                    $this->pdo = new PDO($dsn, $sqlPath['username'], $sqlPath['password']);
                    break;

                case 'sqlsrv':
                    $dsn = "{$driver}:Server={$sqlPath['host']},{$sqlPath['port']};Database={$sqlPath['database']}";
                    $this->pdo = new PDO($dsn, $sqlPath['username'], $sqlPath['password']);
                    break;

                default:
                    die("Driver de banco de dados não suportado.");
            }

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão com $databaseType bem-sucedida!";
        } catch (PDOException $e) {
            die("Erro de conexão com $databaseType: " . $e->getMessage());
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
