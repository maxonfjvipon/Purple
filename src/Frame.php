<?php


namespace Purple;

use Exception;

/**
 * Interface Frame
 * @package Purple
 */
interface Frame
{
    /**
     * Handle request and return response
     *
     * @param Request $request request to handle
     * @return Response
     * @throws Exception
     */
    public function handle(Request $request): Response;
}