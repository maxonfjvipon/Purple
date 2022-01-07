<?php

namespace Purple\Exp\Page\PageWith;

use Exception;
use Purple\Exp\Response;
use Purple\Exp\Page;

class PageWithBody implements Page
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
        return $output->with('X-Body', $this->body);
    }

}