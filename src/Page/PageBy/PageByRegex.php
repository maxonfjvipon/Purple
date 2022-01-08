<?php

namespace Purple\Page\PageBy;

use Purple\Page;
use Purple\PagePack;
use Purple\Response;

/**
 * Page by request regex.
 * @package Purple\Page\PageBy
 */
final class PageByRegex implements Page
{
    /**
     * @var string $pattern
     */
    private string $pattern;

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
     * @param string $regex
     * @param Page $page
     */
    public function __construct(string $regex, Page $page)
    {
        $this->pattern = $regex;
        $this->origin = $page;
    }

    /**
     * @inheritDoc
     */
    public function handle(): PagePack
    {
        return (isset($_SERVER[$this->key]) && preg_match($this->pattern, $_SERVER[$this->key]))
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