<?php


namespace Purple\Frame\FrRoute;


use JetBrains\PhpStorm\Pure;
use Purple\Route\Route;

class FrRouteOfArray extends FrRoute
{
    #[Pure] public function __construct(array $rts)
    {
        parent::__construct(...$rts);
    }
}