<?php

namespace Purple\Exp;

/**
 * The page.
 * @package Purple\Exp
 */
interface Page
{
    /**
     * Refine yourself
     *
     * @param string $key
     * @param string $value
     * @return PagePack
     */
    public function by(string $key, string $value): PagePack;

    /**
     * Write yourself to the $output
     *
     * @param Response $response
     * @return Response
     */
    public function via(Response $response): Response;
}