<?php

namespace Purple\Endpoint;

use Exception;

/**
 * Empty optional endpoint.
 */
final class EpOptEmpty implements OptionalEndpoint
{
    /**
     * @return Endpoint
     * @throws Exception
     */
    public function origin(): Endpoint
    {
        throw new Exception("There's nothing here, use has() first to check");
    }

    /**
     * @return bool
     */
    public function has(): bool
    {
        return false;
    }
}
