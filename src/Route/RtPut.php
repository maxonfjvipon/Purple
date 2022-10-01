<?php

namespace Purple\Route;

use Purple\Endpoint\Endpoint;

/**
 * Route PUT.
 */
final class RtPut extends RtEnvelope
{
    /**
     * @param Route|Endpoint $origin
     */
    public function __construct($origin)
    {
        parent::__construct(
            new RtMethod(
                "PUT",
                $origin
            )
        );
    }
}
