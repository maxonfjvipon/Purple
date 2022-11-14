<?php

namespace Maxonfjvipon\Purple\Route;

use Maxonfjvipon\Purple\Endpoint\OptionalEndpoint;
use Maxonfjvipon\Purple\Request\Request;

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
