<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Request line.
 * {METHOD} {URI} HTTP/1.1
 */
interface RequestLine extends Text
{
    public const METHOD = "REQUEST_METHOD";

    /**
     * @return string request method
     */
    public function method(): string;

    /**
     * @return RequestUri request uri
     */
    public function uri(): RequestUri;
}
