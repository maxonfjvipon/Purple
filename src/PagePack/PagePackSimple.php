<?php

namespace Purple\PagePack;

use Purple\Page;
use Purple\PagePack;

/**
 * Simple page pack.
 * @package Purple\PagePack
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