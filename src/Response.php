<?php

namespace Purple;

use Exception;

/**
 * The response.
 * @package Purple
 */
interface Response
{
    /**
     * Clarify itself.
     *
     * @param string $name
     * @param string $value
     * @return Response
     */
    public function with(string $name, string $value): Response;

    /**
     * Send it self to the client.
     * @throws Exception
     */
    public function send(): void;
}