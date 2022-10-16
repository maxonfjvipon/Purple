<?php

namespace Purple\Response;

use Purple\Headers;
use Purple\Response\Body\ResponseBody;
use Purple\Response\Headers\ResponseHeaders;

/**
 * Response envelope.
 */
class RsEnvelope implements Response
{
    /**
     * @var Response $origin
     */
    private Response $origin;

    /**
     * Ctor.
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->origin = $response;
    }

    /**
     * @return ResponseBody
     */
    public function body(): ResponseBody
    {
        return $this->origin->body();
    }

    /**
     * @return ResponseHeaders
     */
    public function headers(): ResponseHeaders
    {
        return $this->origin->headers();
    }
}
