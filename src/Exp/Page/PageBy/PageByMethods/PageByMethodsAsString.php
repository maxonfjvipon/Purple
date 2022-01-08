<?php

namespace Purple\Exp\Page\PageBy\PageByMethods;

use Purple\Exp\Page;

/**
 * Page by methods that presented as string
 * @package Purple\Exp\Page\PageBy
 */
final class PageByMethodsAsString extends PageByMethods
{
    public function __construct(string $methods, Page $page)
    {
        parent::__construct(array_map(fn($method) => trim($method), explode(",", $methods)), $page);
    }
}