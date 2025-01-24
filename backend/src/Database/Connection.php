<?php

namespace Application\App\Database;

return [
    "sqlite" => [
        "driver" => "sqlite",
        "database" => "Produtos.db",
        "prefix" => "",
    ],
    "mysql" => [
        "driver" => "mysql",
        "host" => "db",
        "port" => "3306",
        "database" => "php-db",
        "username" => "root",
        "password" => "docker",
        "charset" => "utf8"
    ],
    "postgres" => [
        "driver" => "postgres",
        "host" => "db",
        "port" => "5432",
        "database" => "php-db",
        "username" => "root",
        "password" => "docker",
    ],
    "sqlsrv" => [
        "driver" => "sqlsrv",
        "host" => "db",
        "port" => "1433",
        "database" => "php-db",
        "username" => "root",
        "password" => "docker",
    ],
];
