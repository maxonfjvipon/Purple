<?php

namespace Purple\Exp;

use Exception;

/**
 * Pack for the page.
 * @package Purple\Exp
 */
interface PagePack
{
    /**
     * Return origin page if not empty
     * @return Page
     * @throws Exception
     */
    public function origin(): Page;

    /**
     * Check if origin page exists
     * @return bool
     */
    public function has(): bool;
}