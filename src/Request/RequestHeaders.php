<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Request headers.
 */
interface RequestHeaders extends Arrayable
{
    /**
     * @param string $key
     * @return float|int|string
     */
    public function header(string $key);
}
