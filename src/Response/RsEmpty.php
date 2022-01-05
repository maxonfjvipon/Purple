<?php


namespace Purple\Response;


use Purple\Response;

class RsEmpty implements Response
{

    /**
     * @inheritDoc
     */
    public function body(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function head(): array
    {
        return [];
    }
}