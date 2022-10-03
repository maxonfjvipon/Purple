<?php

namespace Purple\Response;

use Purple\Headers;
use Purple\Response\Body\ResponseBody;

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
     * @return Headers
     */
    public function headers(): Headers
    {
        return $this->origin->headers();
    }
}
