<?php

use Application\App\Corretores\Models\BrokerModel;
use Application\App\Corretores\Services\BrokerService;

class BrokerController
{
    private BrokerService $brokerService;
    public function __construct(BrokerService $brokerService)
    {
        $this->brokerService = $brokerService;
    }

    public function findAll()
    {
        return $this->brokerService->findAll();
    }

    public function findById($id)
    {
        return $this->brokerService->findById($id);
    }

    public function findByCreci($creci)
    {
        return $this->brokerService->findByCreci($creci);
    }

    public function delete($id)
    {
        return $this->brokerService->delete($id);
    }

    public function createBroker(BrokerModel $data)
    {
        return $this->brokerService->createBroker($data);
    }

    public function updateBroker($id, BrokerModel $data)
    {
        return $this->brokerService->updateBroker($id, $data);
    }

    
}