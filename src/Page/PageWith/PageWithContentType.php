<?php

namespace Purple\Page\PageWith;

use JetBrains\PhpStorm\Pure;
use Purple\PagePack;
use Purple\PagePack\PagePackSimple;
use Purple\Response;
use Purple\Page;

/**
 * Page that print itself to output with Content-Type header
 * @package Purple\Page\PageVia
 */
final class PageWithContentType implements Page
{
    /**
     * @var string $contentType
     */
    private string $contentType;

    /**
     * @var string $charset
     */
    private string $charset;

    /**
     * Ctor wrap.
     * @param string $ctype
     * @param string $charset
     * @return PageWithContentType
     */
    #[Pure] public static function new(string $ctype, string $charset = 'UTF-8'): PageWithContentType
    {
        return new self($ctype, $charset);
    }

    /**
     * Ctor.
     * @param string $ctype
     * @param string $chrst
     */
    private function __construct(string $ctype, string $chrst)
    {
        $this->contentType = $ctype;
        $this->charset = $chrst;
    }

    /**
     * @inheritDoc
     */
    #[Pure] public function handle(): PagePack
    {
        return PagePackSimple::new($this);
    }

    /**
     * @inheritDoc
     */
    public function via(Response $response): Response
    {
        return $response->with('Content-Type', $this->contentType . ';charset=' . $this->charset);
    }
}