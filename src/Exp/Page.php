<?php

namespace Purple\Exp;

/**
 * The page.
 * @package Purple\Exp
 */
interface Page
{
    /**
     * Handle request
     *
     * @return PagePack
     */
    public function handle(): PagePack;

    /**
     * Write yourself to the $output
     *
     * @param Response $response
     * @return Response
     */
    public function via(Response $response): Response;
}