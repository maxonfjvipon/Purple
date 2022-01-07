<?php


namespace Purple\Exp;


use Exception;

/**
 * The output.
 * @package Purple\Exp
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