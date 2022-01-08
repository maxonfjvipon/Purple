<?php


namespace Purple\Exp\Page\PageBy\PageByMethods\Methods;


use JetBrains\PhpStorm\Pure;
use Purple\Exp\Page;
use Purple\Exp\Page\PageBy\PageByMethods\PageByMethods;
use Purple\Exp\PagePack;
use Purple\Exp\Response;

/**
 * Page by GET method
 * @package Purple\Exp\Page\PageBy
 */
class PageByGetMethod implements Page
{
    /**
     * @var Page $origin
     */
    private Page $origin;

    /**
     * Ctor.
     * @param Page $page
     */
    #[Pure] public function __construct(Page $page)
    {
        $this->origin = new PageByMethods(['GET'], $page);
    }

    /**
     * @inheritDoc
     */
    public function by(string $key, string $value): PagePack
    {
        return $this->origin->by($key, $value);
    }

    /**
     * @inheritDoc
     */
    public function via(Response $response): Response
    {
        return $this->origin->via($response);
    }
}