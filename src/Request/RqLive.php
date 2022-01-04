<?php


namespace Purple\Request;

use Purple\Request;

/**
 * Class RqLive
 * @package Purple\Request
 */
class RqLive extends RqPack
{
    public function __construct()
    {
        parent::__construct(new RqEmpty());
    }
}