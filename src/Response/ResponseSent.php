<?php

namespace Purple\Response;

/**
 * Response sent.
 */
interface ResponseSent
{
    /**
     * Send itself to the client.
     *
     * @param Response $response
     * @return void
     */
    public function send(Response $response): void;
}
