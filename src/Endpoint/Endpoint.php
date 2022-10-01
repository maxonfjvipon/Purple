<?php

namespace Purple\Endpoint;

use Purple\Request\Request;
use Purple\Response\Response;

/**
 * Endpoint.
 */
interface Endpoint
{
    /**
     * Handle the request and return the response.
     *
     * @param Request $request
     * @return Response
     */
    public function act(Request $request): Response;
}
