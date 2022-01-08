<?php

namespace Purple\Page\PageBy;

use JetBrains\PhpStorm\Pure;
use Purple\PagePack;
use Purple\Response;
use Purple\Page;

/**
 * Page by request uri.
 * @package Purple\Page\PageBy
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
     * @var string $key
     */
    private string $key = 'REQUEST_URI';

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
    public function handle(): PagePack
    {
        return (isset($_SERVER[$this->key]) && $_SERVER[$this->key] === $this->uri)
            ? $this->origin->handle()
            : new PagePack\PagePackEmpty();
    }

    /**
     * @inheritDoc
     */
    public function via(Response $response): Response
    {
        return $this->origin->via($response);
    }
}