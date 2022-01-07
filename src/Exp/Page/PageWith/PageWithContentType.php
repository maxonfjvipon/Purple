<?php

namespace Purple\Exp\Page\PageWith;

use Purple\Exp\Response;
use Purple\Exp\Page;

/**
 * Page that print itself to output with Content-Type header
 * @package Purple\Exp\Page\PageVia
 */
class PageWithContentType implements Page
{
    /**
     * @var string $contentType
     */
    private string $contentType;

    /**
     * Ctor.
     * @param string $ctype
     */
    public function __construct(string $ctype)
    {
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
     */
    public function via(Response $output): Response
    {
        return $output->with('Content-Type', $this->contentType);
    }
}