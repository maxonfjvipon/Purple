<?php

namespace Purple\Request;

/**
 * Request line.
 * {METHOD} {URI} HTTP/1.1
 */
interface RequestLine
{
    const METHOD = "REQUEST_METHOD";

    /**
     * @return string request method
     */
    public function method(): string;

    /**
     * @return RequestUri request uri
     */
    public function uri(): RequestUri;
}
