<?php

namespace Maxonfjvipon\Purple\Request;

use Exception;

/**
 * Request line.
 */
final class RqLine implements RequestLine
{
    /**
     * Ctor.
     * @param string $method
     * @param RequestUri $uri
     * @param string $protocolVersion
     */
    public function __construct(
        private string $method,
        private RequestUri $uri,
        private string $protocolVersion
    )
    {
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return $this->method . " " . $this->uri->asString() . " " . $this->protocolVersion;
    }

    /**
     * @return string
     */
    public function method(): string
    {
        return $this->method;
    }

    /**
     * @return RequestUri
     */
    public function uri(): RequestUri
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function protocolVersion(): string
    {
        return $this->protocolVersion;
    }
}
