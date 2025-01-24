<?php
namespace Application\App\Corretores\Controllers;

use Application\App\Corretores\Dto\BrokerDto;
use Application\App\Corretores\Services\BrokerService;

class BrokerController
{
    private BrokerService $brokerService;
    public function __construct()
    {
        $this->brokerService = new BrokerService();
    }

    public function findAll()
    {
        echo $this->brokerService->findAll();
    }

    public function findById($id)
    {
        echo $this->brokerService->findById($id);
    }

    public function findByCreci($creci)
    {
        echo $this->brokerService->findByCreci($creci);
    }

    public function delete($id)
    {
        echo $this->brokerService->delete($id);
    }

    public function createBroker(BrokerDto $data)
    {
        echo $this->brokerService->createBroker($data);
    }

    public function updateBroker($id, BrokerDto $data)
    {
        echo $this->brokerService->updateBroker($id, $data);
    }
}
