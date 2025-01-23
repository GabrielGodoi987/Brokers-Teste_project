<?php

namespace Backend\Products\Database\Config;

return [
    "sqlite" => [
        "driver" => "sqlite",
        "database" => "Produtos.db",
        "prefix" => "",
    ],
    "mysql" => [
        "driver" => "mysql",
        "host" => "127.0.0.1",
        "port" => "3306",
        "database" => "your_database",
        "username" => "your_username",
        "password" => "your_password",
        "charset" => "utf8mb4",
        "collation" => "utf8mb4_unicode_ci",
        "prefix" => "",
        "strict" => true,
        "engine" => null,
    ],
    "pgsql" => [
        "driver" => "pgsql",
        "host" => "127.0.0.1",
        "port" => "5432",
        "database" => "your_database",
        "username" => "your_username",
        "password" => "your_password",
        "charset" => "utf8",
        "prefix" => "",
        "schema" => "public",
        "sslmode" => "prefer",
    ],
    "sqlsrv" => [
        "driver" => "sqlsrv",
        "host" => "localhost",
        "port" => "1433",
        "database" => "your_database",
        "username" => "your_username",
        "password" => "your_password",
        "charset" => "utf8",
        "prefix" => "",
    ],
];