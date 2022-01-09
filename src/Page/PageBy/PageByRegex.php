<?php

namespace Purple\Page\PageBy;

use JetBrains\PhpStorm\Pure;
use Purple\Page;
use Purple\PagePack;
use Purple\PagePack\PagePackEmpty;
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
     * Ctor wrap.
     * @param string $regex
     * @param Page $page
     * @return PageByRegex
     */
    #[Pure] public static function new(string $regex, Page $page): PageByRegex
    {
        return new self($regex, $page);
    }

    /**
     * Ctor.
     * @param string $regex
     * @param Page $page
     */
    private function __construct(string $regex, Page $page)
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
            : PagePackEmpty::new();
    }

    /**
     * @inheritDoc
     */
    public function via(Response $response): Response
    {
        return $this->origin->via($response);
    }
}