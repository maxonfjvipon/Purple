<?php

namespace Purple\Route\RtMethods;

use ElegantBro\Interfaces\Arrayee;
use Purple\Frame;
use Purple\Request;
use Purple\Response;
use Purple\Route\Route;

class RtMethods implements Route
{
    private array $methods;

    private Frame $frame;

    public function __construct(array $methods, Frame $frame)
    {
        $this->methods = $methods;
        $this->frame = $frame;
    }

    /**
     * @inheritDoc
     */
    public function send(Request $req): Response
    {
        // TODO: Implement send() method.
    }
}