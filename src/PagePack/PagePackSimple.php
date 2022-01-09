<?php

namespace Purple\PagePack;

use JetBrains\PhpStorm\Pure;
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
     * Ctor wrap.
     *
     * @param Page $page
     * @return PagePackSimple
     */
    #[Pure] public static function new(Page $page): PagePackSimple
    {
        return new self($page);
    }

    /**
     * Ctor.
     * @param Page $orgn
     */
    private function __construct(Page $orgn)
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