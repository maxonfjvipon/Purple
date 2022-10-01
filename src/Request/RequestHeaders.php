<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Request headers.
 */
interface RequestHeaders extends Arrayable
{
    const ROUTE_PREFIXES = "X-ROUTE-PREFIXES";

    /**
     * @param string $key
     * @return mixed
     */
    public function header(string $key);
}
