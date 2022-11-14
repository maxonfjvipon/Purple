<?php

namespace Maxonfjvipon\Purple\Request;

/**
 * Request of.
 */
final class RequestOf implements Request
{
    /**
     * Ctor.
     * @param RequestLine $line
     * @param RequestHeaders $headers
     * @param RequestBody $body
     * @param RequestCookie $cookie
     * @param RequestFiles $files
     */
    public function __construct(
        private RequestLine $line,
        private RequestHeaders $headers,
        private RequestBody $body,
        private RequestCookie $cookie,
        private RequestFiles $files,
    )
    {
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
     * @return RequestCookie
     */
    public function cookie(): RequestCookie
    {
        return $this->cookie;
    }

    /**
     * @return RequestFiles
     */
    public function files(): RequestFiles
    {
        return $this->files;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->body()->get($name);
    }
}