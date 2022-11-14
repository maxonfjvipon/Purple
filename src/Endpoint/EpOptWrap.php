<?php

namespace Maxonfjvipon\Purple\Endpoint;

use Exception;

/**
 * Optional endpoint wrap.
 */
class EpOptWrap implements OptionalEndpoint
{
    /**
     * Ctor.
     * @param OptionalEndpoint $origin
     */
    public function __construct(private OptionalEndpoint $origin)
    {
    }

    /**
     * @return Endpoint
     * @throws Exception
     */
    public function origin(): Endpoint
    {
        return $this->origin->origin();
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function has(): bool
    {
        return $this->origin->has();
    }
}