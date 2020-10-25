<?php

namespace WARP\Exception\API;

class GenericAPIException extends APIExceptionAbstract
{
    public static function getErrorCode(): string
    {
        return '';
    }
}
