<?php

namespace Purple\Route;

use Purple\Request\Request;

/**
 * Route with method.
 */
final class RtMethod extends RtEnvelope
{
    /**
     * Ctor.
     *
     * @param string $method
     * @param Route $origin
     */
    public function __construct(string $method, Route $origin)
    {
        parent::__construct(
            new RtIf(
                $origin,
                fn (Request $request) => $method === $request->line()->method()
            )
        );
    }
}
