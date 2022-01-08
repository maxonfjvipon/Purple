<?php

namespace Purple\Exp\PagePack;

use Exception;
use Purple\Exp\Page;
use Purple\Exp\PagePack;

/**
 * Empty page pack.
 * @package Purple\Exp\PagePack
 */
final class PagePackEmpty implements PagePack
{
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