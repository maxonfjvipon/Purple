<?php

namespace Purple\Route;

use Purple\Endpoint\Endpoint;

/**
 * Route POST.
 */
final class RtPost extends RtEnvelope
{
    /**
     * Ctor.
     *
     * @param Route|Endpoint $origin
     */
    public function __construct($origin)
    {
        parent::__construct(
            new RtMethod(
                "POST",
                $origin
            )
        );
    }
}
