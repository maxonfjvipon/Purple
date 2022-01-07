<?php

namespace Purple\Exp\Page\PageBy;

use Purple\Exp\Response;
use Purple\Exp\Page;

class PageByRoute implements \Purple\Exp\Page
{
    private string $route;

    private Page $origin;

    public function __construct(string $rt, Page $orgn)
    {
        $this->route = $rt;
        $this->origin = $orgn;
    }

    /**
     * @inheritDoc
     */
    public function by(string $key, string $value): Page
    {

    }

    /**
     * @inheritDoc
     */
    public function via(Response $output): Response
    {
        return $this->origin->via($output);
    }
}