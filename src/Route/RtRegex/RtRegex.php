<?php

namespace Purple\Route\RtRegex;

use Exception;
use Purple\Frame;
use Purple\Request;
use Purple\Response;
use Purple\Route\Route;

class RtRegex implements Route
{
    private string $pattern;
    private Frame $frame;

    public function __construct(string $pattern, Frame $frame)
    {
        $this->pattern = $pattern;
        $this->frame = $frame;
    }

    /**
     * @param Request $req
     * @return Response
     * @throws Exception
     */
    public function send(Request $req): Response
    {
        // check pattern
        return $this->frame->handle($req);
    }
}