<?php

namespace Application\App\Enums;

enum HttpStatusCode
{
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NO_CONTENT = 204;
    const NOT_FOUND = 404;
    const CONFLICT = 409;
    const UNPROCESSABLE_ENTITY = 422;
    const METHOD_NOT_ALLOWED = 405;
    const SERVER_ERROR = 500;
}
