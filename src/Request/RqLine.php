<?php

namespace Purple\Request;

/**
 * Request line.
 */
final class RqLine implements RequestLine
{
    /**
     * @var string $method
     */
    private string $method;

    /**
     * @var RequestUri $uri
     */
    private RequestUri $uri;

    /**
     * Ctor.
     *
     * @param string $method
     * @param RequestUri $uri
     */
    public function __construct(string $method, RequestUri $uri)
    {
        $this->method = $method;
        $this->uri = $uri;
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
}
