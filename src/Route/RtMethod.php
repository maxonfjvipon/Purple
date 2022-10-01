<?php

namespace Purple\Route;

use Exception;
use Purple\Endpoint\Endpoint;
use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;

/**
 * Route with method.
 */
final class RtMethod implements Route
{
    /**
     * @var string $method
     */
    private string $method;

    /**
     * @var Endpoint|Route $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param string $method
     * @param Endpoint|Route $origin
     */
    public function __construct(string $method, $origin)
    {
        $this->method = $method;
        $this->origin = $origin;
    }

    /**
     * @param Request $request
     * @return OptionalEndpoint
     * @throws Exception
     */
    public function destination(Request $request): OptionalEndpoint
    {
        return (new RtIf(
            $this->method === $request->method(),
            $this->origin
        ))->destination($request);
    }
}
