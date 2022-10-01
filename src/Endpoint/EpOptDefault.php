<?php

namespace Purple\Endpoint;

/**
 * Default optional endpoint.
 */
final class EpOptDefault implements OptionalEndpoint
{
    /**
     * @var Endpoint $origin
     */
    private Endpoint $origin;

    /**
     * Ctor.
     *
     * @param Endpoint $endpoint
     */
    public function __construct(Endpoint $endpoint)
    {
        $this->origin = $endpoint;
    }

    /**
     * @return Endpoint
     */
    public function origin(): Endpoint
    {
        return $this->origin;
    }

    /**
     * @return bool
     */
    public function has(): bool
    {
        return true;
    }
}
