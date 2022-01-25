<?php

namespace Purple\Request;

use Exception;
use Purple\Request;

/**
 * Live request.
 * @package Purple\Request
 */
final class RqLive implements Request
{
    /**
     * @var array $server
     */
    private array $server;

    /**
     * @var array $request
     */
    private array $request;

    /**
     * @var array $files
     */
    private array $files;

    /**
     * Ctor wrap.
     * @return RqLive
     */
    public static function new(): RqLive
    {
        return new self();
    }

    /**
     * Ctor.
     * @throws Exception
     */
    private function __construct()
    {
        $this->server = $_SERVER;
        $this->request = $_REQUEST;
        $this->files = $_FILES;
    }

    /**
     * @param string $key
     * @return string
     */
    public function envDataBy(string $key): string
    {
        return $this->server[$key];
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function param(string $name): mixed
    {
        return $this->request[$name];
    }
}