<?php


namespace Purple\Exp\Page\PageWith;


use ElegantBro\Stringify\Just;
use Exception;
use Maxonfjvipon\Elegant_Elephant\Numeric\LengthOfStingify;
use Purple\Exp\Response;
use Purple\Exp\Page;

/**
 * Page that print itself to output with Content-Length header
 * @package Purple\Exp\Page\PageVia
 */
class PageWithContentLengthOf implements Page
{
    private string $body;

    public function __construct(string $bdy)
    {
        $this->body = $bdy;
    }

    public function by(string $key, string $value): Page
    {
        return $this;
    }

    /**
     * @param Response $output
     * @return Response
     * @throws Exception
     */
    public function via(Response $output): Response
    {
        return $output->with(
            'Content-Length',
            (new LengthOfStingify(new Just($this->body)))
                ->asNumber()
        );
    }
}