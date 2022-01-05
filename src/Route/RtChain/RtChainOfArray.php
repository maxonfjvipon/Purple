<?php

declare(strict_types=1);

namespace Purple\Route\RtChain;

use JetBrains\PhpStorm\Pure;

/**
 * Chain route of array
 * @package Purple\Route\RtChain
 */
class RtChainOfArray extends RtChain
{
    /**
     * Ctor.
     * @param array $routes
     */
    #[Pure] public function __construct(array $routes)
    {
        parent::__construct(...$routes);
    }
}