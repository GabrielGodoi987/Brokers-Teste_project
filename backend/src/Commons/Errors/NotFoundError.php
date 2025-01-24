<?php

namespace Application\App\Coommons\Errors;

use Application\App\Enums\HttpStatusCode;
use Exception;

class NotFoundError extends Exception
{
    private $details;

    public function __construct(string $message, int $code = HttpStatusCode::NOT_FOUND, array $details = [])
    {
        parent::__construct($message, $code);
        $this->details = $details;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function __toString(): string
    {
        $details = !empty($this->details) ? json_encode($this->details) : 'None';
        return __CLASS__ . ": [{$this->code}]: {$this->message} - Details: {$details}\n";
    }
}
