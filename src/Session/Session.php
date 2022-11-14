<?php

namespace Maxonfjvipon\Purple\Session;

use Exception;

/**
 * The session that process the request
 */
interface Session
{
    /**
     * Process the request.
     *
     * @return void
     * @throws Exception
     */
    public function process(): void;
}
