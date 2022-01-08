<?php


namespace Purple\Exp\Page\PageWith;


use ElegantBro\Stringify\Just;
use Exception;
use JetBrains\PhpStorm\Pure;
use Maxonfjvipon\Elegant_Elephant\Numeric\LengthOfStingify;
use Purple\Exp\PagePack;
use Purple\Exp\PagePack\PagePackSimple;
use Purple\Exp\Response;
use Purple\Exp\Page;

/**
 * Page that print itself to output with Content-Length header
 * @package Purple\Exp\Page\PageVia
 */
final class PageWithContentLengthOf implements Page
{
    private string $body;

    public function __construct(string $bdy)
    {
        $this->body = $bdy;
    }

    #[Pure] public function handle(): PagePack
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
        return $response->with(
            'Content-Length',
            (new LengthOfStingify(new Just($this->body)))
                ->asNumber()
        );
    }
}