<?php

namespace Maxonfjvipon\Purple\Route;

use Maxonfjvipon\Purple\Endpoint\Endpoint;

/**
 * Route PUT.
 */
final class RtPut extends RtWrap
{
    /**
     * Ctor.
     *
     * @param Endpoint|Route $origin
     */
    public function __construct(Endpoint|Route $origin)
    {
        parent::__construct(
            new RtMethod(
                "PUT",
                $origin
            )
        );
    }
}
