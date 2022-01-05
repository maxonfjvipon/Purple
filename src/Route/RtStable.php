<?php

namespace Purple\Route;

use Purple\Frame;
use Purple\Request;
use Purple\Response;

/**
 * Stable route
 * @package Purple\Route
 */
class RtStable extends RtPack
{
    /**
     * Ctor.
     * @param Frame $frame
     */
    public function __construct(Frame $frame)
    {
        parent::__construct(new class ($frame) implements Route {
            /**
             * @var Frame $frame
             */
            private Frame $frame;

            /**
             * Anonymous Route ctor.
             * @param Frame $frame
             */
            public function __construct(Frame $frame)
            {
                $this->frame = $frame;
            }

            /**
             * @param Request $req
             * @return Response
             */
            public function send(Request $req): Response
            {
                return $this->frame->handle($req);
            }
        });
    }
}