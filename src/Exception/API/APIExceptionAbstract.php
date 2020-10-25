<?php

namespace WARP\Exception\API;

abstract class APIExceptionAbstract extends \Exception
{
    abstract public static function getErrorCode(): string;
}
