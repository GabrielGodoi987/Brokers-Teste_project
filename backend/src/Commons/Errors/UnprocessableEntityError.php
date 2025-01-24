<?php

namespace Application\App\Coommons\Errors;

use Application\App\Enums\HttpStatusCode;
use Exception;

class UnprocessableEntityError extends Exception
{

    private $details;

    public function __construct(string $message, int $code = HttpStatusCode::UNPROCESSABLE_ENTITY, array $details = [])
    {
        parent::__construct($message, $code);
        $this->details = $details;
    }

    // Método para obter os detalhes adicionais
    public function getDetails(): array
    {
        return $this->details;
    }

    // Sobrescreve __toString para exibir informações personalizadas
    public function __toString(): string
    {
        $details = !empty($this->details) ? json_encode($this->details) : 'None';
        return __CLASS__ . ": [{$this->code}]: {$this->message} - Details: {$details}\n";
    }
}
