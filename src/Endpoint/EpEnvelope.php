<?php

namespace Purple\Endpoint;

use Exception;
use Purple\Request\Request;
use Purple\Response\Response;

/**
 * Endpoint envelope.
 */
class EpEnvelope implements Endpoint
{
    /**
     * @var Endpoint
     */
    private Endpoint $origin;

    /**
     * Ctor.
     *
     * @param Endpoint $endpoint
     */
    public function __construct(Endpoint $endpoint)
    {
        $this->origin = $endpoint;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function act(Request $request): Response
    {
        return $this->origin->act($request);
    }
}
