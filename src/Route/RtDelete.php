<?php

namespace Maxonfjvipon\Purple\Route;

use Maxonfjvipon\Purple\Endpoint\Endpoint;

/**
 * Route DELETE.
 */
final class RtDelete extends RtWrap
{
    /**
     * Ctor.
     *
     * @param Route|Endpoint $origin
     */
    public function __construct(Route|Endpoint $origin)
    {
        parent::__construct(
            new RtMethod(
                "DELETE",
                $origin
            )
        );
    }
}
