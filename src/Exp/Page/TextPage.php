<?php

namespace Purple\Exp\Page;

use Exception;
use Purple\Exp\Response;
use Purple\Exp\Page;

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
     * @return Page
     */
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
        return (new PageWith\PageWithBody($this->body))
            ->via((new Page\PageWith\PageWithContent($this->body, 'text/plain'))
                ->via($output));
    }
}