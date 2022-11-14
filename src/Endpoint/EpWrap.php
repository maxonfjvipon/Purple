<?php

namespace Maxonfjvipon\Purple\Endpoint;

use Exception;
use Maxonfjvipon\Purple\Request\Request;
use Maxonfjvipon\Purple\Response\Response;

/**
 * Endpoint envelope.
 */
class EpWrap implements Endpoint
{
    /**
     * Ctor.
     *
     * @param Endpoint $endpoint
     */
    public function __construct(private Endpoint $endpoint)
    {
    }

    /**
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function act(Request $request): Response
    {
        return $this->endpoint->act($request);
    }
}
