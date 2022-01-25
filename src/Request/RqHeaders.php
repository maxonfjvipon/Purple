<?php

namespace Purple\Request;

use Purple\Request;

/**
 * Request headers.
 * @package Purple\Request
 */
final class RqHeaders implements RequestHeaders
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @param Request $req
     * @return RqHeaders
     */
    public static function new(Request $req): RqHeaders
    {
        return new self($req);
    }

    /**
     * Ctor.
     * @param Request $req
     */
    private function __construct(Request $req)
    {
        $this->request = $req;
    }

    /**
     * @param string $key
     * @return string
     */
    public function header(string $key): string
    {
        return $this->request->envDataBy($key);
    }
}