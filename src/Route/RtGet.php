<?php

namespace Maxonfjvipon\Purple\Route;

use Maxonfjvipon\Purple\Endpoint\Endpoint;

/**
 * Route GET.
 */
final class RtGet extends RtWrap
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
                "GET",
                $origin
            )
        );
    }
}
