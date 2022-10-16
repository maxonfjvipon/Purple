<?php

namespace Purple\Request;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Purple\Headers;
use Purple\Response\Headers\RsHdsWith;

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
     * @var RequestLine $line
     */
    private RequestLine $line;

    /**
     * @var RequestBody $body
     */
    private RequestBody $body;

    /**
     * Ctor wrap.
     *
     * @return $this
     */
    public static function new(): self
    {
        return new self(
            [
                'SERVER' => $_SERVER,
                'REQUEST' => $_REQUEST,
                'FILES' => $_FILES,
                'USER' => ''
            ],
            new RqLine(
                $_SERVER[RequestLine::METHOD],
                new RqUri([
                    RequestUri::PROTOCOL => $_SERVER[RequestUri::PROTOCOL] ?? 'http',
                    RequestUri::HOST => $_SERVER[RequestUri::HOST],
                    RequestUri::URI => $_SERVER[RequestUri::URI],
                    RequestUri::QUERY => $_SERVER[RequestUri::QUERY],
                ])
            ),
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
            new RqBody($_REQUEST)
        );
    }

    /**
     * Ctor.
     *
     * @param array $self
     * @param RequestHeaders $headers
     * @param RqLine $line
     * @param RequestBody $body
     */
    private function __construct(array $self, RqLine $line, RequestHeaders $headers, RequestBody $body)
    {
        $this->self = $self;
        $this->headers = $headers;
        $this->line = $line;
        $this->body = $body;
    }

    /**
     * @return RequestLine
     */
    public function line(): RequestLine
    {
        return $this->line;
    }

    /**
     * @return RequestHeaders
     */
    public function headers(): RequestHeaders
    {
        return $this->headers;
    }

    /**
     * @return RequestBody
     */
    public function body(): RequestBody
    {
        return $this->body;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return self
     * @throws Exception
     */
    public function with(string $name, $value): self
    {
        return new self(
            $this->self,
            $this->line,
            new RqHeaders(
                array_merge(
                    $this->headers->asArray(),
                    [$name => $value]
                )
            ),
            $this->body
        );
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->body()->param($name);
    }
}
