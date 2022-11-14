<?php

namespace Maxonfjvipon\Purple\Endpoint;

/**
 * Default optional endpoint.
 */
final class EpOptDefault implements OptionalEndpoint
{
    /**
     * Ctor.
     *
     * @param Endpoint $endpoint
     */
    public function __construct(private Endpoint $endpoint)
    {
    }

    /**
     * @return Endpoint
     */
    public function origin(): Endpoint
    {
        return $this->endpoint;
    }

    /**
     * @return bool
     */
    public function has(): bool
    {
        return true;
    }
}
