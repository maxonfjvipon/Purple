<?php


namespace Purple\Request;


/**
 *
 * @package Purple\Request
 */
interface RequestHeaders
{
    /**
     * @param string $key
     * @return mixed
     */
    public function header(string $key): mixed;
}