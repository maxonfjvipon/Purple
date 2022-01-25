<?php

namespace Purple\Frame\FramePack;

use Exception;
use Purple\Frame;
use Purple\FramePack;

/**
 * Empty frame pack.
 * @package Purple\Frame\FramePack
 */
final class FrPackEmpty implements FramePack
{
    /**
     * Ctor wrap.
     * @return FrPackEmpty
     */
    public static function new(): FrPackEmpty
    {
        return new self();
    }

    /**
     * Ctor.
     */
    private function __construct()
    {
    }

    /**
     * @return Frame
     * @throws Exception
     */
    public function origin(): Frame
    {
        throw new Exception("There's nothing here, use has() first to check");
    }

    /**
     * @return bool
     */
    public function has(): bool
    {
        return false;
    }
}