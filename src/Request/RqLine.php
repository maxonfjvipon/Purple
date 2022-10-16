<?php

namespace Purple\Request;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\StringableText;

/**
 * Request line.
 */
final class RqLine implements RequestLine
{
    use StringableText;

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

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return $this->method . " " . $this->uri->asString();
    }
}
