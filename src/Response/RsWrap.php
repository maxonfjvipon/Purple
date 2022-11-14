<?php

namespace Maxonfjvipon\Purple\Response;

use Maxonfjvipon\Purple\Response\Body\ResponseBody;
use Maxonfjvipon\Purple\Response\Headers\ResponseHeaders;

/**
 * Response envelope.
 */
class RsWrap implements Response
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
