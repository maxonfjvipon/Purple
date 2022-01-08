<?php

namespace Purple\Exp\Page\PageWith;

use Exception;
use JetBrains\PhpStorm\Pure;
use Purple\Exp\PagePack;
use Purple\Exp\Response;
use Purple\Exp\Page;

final class PageWithBody implements Page
{
    /**
     * @var string $body
     */
    private string $body;

    /**
     * Ctor.
     * @param string $bdy
     */
    public function __construct(string $bdy)
    {
        $this->body = $bdy;
    }

    /**
     * @inheritDoc
     */
    #[Pure] public function handle(): PagePack
    {
        return new PagePack\PagePackSimple($this);
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