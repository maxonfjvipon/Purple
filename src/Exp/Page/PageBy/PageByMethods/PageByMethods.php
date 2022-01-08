<?php

namespace Purple\Exp\Page\PageBy\PageByMethods;

use JetBrains\PhpStorm\Pure;
use Purple\Exp\Page;
use Purple\Exp\PagePack;
use Purple\Exp\Response;

/**
 * Page by methods.
 * @package Purple\Exp\Page\PageBy
 */
class PageByMethods implements Page
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
    #[Pure] public function by(string $key, string $value): PagePack
    {
        if ($key === 'REQUEST_METHOD' && in_array($value, $this->methods)) {
            return new PagePack\PagePackSimple($this->origin);
        }
        return new PagePack\PagePackEmpty();
    }

    /**
     * @inheritDoc
     */
    public function via(Response $response): Response
    {
        return $this->origin->via($response);
    }
}