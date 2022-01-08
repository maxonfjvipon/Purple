<?php

namespace Purple\Exp\Page\PageWith;

use JetBrains\PhpStorm\Pure;
use Purple\Exp\PagePack;
use Purple\Exp\PagePack\PagePackSimple;
use Purple\Exp\Response;
use Purple\Exp\Page;

/**
 * Page that print itself to output with Content-Type header
 * @package Purple\Exp\Page\PageVia
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
     * Ctor.
     * @param string $ctype
     * @param string $chrst
     */
    public function __construct(string $ctype, string $chrst = 'UTF-8')
    {
        $this->contentType = $ctype;
        $this->charset = $chrst;
    }

    /**
     * @inheritDoc
     */
    #[Pure] public function handle(): PagePack
    {
        return new PagePackSimple($this);
    }

    /**
     * @inheritDoc
     */
    public function via(Response $response): Response
    {
        return $response->with('Content-Type', $this->contentType . ';charset=' . $this->charset);
    }
}