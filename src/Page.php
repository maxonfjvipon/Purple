<?php

namespace Purple;

/**
 * The page.
 * @package Purple
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