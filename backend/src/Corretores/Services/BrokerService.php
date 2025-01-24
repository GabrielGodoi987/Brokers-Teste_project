<?php

namespace Application\App\Corretores\Services;

use Application\App\Coommons\Errors\ConflictError;
use Application\App\Coommons\Errors\NotFoundError;
use Application\App\Coommons\Errors\UnprocessableEntityError;
use Application\App\Corretores\Dto\BrokerDto;
use Application\App\Corretores\Models\BrokerModel;
use Application\App\Corretores\Repository\BrokerRepository;
use Application\App\Enums\HttpStatusCode;
use PDOException;
use Throwable;

class BrokerService
{
    private $brokerRepository;
    private BrokerModel $brokerModel;
    public function __construct()
    {
        $this->brokerModel = new BrokerModel();
        $this->brokerRepository = new BrokerRepository($this->brokerModel);
    }

    public function createBroker(BrokerDto $data)
    {
        $broker = $this->brokerRepository->findByCreci($data->creci);
        if (!isset($data->name, $data->cpf, $data->creci)) {
            throw new UnprocessableEntityError("Input is empty", HttpStatusCode::UNPROCESSABLE_ENTITY, [
                "field" => "maybe all the field are empty",
                "reason" => "Required fields are missing"
            ]);
        }
        if (!!$broker) {
            throw new ConflictError("This user already Exists");
        }

        $this->brokerModel->setName($data->name);
        $this->brokerModel->setCpf($data->cpf);
        $this->brokerModel->setCreci($data->creci);
        return $this->brokerRepository->create($this->brokerModel);
    }
    public function updateBroker($id, BrokerDto $data)
    {
        $user = $this->brokerRepository->findById($id);
        if (!isset($data->name, $data->cpf, $data->creci)) {
            throw new UnprocessableEntityError("Input is empty", HttpStatusCode::UNPROCESSABLE_ENTITY, [
                "field" => "maybe all the field are empty",
                "reason" => "Required fields are missing"
            ]);
        }

        if (!$user) {
            throw new NotFoundError("This user: $data->name, does'nt exists");
        }

        return $this->brokerRepository->update($id, $this->brokerModel);
    }

    public function delete($id)
    {
        if (!isset($id)) {
            throw new UnprocessableEntityError("Input is empty", HttpStatusCode::UNPROCESSABLE_ENTITY, [
                "field" => "id",
                "reason" => "Required data is missing."
            ]);
        }
        return $this->brokerRepository->delete($id);
    }
    public function findById($id)
    {
        if (!isset($id)) {
            throw new UnprocessableEntityError("Input is empty", HttpStatusCode::UNPROCESSABLE_ENTITY, [
                "field" => "id",
                "reason" => "Required data is missing."
            ]);
        }
        return $this->brokerRepository->findById($id);
    }
    public function findByCreci($creci)
    {
        if (!isset($creci)) {
            throw new UnprocessableEntityError("Input is empty", HttpStatusCode::UNPROCESSABLE_ENTITY, [
                "field" => "crecy",
                "reason" => "Required data is missing."
            ]);
        }
        return $this->brokerRepository->findByCreci($creci);
    }

    public function findAll()
    {
        try {
            return $this->brokerRepository->findAll();
        } catch (Throwable $th) {
            throw new PDOException($th);
        }
    }
}
