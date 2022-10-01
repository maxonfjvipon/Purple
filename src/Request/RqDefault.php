<?php

namespace Purple\Request;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;

/**
 * Live request.
 */
final class RqDefault implements Request
{
    /**
     * @var array<array<mixed>> $self
     */
    private array $self;

    /**
     * @var RequestHeaders $headers
     */
    private RequestHeaders $headers;

    /**
     * @var RqUri $uri
     */
    private RequestUri $uri;

    /**
     * Ctor wrap.
     *
     * @return $this
     */
    public function new(): self
    {
        return new self(
            [
                'SERVER' => $_SERVER,
                'REQUEST' => $_REQUEST,
                'FILES' => $_FILES
            ],
            new RqHeaders([
                'HTTP_ACCEPT' => $_SERVER['HTTP_ACCEPT'],
                'HTTP_ACCEPT_CHARSET' => $_SERVER['HTTP_ACCEPT_CHARSET'] ?? 'iso-8859-1,*,utf-8',
                'HTTP_ACCEPT_ENCODING' => $_SERVER['HTTP_ACCEPT_ENCODING'],
                'HTTP_ACCEPT_LANGUAGE' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
                'HTTP_CONNECTION' => $_SERVER['HTTP_CONNECTION'],
                'HTTP_HOST' => $_SERVER['HTTP_HOST'],
                'HTTP_REFERER' => $_SERVER['HTTP_REFERER'] ?? '',
                'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
            ]),
            new RqUri([
                'PROTOCOL' => $_SERVER['REQUEST_SCHEME'] ?? "http",
                'HOST' => $_SERVER['HTTP_HOST'],
                'URI' => $_SERVER['REQUEST_URI'],
                'QUERY' => $_SERVER['QUERY_STRING']
            ])
        );
    }

    /**
     * Ctor.
     */
    private function __construct(array $self, RqHeaders $headers, RqUri $uri)
    {
        $this->self = $self;
        $this->headers = $headers;
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function method(): string
    {
        return $this->self['SERVER']['REQUEST_METHOD'];
    }

    /**
     * @return RequestUri
     */
    public function uri(): RequestUri
    {
        return $this->uri;
    }

    /**
     * @return RequestHeaders
     */
    public function headers(): RequestHeaders
    {
        return $this->headers;
    }

    public function body()
    {
        // TODO: Implement body() method.
    }

    /**
     * @param string $name
     * @param string|float|int $value
     * @return self
     * @throws Exception
     */
    public function with(string $name, $value): self
    {
        return new self(
            $this->self,
            new RqHeaders(
                array_merge(
                    $this->headers->asArray(),
                    [$name => $value]
                )
            ),
            $this->uri
        );
    }
}
