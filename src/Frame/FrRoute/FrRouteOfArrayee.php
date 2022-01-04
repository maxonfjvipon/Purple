<?php


namespace Purple\Frame\FrRoute;


use ElegantBro\Interfaces\Arrayee;
use Exception;

class FrRouteOfArrayee extends FrRoute
{
    /**
     * FrRouteOfArrayee constructor.
     * @param Arrayee $rts
     * @throws Exception
     */
    public function __construct(Arrayee $rts)
    {
        parent::__construct(...$rts->asArray());
    }
}