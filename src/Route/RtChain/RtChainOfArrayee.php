<?php


namespace Purple\Route\RtChain;


use ElegantBro\Interfaces\Arrayee;
use Exception;

/**
 * Chain route of {@ElegantBro\Interfaces\Arrayee}
 * @package Purple\Route\RtChain
 */
class RtChainOfArrayee extends RtChain
{
    /**
     * Ctor.
     * @param Arrayee $rts
     * @throws Exception
     */
    public function __construct(Arrayee $rts)
    {
        parent::__construct(...$rts->asArray());
    }
}