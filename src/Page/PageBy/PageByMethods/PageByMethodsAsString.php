<?php

namespace Purple\Page\PageBy\PageByMethods;

use Purple\Page;

/**
 * Page by methods that presented as string
 * @package Purple\Page\PageBy
 */
final class PageByMethodsAsString extends PageByMethods
{
    public function __construct(string $methods, Page $page)
    {
        parent::__construct(array_map(fn($method) => trim($method), explode(",", $methods)), $page);
    }
}