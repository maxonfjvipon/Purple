<?php

namespace Purple\Page\PageBy\PageByMethods;

use JetBrains\PhpStorm\Pure;
use Purple\Page;
use Purple\PagePack;
use Purple\PagePack\PagePackEmpty;
use Purple\Response;

/**
 * Page by methods.
 * @package Purple\Page\PageBy
 */
final class PageByMethods implements Page
{
    /**
     * @var array $methods
     */
    private array $methods;

    /**
     * @var Page $origin
     */
    private Page $origin;

    /**
     * @var string $key
     */
    private string $key = 'REQUEST_METHOD';

    /**
     * Ctor wrap of string.
     * @param string $methods
     * @param Page $page
     * @return PageByMethods
     */
    public static function newOfString(string $methods, Page $page): PageByMethods
    {
        return new self(array_map(fn($method) => trim($method), explode(",", $methods)), $page);
    }

    /**
     * Ctor wrap.
     * @param array $methods
     * @param Page $page
     * @return PageByMethods
     */
    #[Pure] public static function new(array $methods, Page $page): PageByMethods
    {
        return new self($methods, $page);
    }

    /**
     * Ctor.
     * @param array $mthds
     * @param Page $page
     */
    private function __construct(array $mthds, Page $page)
    {
        $this->methods = $mthds;
        $this->origin = $page;
    }

    /**
     * @inheritDoc
     */
    public function handle(): PagePack
    {
        return (isset($_SERVER[$this->key]) && in_array($_SERVER[$this->key], $this->methods))
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