<?php

namespace Purple\Frame\FrRoute;

use ElegantBro\Interfaces\Arrayee;
use Purple\Frame;
use Purple\Request;
use Purple\Response;
use Purple\Route\Route;
use Purple\Route\RtChain\RtChain;
use Purple\Route\RtChain\RtChainOfArray;

class FrRoute implements Frame
{
    /**
     * @var Route[]
     */
    private array $routes;

    /**
     * FrRoute constructor.
     * @param Route ...$rts
     */
    public function __construct(Route ...$rts)
    {
        $this->routes = $rts;
    }

    /**
     * @inheritDoc
     */
    public function handle(Request $request): Response
    {
        return (new RtChainOfArray($this->routes))->send($request);
    }
}