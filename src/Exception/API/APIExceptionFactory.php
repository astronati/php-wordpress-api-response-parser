<?php

namespace WARP\Exception\API;

class APIExceptionFactory
{
    public static function create(string $contents): ?APIExceptionAbstract
    {
        $error = new ErrorResponse($contents);

        switch ($error->getErrorCode()) {
            case TermExistsAPIException::getErrorCode():
                return new TermExistsAPIException($error->getTermID(), $error->getMessage(), $error->getHttpStatus());
            default:
                return new GenericAPIException($error->getMessage(), $error->getHttpStatus());
        }
    }
}
