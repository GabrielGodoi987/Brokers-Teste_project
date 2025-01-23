<?php 
namespace Application\App\Corretores\Services;
use Application\App\Corretores\Models\BrokerModel;
use Application\App\Corretores\Repository\BrokerRepository;
class BrokerService {
    private $brokerRepository;
    public function __construct(BrokerRepository $brokerRepository) {
       $this->brokerRepository = $brokerRepository;
    }

    public function createBroker(BrokerModel $data) {
        return $this->brokerRepository->create($data);
    }
    public function updateBroker($id, BrokerModel $data) {
        return $this->brokerRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->brokerRepository->delete($id);
    }
    public function findById($id) {
        return $this->brokerRepository->findById($id);
    }
    public function findByCreci($creci) {
        return $this->brokerRepository->findByCreci($creci);
    }

    public function findAll() {
        return $this->brokerRepository->findAll();
    }
}