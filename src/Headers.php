<?php

namespace Purple;

use Maxonfjvipon\Elegant_Elephant\Arrayable;

/**
 * Headers.
 */
interface Headers extends Arrayable
{
    /**
     * @param string $key
     * @return mixed
     */
    public function header(string $key);
}
