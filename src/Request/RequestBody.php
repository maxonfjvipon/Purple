<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Purple\Body;

/**
 * Request body.
 */
interface RequestBody extends Body, Arrayable
{
    /**
     * Get param from body.
     *
     * @param string $name
     * @return mixed
     */
    public function param(string $name);
}
