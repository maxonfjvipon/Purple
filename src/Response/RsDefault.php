<?php

namespace Purple\Response;

use Purple\Headers;
use Purple\Response\Body\ResponseBody;
use Purple\Response\Headers\ResponseHeaders;

/**
 * The basic response.
 */
final class RsDefault implements Response
{
    /**
     * @var ResponseHeaders $headers
     */
    private ResponseHeaders $headers;

    /**
     * @var ResponseBody $body
     */
    private ResponseBody $body;

    /**
     * Ctor.
     *
     * @param ResponseHeaders $headers
     * @param ResponseBody $body
     */
    public function __construct(ResponseHeaders $headers, ResponseBody $body)
    {
        $this->headers = $headers;
        $this->body = $body;
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
