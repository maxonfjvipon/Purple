<?php


namespace Purple\Request;

use JetBrains\PhpStorm\Pure;
use Purple\Request;

/**
 * Class RqLive
 * @package Purple\Request
 */
class RqLive extends RqPack
{
    /**
     * Ctor.
     */
    #[Pure] public function __construct()
    {
        parent::__construct(new RqEmpty());
    }
}