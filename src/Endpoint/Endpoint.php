<?php

namespace Maxonfjvipon\Purple\Endpoint;

use Exception;
use Maxonfjvipon\Purple\Request\Request;
use Maxonfjvipon\Purple\Response\Response;

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
     * @throws Exception
     */
    public function act(Request $request): Response;
}
