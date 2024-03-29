<?php

namespace Maxonfjvipon\Purple\Route;

use Maxonfjvipon\Purple\Request\Request;

/**
 * Route with method.
 */
final class RtMethod extends RtWrap
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
                fn (Request $request) => $method === $request->line()->method(),
                $origin,
            )
        );
    }
}
