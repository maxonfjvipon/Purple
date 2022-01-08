<?php

namespace Purple\Exp\Page\PageBy\PageByMethods\Methods;

use JetBrains\PhpStorm\Pure;
use Purple\Exp\Page;
use Purple\Exp\Page\PageBy\PageByMethods\PageByMethods;
use Purple\Exp\PagePack;
use Purple\Exp\Response;

/**
 * Page by POST method
 * @package Purple\Exp\Page\PageBy\PageByMethods
 */
final class PageByPostMethod implements Page
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
        $this->origin = new PageByMethods(['POST'], $page);
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