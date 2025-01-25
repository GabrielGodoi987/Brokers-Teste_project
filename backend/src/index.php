<?php

namespace Application\App;

require __DIR__ . '/../vendor/autoload.php';


use Application\App\Corretores\Controllers\BrokerController;
use Application\App\Routes\Router;


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');

$brokerController = new BrokerController();


Router::get('/', function () {
    echo "Hello recruiter!";
});

// findall
Router::get("/brokers", function () use ($brokerController) {
    $brokerController->findAll();
});

// create
Router::post("/brokers", function () use ($brokerController) {
    $input = json_decode(file_get_contents("php://input"));
    $brokerController->createBroker($input);
});

// update
Router::put("/brokers/{id}", function ($id) use ($brokerController) {
    $input = json_decode(file_get_contents("php://input"));
    $brokerController->updateBroker($id, $input);
});

// delete
Router::delete("/brokers/{id}", function ($id) use ($brokerController) {
    $brokerController->delete($id);
});

// find by creci
Router::get('/brokers/{creci}', function ($creci) use ($brokerController) {
    $brokerController->findByCreci($creci);
});

// find one by id
Router::get("/brokers/{id}", function ($id) use ($brokerController) {
    $brokerController->findById($id);
});


Router::resolve();
