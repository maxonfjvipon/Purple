<?php


namespace Purple\Response;


use ElegantBro\Interfaces\Arrayee;
use Purple\Response;

class RsPack implements Response
{
    /**
     * @var Response original response
     */
    private Response $origin;

    /**
     * RsPack constructor.
     * @param Response $res
     */
    public function __construct(Response $res)
    {
        $this->origin = $res;
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