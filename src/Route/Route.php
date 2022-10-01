<?php

namespace Purple\Route;

use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;

/**
 * Route.
 */
interface Route
{
    /**
     * Reach the destination - OptionalEndpoint
     *
     * @param Request $request
     * @return OptionalEndpoint
     */
    public function destination(Request $request): OptionalEndpoint;
}
