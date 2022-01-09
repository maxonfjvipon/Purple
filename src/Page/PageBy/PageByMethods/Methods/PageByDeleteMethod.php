<?php

namespace Purple\Page\PageBy\PageByMethods\Methods;

use JetBrains\PhpStorm\Pure;
use Purple\Page;
use Purple\Page\PageBy\PageByMethods\PageByMethods;
use Purple\PagePack;
use Purple\Response;

/**
 * Page by DELETE method
 * @package Purple\Page\PageBy\PageByMethods
 */
final class PageByDeleteMethod implements Page
{
    /**
     * @var Page $origin
     */
    private Page $origin;


    /**
     * Ctor wrap.
     * @param Page $page
     * @return PageByDeleteMethod
     */
    #[Pure] public static function new(Page $page): PageByDeleteMethod
    {
        return new self($page);
    }

    /**
     * Ctor.
     * @param Page $page
     */
    #[Pure] private function __construct(Page $page)
    {
        $this->origin = PageByMethods::new(['DELETE'], $page);
    }

    /**
     * @inheritDoc
     */
    public function handle(): PagePack
    {
        return $this->origin->handle();
    }

    /**
     * @inheritDoc
     */
    public function via(Response $response): Response
    {
        return $this->origin->via($response);
    }
}