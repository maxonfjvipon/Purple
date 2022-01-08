<?php

namespace Purple\Exp\Page;

use Exception;
use JetBrains\PhpStorm\Pure;
use Purple\Exp\Page;
use Purple\Exp\PagePack;
use Purple\Exp\PagePack\PagePackSimple;
use Purple\Exp\Response;

class TextPage implements Page
{
    /**
     * @var string body
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
     * @param string $key
     * @param string $value
     * @return PagePack
     */
    #[Pure] public function by(string $key, string $value): PagePack
    {
        return new PagePackSimple($this);
    }

    /**
     * @param Response $response
     * @return Response
     * @throws Exception
     */
    public function via(Response $response): Response
    {
        return (new PageWith\PageWithBody($this->body))
            ->via((new Page\PageWith\PageWithContent($this->body, 'text/plain'))
                ->via($response));
    }
}