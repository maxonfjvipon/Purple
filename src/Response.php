<?php

namespace Purple;

use Exception;

/**
 * The output.
 * @package Purple
 */
interface Response
{
    /**
     * @param string $name
     * @param string $value
     * @return Response
     */
    public function with(string $name, string $value): Response;

    /**
     * @throws Exception
     */
    public function send(): void;
}