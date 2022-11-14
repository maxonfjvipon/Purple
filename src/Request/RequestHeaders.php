<?php

namespace Maxonfjvipon\Purple\Request;

use Maxonfjvipon\Purple\Headers;

/**
 * Request headers.
 */
interface RequestHeaders extends Headers
{
    public const HTTP_ACCEPT = 'HTTP_ACCEPT';
    public const HTTP_ACCEPT_CHARSET = 'HTTP_ACCEPT_CHARSET';
    public const HTTP_ACCEPT_ENCODING = 'HTTP_ACCEPT_ENCODING';
    public const HTTP_ACCEPT_LANGUAGE = 'HTTP_ACCEPT_LANGUAGE';
    public const HTTP_CONNECTION = 'HTTP_CONNECTION';
    public const HTTP_HOST = 'HTTP_HOST';
    public const HTTP_REFERER = 'HTTP_REFERER';
    public const HTTP_USER_AGENT = 'HTTP_USER_AGENT';

    public const X_ROUTE_PREFIXES = "X-Route-Prefixes";
}
