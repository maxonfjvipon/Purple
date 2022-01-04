<?php

declare(strict_types=1);

namespace Purple\Route\RtChain;

use JetBrains\PhpStorm\Pure;

class RtChainOfArray extends RtChain
{
    /**
     * RtChainOfArray constructor.
     * @param array $routes
     */
    #[Pure] public function __construct(array $routes)
    {
        parent::__construct(...$routes);
    }
}