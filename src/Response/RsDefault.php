<?php

namespace Maxonfjvipon\Purple\Response;

use Maxonfjvipon\Purple\Response\Body\ResponseBody;
use Maxonfjvipon\Purple\Response\Headers\ResponseHeaders;

/**
 * The basic response.
 */
final class RsDefault implements Response
{
    /**
     * Ctor.
     *
     * @param ResponseHeaders $headers
     * @param ResponseBody $body
     */
    public function __construct(
        private ResponseHeaders $headers,
        private ResponseBody $body
    )
    {
    }

    /**
     * @return ResponseBody
     */
    public function body(): ResponseBody
    {
        return $this->body;
    }

    /**
     * @return ResponseHeaders
     */
    public function headers(): ResponseHeaders
    {
        return $this->headers;
    }
}
