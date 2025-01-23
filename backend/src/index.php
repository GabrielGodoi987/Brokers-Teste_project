<?php
namespace Application\App;
use Application\App\Router\Router;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');



Router::get('/', function () {
    echo "Hello recruiter";
});


Router::resolve();