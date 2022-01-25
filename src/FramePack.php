<?php

namespace Purple;

use Exception;

/**
 * Pack for the frame.
 * @package Purple
 */
interface FramePack
{
    /**
     * Return origin frame if not empty
     * @return Frame
     * @throws Exception
     */
    public function origin(): Frame;

    /**
     * Check if origin frame exists
     * @return bool
     */
    public function has(): bool;
}