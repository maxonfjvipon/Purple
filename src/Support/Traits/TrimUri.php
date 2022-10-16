<?php

namespace Purple\Support\Traits;

/**
 * Trim URI.
 */
trait TrimUri
{
    /**
     * @param string $uri
     * @return string
     */
    private function trimUri(string $uri): string
    {
        return trim($uri, "/ \t\n\r\0\x0B");
    }
}
