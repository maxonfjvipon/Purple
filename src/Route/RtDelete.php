<?php

namespace Purple\Route;

use Purple\Endpoint\Endpoint;

/**
 * Route DELETE.
 */
final class RtDelete extends RtEnvelope
{
    /**
     * @param Route|Endpoint $origin
     */
    public function __construct($origin)
    {
        parent::__construct(
            new RtMethod(
                "DELETE",
                $origin
            )
        );
    }
}
