<?php

namespace Purple\Response;

use Maxonfjvipon\Elegant_Elephant\Text\CastText;
use Purple\Headers;
use Purple\Response\Body\ResponseBody;

/**
 * The basic response.
 */
final class RsDefault implements Response
{
    use CastText;

    /**
     * @var Headers $headers
     */
    private Headers $headers;

    /**
     * @var ResponseBody $body
     */
    private ResponseBody $body;

    /**
     * Ctor wrap.
     *
     * @param Headers $headers
     * @param ResponseBody $body
     * @return self
     */
    public static function new(Headers $headers, ResponseBody $body): self
    {
        return new self($headers, $body);
    }

    /**
     * Ctor.
     *
     * @param Headers $headers
     * @param ResponseBody $body
     */
    public function __construct(Headers $headers, ResponseBody $body)
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
     * @return Headers
     */
    public function headers(): Headers
    {
        return $this->headers;
    }
}
