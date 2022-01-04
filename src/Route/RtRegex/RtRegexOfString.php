<?php

namespace Purple\Route\RtRegex;

use ElegantBro\Stringify\Just;
use JetBrains\PhpStorm\Pure;
use Purple\Frame;

class RtRegexOfString extends RtRegex
{
    #[Pure] public function __construct(string $pattern, Frame $frame)
    {
        parent::__construct(new Just($pattern), $frame);
    }
}