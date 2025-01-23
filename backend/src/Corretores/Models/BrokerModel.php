<?php
namespace Application\App\Corretores\Models;

class BrokerModel
{
    private $id;
    private $name;
    private $cpf;
    private $creci;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getCreci()
    {
        return $this->creci;
    }
    public function setCreci($creci)
    {
        $this->creci = $creci;
    }
}