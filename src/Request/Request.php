<?php

namespace Purple\Request;

use Exception;
use Purple\Headers;
use Purple\WithBody;
use Purple\WithHeaders;

/**
 * The request.
 */
interface Request extends WithHeaders, WithBody
{
    /**
     * Get request headers.
     *
     * @return RequestHeaders
     */
    public function headers(): RequestHeaders;

    /**
     * Get request body.
     *
     * @return RequestBody
     */
    public function body(): RequestBody;

    /**
     * Get request line.
     *
     * @return RequestLine
     */
    public function line(): RequestLine;

    /**
     * Add new header to itself.
     *
     * @param string $name
     * @param mixed $value
     * @return self
     * @throws Exception
     */
    public function with(string $name, $value): self;

    /**
     * Get param from {@see RequestBody}
     *
     * @param $name
     * @return mixed
     */
    public function __get($name);
}
