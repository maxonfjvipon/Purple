<?php

namespace Purple\Page\PageWith;

use Exception;
use JetBrains\PhpStorm\Pure;
use Purple\PagePack;
use Purple\PagePack\PagePackSimple;
use Purple\Response;
use Purple\Page;

/**
 * Page that print itself to output with Content-Length and Content-Type headers
 * @package Purple\Page\PageVia
 */
final class PageWithContent implements Page
{
    /**
     * @var string $body
     */
    private string $body;

    /**
     * @var string $contentType
     */
    private string $contentType;

    /**
     * Ctor wrap.
     * @param string $body
     * @param string $ctype
     * @return PageWithContent
     */
    #[Pure] public static function new(string $body, string $ctype): PageWithContent
    {
        return new self($body, $ctype);
    }

    /**
     * Ctor.
     * @param string $bdy
     * @param string $ctype
     */
    private function __construct(string $bdy, string $ctype)
    {
        $this->body = $bdy;
        $this->contentType = $ctype;
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
     * @throws Exception
     */
    public function via(Response $response): Response
    {
        return PageWithContentType::new($this->contentType)
            ->via(PageWithContentLengthOf::new($this->body)
                ->via($response));
    }
}