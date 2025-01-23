<?php
namespace Application\App\Corretores\Repository;
use Application\App\Corretores\Models\BrokerModel;
use Application\App\Database\ConfigConnection;

class BrokerRepository
{

    private $table = 'corretores';
    private $pdo;
    public function __construct()
    {
        $this->pdo = ConfigConnection::getInstance();
    }

    public function findById($id)
    {
    }
    public function findAll()
    {
    }
    public function create(BrokerModel $data)
    {
    }
    public function update($id, BrokerModel $data)
    {
    }
    public function delete($id)
    {
    }
    public function findByCreci($creci){}
}