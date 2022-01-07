<?php

namespace Purple\Exp\Page\PageWith;

use Exception;
use Purple\Exp\Response;
use Purple\Exp\Page;

/**
 * Page that print itself to output with Content-Length and Content-Type headers
 * @package Purple\Exp\Page\PageVia
 */
class PageWithContent implements Page
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
     * Ctor.
     * @param string $bdy
     * @param string $ctype
     */
    public function __construct(string $bdy, string $ctype)
    {
        $this->body = $bdy;
        $this->contentType = $ctype;
    }

    /**
     * @inheritDoc
     */
    public function by(string $key, string $value): Page
    {
        return $this;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function via(Response $output): Response
    {
        return (new PageWithContentType($this->contentType))
            ->via((new PageWithContentLengthOf($this->body))
                ->via($output));
    }
}