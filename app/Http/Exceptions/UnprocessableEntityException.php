<?php

namespace App\Http\Exceptions;

use App\Http\Responses\Response;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class UnprocessableEntityException extends UnprocessableEntityHttpException
{
    private Validator $validator;

    public function __construct($validator)
    {
        parent::__construct();
        $this->validator = $validator;
    }

    public function render(): JsonResponse
    {
        return Response::error('Dados inválidos', $this->getStatusCode(), $this->validator->errors());
    }
}
