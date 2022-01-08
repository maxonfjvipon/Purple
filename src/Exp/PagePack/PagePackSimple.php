<?php

namespace Purple\Exp\PagePack;

use Purple\Exp\Page;
use Purple\Exp\PagePack;

/**
 * Simple page pack.
 * @package Purple\Exp\PagePack
 */
final class PagePackSimple implements PagePack
{
    /**
     * @var Page $origin
     */
    private Page $origin;

    /**
     * Ctor.
     * @param Page $orgn
     */
    public function __construct(Page $orgn)
    {
        $this->origin = $orgn;
    }

    /**
     * @return Page
     */
    public function origin(): Page
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