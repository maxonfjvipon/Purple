<?php

namespace Maxonfjvipon\Purple\Support;

use Maxonfjvipon\ElegantElephant\Txt\TxtTrimmed;
use Maxonfjvipon\ElegantElephant\Txt\TxtWrap;

final class TxtTrimmedUri extends TxtWrap
{
    public function __construct(string $uri)
    {
        parent::__construct(
            new TxtTrimmed($uri)
        );
    }
}