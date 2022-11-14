<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

dataset('Request methods', static fn (): array => [
    Request::METHOD_GET => [
        'method' => Request::METHOD_GET,
        'status' => Response::HTTP_OK,
    ],
    Request::METHOD_HEAD => [
        'method' => Request::METHOD_HEAD,
        'status' => Response::HTTP_OK,
    ],
    Request::METHOD_DELETE => [
        'method' => Request::METHOD_DELETE,
        'status' => Response::HTTP_METHOD_NOT_ALLOWED,
    ],
    Request::METHOD_POST => [
        'method' => Request::METHOD_POST,
        'status' => Response::HTTP_METHOD_NOT_ALLOWED,
    ],
    Request::METHOD_PATCH => [
        'method' => Request::METHOD_PATCH,
        'status' => Response::HTTP_METHOD_NOT_ALLOWED,
    ],
    Request::METHOD_PUT => [
        'method' => Request::METHOD_PUT,
        'status' => Response::HTTP_METHOD_NOT_ALLOWED,
    ],
]);
