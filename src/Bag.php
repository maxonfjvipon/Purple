<?php

namespace Maxonfjvipon\Purple;

/**
 * Bag.
 */
interface Bag
{
    /**
     * Get element by key.
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name): mixed;
}