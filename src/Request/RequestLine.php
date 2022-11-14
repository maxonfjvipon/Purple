<?php

namespace Maxonfjvipon\Purple\Request;

use Maxonfjvipon\ElegantElephant\Txt;

/**
 * Request line.
 * {METHOD} {URI} HTTP/1.1
 */
interface RequestLine extends Txt
{
    public const METHOD = "REQUEST_METHOD";
    public const PROTOCOL_VERSION = 'SERVER_PROTOCOL';

    /**
     * @return string request method
     */
    public function method(): string;

    /**
     * @return RequestUri request uri
     */
    public function uri(): RequestUri;

    /**
     * @return string request http version
     */
    public function protocolVersion(): string;
}
