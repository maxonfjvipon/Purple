<?php

namespace Purple\Request;

use Purple\Headers;

/**
 * Request headers.
 */
interface RequestHeaders extends Headers
{
    public const ROUTE_PREFIXES = "X-Route-Prefixes";
}
