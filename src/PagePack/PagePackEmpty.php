<?php

namespace Purple\PagePack;

use Exception;
use Purple\Page;
use Purple\PagePack;

/**
 * Empty page pack.
 * @package Purple\PagePack
 */
final class PagePackEmpty implements PagePack
{

    /**
     * Ctor wrap.
     * @return PagePackEmpty
     */
    public static function new(): PagePackEmpty
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
     * @return Page
     * @throws Exception
     */
    public function origin(): Page
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