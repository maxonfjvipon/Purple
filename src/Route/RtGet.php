<?php

namespace Purple\Route;

use Purple\Endpoint\Endpoint;

/**
 * Route GET.
 */
final class RtGet extends RtEnvelope
{
    /**
     * @param Route|Endpoint $origin
     */
    public function __construct($origin)
    {
        parent::__construct(
            new RtMethod(
                "GET",
                $origin
            )
        );
    }
}
