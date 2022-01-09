<?php


namespace Purple\Page\PageWith;


use ElegantBro\Stringify\Just;
use Exception;
use JetBrains\PhpStorm\Pure;
use Maxonfjvipon\Elegant_Elephant\Numeric\LengthOfStingify;
use Purple\PagePack;
use Purple\PagePack\PagePackSimple;
use Purple\Response;
use Purple\Page;

/**
 * Page that print itself to output with Content-Length header
 * @package Purple\Page\PageVia
 */
final class PageWithContentLengthOf implements Page
{
    /**
     * @var string $body
     */
    private string $body;

    /**
     * Ctor wrap.
     * @param string $body
     * @return PageWithContentLengthOf
     */
    #[Pure] public static function new(string $body): PageWithContentLengthOf
    {
        return new self($body);
    }

    /**
     * Ctor.
     * PageWithContentLengthOf constructor.
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
        return PagePackSimple::new($this);
    }

    /**
     * @inheritDoc
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