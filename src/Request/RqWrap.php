<?php

namespace Maxonfjvipon\Purple\Request;

/**
 * Request wrap.
 */
class RqWrap implements Request
{
    /**
     * Ctor.
     * @param Request $request
     */
    public function __construct(protected Request $request)
    {
    }

    /**
     * @inheritDoc
     */
    public function line(): RequestLine
    {
        return $this->request->line();
    }

    /**
     * @inheritDoc
     */
    public function headers(): RequestHeaders
    {
        return $this->request->headers();
    }

    /**
     * @inheritDoc
     */
    public function body(): RequestBody
    {
        return $this->request->body();
    }

    /**
     * @inheritDoc
     */
    public function cookie(): RequestCookie
    {
        return $this->request->cookie();
    }

    /**
     * @inheritDoc
     */
    public function files(): RequestFiles
    {
        return $this->request->files();
    }

    /**
     * @inheritDoc
     */
    public function __get(string $name)
    {
        return $this->request->__get($name);
    }
}