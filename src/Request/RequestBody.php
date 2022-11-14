<?php

namespace Maxonfjvipon\Purple\Request;

use Maxonfjvipon\ElegantElephant\Txt\StringableTxt;
use Maxonfjvipon\Purple\Bag;
use Maxonfjvipon\Purple\Body;

/**
 * Request body.
 */
interface RequestBody extends Body, StringableTxt, Bag
{
}
