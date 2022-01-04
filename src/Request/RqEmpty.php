<?php

namespace Purple\Request;

use Purple\Request;

class RqEmpty implements Request
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