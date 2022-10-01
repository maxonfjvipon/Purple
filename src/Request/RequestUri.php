<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * Request URI.
 */
interface RequestUri extends Text
{
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
