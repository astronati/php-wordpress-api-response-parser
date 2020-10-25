<?php

namespace WARP\Exception\API;

/**
 * @see https://core.trac.wordpress.org/ticket/42781
 */
class ErrorResponse
{
    private $response;

    public function __construct(string $contents)
    {
        $this->response = \json_decode($contents);
    }

    public function getErrorCode(): string
    {
        return $this->response->code;
    }

    public function getMessage(): string
    {
        return $this->response->message;
    }

    public function getHttpStatus(): int
    {
        return $this->response->data->status;
    }

    public function getTermID(): string
    {
        return $this->response->data->term_id;
    }
}
