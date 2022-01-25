<?php

namespace Purple;

/**
 * The request.
 * @package Purple
 */
interface Request
{
    /**
     * @param string $key
     * @return string
     */
    public function envDataBy(string $key): string;

    /**
     * @param string $name
     * @return mixed
     */
    public function param(string $name): mixed;
}