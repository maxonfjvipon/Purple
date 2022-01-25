<?php

namespace Purple\Frame\FramePack;

use JetBrains\PhpStorm\Pure;
use Purple\Frame;
use Purple\FramePack;

/**
 * Simple frame pack.
 * @package Purple\Frame\FramePack
 */
final class FrPackSimple implements FramePack
{
    /**
     * @var Frame $origin
     */
    private Frame $origin;

    /**
     * Ctor wrap.
     *
     * @param Frame $page
     * @return FrPackSimple
     */
    #[Pure] public static function new(Frame $page): FrPackSimple
    {
        return new self($page);
    }

    /**
     * Ctor.
     * @param Frame $orgn
     */
    private function __construct(Frame $orgn)
    {
        $this->origin = $orgn;
    }

    /**
     * @return Frame
     */
    public function origin(): Frame
    {
        return $this->origin;
    }

    /**
     * @return bool
     */
    public function has(): bool
    {
        return true;
    }
}