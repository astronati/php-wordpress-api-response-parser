<?php

namespace WARP\Exception\API;

use Throwable;

class TermExistsAPIException extends APIExceptionAbstract
{
    /**
     * @var int
     */
    private $termID;

    public function __construct($termID, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->termID = $termID;
    }

    public function getTermID(): int
    {
        return $this->termID;
    }

    public static function getErrorCode(): string
    {
        return 'term_exists';
    }
}
