<?php

namespace Purple\Request;

use Purple\Body;

/**
 * Request body.
 */
interface RequestBody extends Body
{
    /**
     * Get param from body.
     *
     * @param string $name
     * @return mixed
     */
    public function param(string $name);
}
