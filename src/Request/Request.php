<?php

namespace Purple\Request;

use Exception;

/**
 * The request.
 */
interface Request
{
    /**
     * @return string request method
     */
    public function method(): string;

    /**
     * @return RequestUri request uri
     */
    public function uri(): RequestUri;

    /**
     * @return RequestHeaders headers
     */
    public function headers(): RequestHeaders;

    public function body();

    /**
     * Add new header to itself.
     *
     * @param string $name
     * @param mixed $value
     * @return self
     * @throws Exception
     */
    public function with(string $name, $value): self;
}
