<?php

namespace Purple\Route\RtMethods;

use ElegantBro\Stringify\Just;
use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayee\Exploded\ExplodedByComma;
use Purple\Frame;

/**
 * Route methods of string
 * @package Purple\Route\RtMethods
 */
class RtMethodsOfString extends RtMethods
{
    /**
     * Ctor.
     * @param string $methods
     * @param Frame $frame
     * @throws Exception
     */
    public function __construct(string $methods, Frame $frame)
    {
        parent::__construct((new ExplodedByComma(
            new Just($methods)
        ))->asArray() ,$frame);
    }
}