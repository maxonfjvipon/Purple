<?php

namespace Purple\Route\RtRegex;

use ElegantBro\Interfaces\Stringify;
use Exception;
use Purple\Frame;

/**
 * Route regex of {@ElegantBro\Interfaces\Stringify}
 * @package Purple\Route\RtRegex
 */
class RtRegexOfStringify extends RtRegex
{
    /**
     * Ctor.
     * @param Stringify $pattern
     * @param Frame $frame
     * @throws Exception
     */
    public function __construct(Stringify $pattern, Frame $frame)
    {
        parent::__construct($pattern->asString(), $frame);
    }
}