<?php

namespace Purple\Page;

use Exception;
use JetBrains\PhpStorm\Pure;
use Purple\PagePack;
use Purple\PagePack\PagePackSimple;
use Purple\Response;
use Purple\Page;

final class HtmlPage implements Page
{
    /**
     * @var string body
     */
    private string $body;

    /**
     * Ctor wrap.
     * @param string $body
     * @return HtmlPage
     */
    #[Pure] public static function new(string $body): HtmlPage
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
     * @return PagePack
     */
    #[Pure] public function handle(): PagePack
    {
        return PagePackSimple::new($this);
    }

    /**
     * @param Response $response
     * @return Response
     * @throws Exception
     */
    public function via(Response $response): Response
    {
        return Page\PageWith\PageWithBody::new($this->body)
            ->via(Page\PageWith\PageWithContent::new($this->body, 'text/html')
                ->via($response));
    }
}