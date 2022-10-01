<?php

namespace Purple\Endpoint;

use Exception;

/**
 * Optional endpoint.
 */
interface OptionalEndpoint
{
    /**
     * Origin endpoint.
     *
     * @return Endpoint
     * @throws Exception
     */
    public function origin(): Endpoint;

    /**
     * Is origin empty or not.
     *
     * @return bool
     * @throws Exception
     */
    public function has(): bool;
}
