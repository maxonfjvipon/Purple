<?php


namespace Purple\Request;


use ElegantBro\Interfaces\Arrayee;
use Purple\Request;

/**
 * Packed request
 * @package Purple\Request
 */
class RqPack implements Request
{
    /**
     * @var Request $origin
     */
    private Request $origin;

    /**
     * Ctor.
     * @param Request $req
     */
    public function __construct(Request $req)
    {
        $this->origin = $req;
    }

    /**
     * @inheritDoc
     */
    public function body(): array
    {
        return $this->origin->body();
    }

    /**
     * @inheritDoc
     */
    public function head(): array
    {
        return $this->origin->head();
    }
}