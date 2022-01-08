<?php

namespace Purple\Exp;

use Exception;

/**
 * The session that process the request
 * @package Purple\Exp
 */
interface Session
{
    /**
     * Process the request
     * @throws Exception
     */
    public function process(): void;
}