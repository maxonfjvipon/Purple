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
     * @return Page
     */
    public function by(string $key, string $value): Page;

    /**
     * Write yourself to the $output
     *
     * @param Response $output
     * @return Response
     */
    public function via(Response $output): Response;
}