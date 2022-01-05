<?php


namespace Purple\Route\RtMethods;


use ElegantBro\Interfaces\Arrayee;
use Exception;
use Purple\Frame;

/**
 * Route methods of {@ElegantBro\Interfaces\Arrayee}
 * @package Purple\Route\RtMethods
 */
class RtMethodsOfArrayee extends RtMethods
{
    /**
     * Ctor.
     * @param Arrayee $methods
     * @param Frame $frame
     * @throws Exception
     */
    public function __construct(Arrayee $methods, Frame $frame)
    {
        parent::__construct($methods->asArray(), $frame);
    }
}