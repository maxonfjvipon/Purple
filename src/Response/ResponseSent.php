<?php

namespace Purple\Response;

/**
 * Response sent.
 */
interface ResponseSent extends Response
{
    /**
     * Send itself to the client.
     *
     * @return void
     */
    public function send(): void;
}
