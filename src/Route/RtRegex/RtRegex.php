<?php


namespace Purple\Route\RtRegex;

use ElegantBro\Interfaces\Stringify;
use Purple\Frame;
use Purple\Request;
use Purple\Response;
use Purple\Route\Route;

class RtRegex implements Route
{
    private Stringify $pattern;
    private Frame $frame;

    public function __construct(Stringify $pattern, Frame $frame)
    {
        $this->pattern = $pattern;
        $this->frame = $frame;
    }

    public function send(Request $req): Response
    {
        // check pattern
        return $this->frame->handle($req);
    }
}