<?php

namespace Purple\Exp\Page\PageBy;

use JetBrains\PhpStorm\Pure;
use Purple\Exp\PagePack;
use Purple\Exp\Response;
use Purple\Exp\Page;

/**
 * Page by request uri.
 * @package Purple\Exp\Page\PageBy
 */
final class PageByUri implements Page
{
    /**
     * @var string $uri
     */
    private string $uri;

    /**
     * @var Page $origin
     */
    private Page $origin;

    /**
     * Ctor.
     * @param string $path
     * @param Page $page
     */
    public function __construct(string $path, Page $page)
    {
        $this->uri = $path;
        $this->origin = $page;
    }

    /**
     * @inheritDoc
     */
    #[Pure] public function by(string $key, string $value): PagePack
    {
        if ($key === 'REQUEST_URI' && $value === $this->uri) {
            return new PagePack\PagePackSimple($this->origin);
        }
        return new PagePack\PagePackEmpty();
    }

    /**
     * @inheritDoc
     */
    public function via(Response $response): Response
    {
        return $this->origin->via($response);
    }
}