<?php

namespace Application\App\Corretores\Repository;

use Application\App\Corretores\Models\BrokerModel;
use Application\App\Database\ConfigConnection;
use PDO;
use PDOException;

class BrokerRepository
{

    private $table = 'corretores';
    private $pdo;
    public function __construct(BrokerModel $brokerModel)
    {
        $this->pdo = ConfigConnection::getInstance();
    }

    public function findById($id)
    {
        $query = "SELECT * FROM $this->table WHERE $this->table.id = :id";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $th) {
            return $th;
        }
    }
    public function findAll()
    {
        $query = "SELECT * FROM $this->table;";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $th) {
            return $th;
        }
    }
    public function create(BrokerModel $data)
    {
        $name = $data->getName();
        $cpf = $data->getCpf();
        $creci = $data->getCreci();

        $query = "INSERT INTO $this->table(name, cpf, creci) VALUES (:name, cpf, creci)";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":creci", $creci);
            $stmt->execute();
            $data = $stmt->lastInsertId();

            return $data;
        } catch (PDOException $th) {
            return $th;
        }
    }
    public function update($id, BrokerModel $data)
    {
        $name = $data->getName();
        $cpf = $data->getCpf();
        $creci = $data->getCreci();

        $query = "UPDATE $this->table SET name = :name, cpf = :cpf, creci = :creci WHERE $this->table.id = :id";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":creci", $creci);
            $stmt->execute();

            return $this->findById($id);
        } catch (PDOException $th) {
            return $th;
        }
    }
    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        } catch (PDOException $th) {
            return $th;
        }
    }
    public function findByCreci($creci)
    {
        $query = "SELECT * FROM $this->table WHERE creci = :creci;";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":creci", $creci);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $th) {
            return $th;
        }
    }
}
