<?php

namespace Purple;

/**
 * The frame.
 * @package Purple
 */
interface Frame
{
    /**
     * Handle request
     *
     * @param Request $req
     * @return FramePack
     */
    public function handle(Request $req): FramePack;

    /**
     * Returns the the modified response the frame wrote itself in via {$response}
     *
     * @param Response $response
     * @return Response
     */
    public function writtenInVia(Response $response): Response;
}