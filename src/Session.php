<?php

namespace Purple;

use Exception;

/**
 * The session that process the request
 * @package Purple
 */
interface Session
{
    /**
     * Process the request
     * @throws Exception
     */
    public function process(): void;
}