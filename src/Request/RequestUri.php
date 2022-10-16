<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Request URI.
 * {PROTOCOL}://{HOST}{URI}
 */
interface RequestUri extends Text
{
    public const PROTOCOL = 'REQUEST_SCHEME';
    public const HOST = 'HTTP_HOST';
    public const URI = 'REQUEST_URI';
    public const QUERY = 'QUERY_STRING';

    /**
     * @return string request host
     */
    public function host(): string;

    /**
     * @return string request query
     */
    public function query(): string;

    /**
     * @return string request path without query
     */
    public function path(): string;
}
