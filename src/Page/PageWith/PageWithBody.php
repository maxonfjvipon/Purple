<?php

namespace Purple\Page\PageWith;

use Exception;
use JetBrains\PhpStorm\Pure;
use Purple\PagePack;
use Purple\Response;
use Purple\Page;

final class PageWithBody implements Page
{
    /**
     * @var string $body
     */
    private string $body;

    /**
     * Ctor wrap.
     * @param string $body
     * @return PageWithBody
     */
    #[Pure] public static function new(string $body): PageWithBody
    {
        return new self($body);
    }

    /**
     * Ctor.
     * @param string $bdy
     */
    private function __construct(string $bdy)
    {
        $this->body = $bdy;
    }

    /**
     * @inheritDoc
     */
    #[Pure] public function handle(): PagePack
    {
        return PagePack\PagePackSimple::new($this);
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function via(Response $response): Response
    {
        return $response->with('X-Body', $this->body);
    }

}