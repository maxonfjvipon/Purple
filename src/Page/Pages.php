<?php

namespace Purple\Page;

use Exception;
use HttpException;
use JetBrains\PhpStorm\Pure;
use Purple\Page;
use Purple\PagePack;
use Purple\Response;

/**
 * Pages.
 * @package Purple\Page
 */
final class Pages implements Page
{
    /**
     * @var Page[] $pages
     */
    private array $pages;

    #[Pure] public static function new(Page ...$pages): Pages
    {
        return new self($pages);
    }

    /**
     * Ctor.
     * @param Page ...$pgs
     */
    private function __construct(Page ...$pgs)
    {
        $this->pages = $pgs;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function handle(): PagePack
    {
        $target = PagePack\PagePackEmpty::new();
        foreach ($this->pages as $page) {
            $current = $page->handle();
            if ($current->has()) {
                $target = $current;
                break;
            }
        }
        return $target;
    }

    /**
     * Should never happen...
     * @inheritDoc
     * @throws HttpException
     */
    public function via(Response $response): Response
    {
        throw new HttpException("Not found", 404);
    }
}