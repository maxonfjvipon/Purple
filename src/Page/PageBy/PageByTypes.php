<?php

namespace Purple\Page\PageBy;

use JetBrains\PhpStorm\Pure;
use Purple\Page;
use Purple\PagePack;
use Purple\PagePack\PagePackEmpty;
use Purple\Response;

/**
 * Page by types accepted by "Accept" HTTP header.
 * @package Purple\Page\PageBy
 */
class PageByTypes implements Page
{
    /**
     * @var array<string> $types
     */
    private array $types;

    /**
     * @var Page $origin
     */
    private Page $origin;

    /**
     * @var string $key
     */
    private string $key = 'HTTP_ACCEPT';

    /**
     * Ctor wrap.
     * @param array $types
     * @param Page $page
     * @return PageByTypes
     */
    #[Pure] public static function new(array $types, Page $page): PageByTypes
    {
        return new self($types, $page);
    }

    /**
     * Ctor.
     * @param array $tps
     * @param Page $page
     */
    private function __construct(array $tps, Page $page)
    {
        $this->types = $tps;
        $this->origin = $page;
    }

    /**
     * @todo check accept type
     * @inheritDoc
     */
    public function handle(): PagePack
    {
        return isset($_SERVER[$this->key])
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