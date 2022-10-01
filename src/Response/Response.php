<?php

namespace Purple\Response;

use Exception;

/**
 * The response.
 */
interface Response
{
    /**
     * Clarify itself.
     *
     * @param string $name
     * @param string|float|int $value
     * @return Response
     */
    public function with(string $name, $value): Response;

    /**
     * Send itself to the client.
     *
     * @throws Exception
     */
    public function send(): void;
}
