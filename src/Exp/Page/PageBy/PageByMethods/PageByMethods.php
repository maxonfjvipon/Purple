<?php

namespace Purple\Exp\Page\PageBy\PageByMethods;

use Purple\Exp\Page;
use Purple\Exp\PagePack;
use Purple\Exp\Response;

/**
 * Page by methods.
 * @package Purple\Exp\Page\PageBy
 */
final class PageByMethods implements Page
{
    /**
     * @var array $methods
     */
    private array $methods;

    /**
     * @var Page $origin
     */
    private Page $origin;

    /**
     * @var string $key
     */
    private string $key = 'REQUEST_METHOD';

    /**
     * Ctor.
     * @param array $mthds
     * @param Page $page
     */
    public function __construct(array $mthds, Page $page)
    {
        $this->methods = $mthds;
        $this->origin = $page;
    }

    /**
     * @inheritDoc
     */
    public function handle(): PagePack
    {
        return (isset($_SERVER[$this->key]) && in_array($_SERVER[$this->key], $this->methods))
            ? $this->origin->handle()
            : new PagePack\PagePackEmpty();
    }

    /**
     * @inheritDoc
     */
    public
    function via(Response $response): Response
    {
        return $this->origin->via($response);
    }
}