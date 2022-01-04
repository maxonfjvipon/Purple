<?php


namespace Purple\Route\RtChain;


use ElegantBro\Interfaces\Arrayee;

class RtChainOfArrayee extends RtChain
{
    /**
     * RtChainOfArrayee constructor.
     * @param Arrayee $rts
     * @throws \Exception
     */
    public function __construct(Arrayee $rts)
    {
        parent::__construct(...$rts->asArray());
    }
}