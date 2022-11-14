<?php

namespace Maxonfjvipon\Purple\Request;

use Exception;
use Maxonfjvipon\Purple\WithBody;
use Maxonfjvipon\Purple\WithHeaders;

/**
 * The request.
 */
interface Request extends WithHeaders, WithBody
{
    /**
     * Get request line.
     *
     * @return RequestLine
     */
    public function line(): RequestLine;

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
     * Get request cookie.
     *
     * @return RequestCookie
     */
    public function cookie(): RequestCookie;

    /**
     * Get request files
     *
     * @return RequestFiles
     */
    public function files(): RequestFiles;

    /**
     * Get param from {@see RequestBody}
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name);
}
