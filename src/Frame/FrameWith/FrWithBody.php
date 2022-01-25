<?php

namespace Purple\Frame\FrameWith;

use Exception;
use JetBrains\PhpStorm\Pure;
use Purple\FramePack;
use Purple\Frame\FramePack\FrPackSimple;
use Purple\Request;
use Purple\Response;
use Purple\Frame;

/**
 * Frame that represents itself with body.
 * @package Purple\Frame\FrameWith
 */
final class FrWithBody implements Frame
{
    /**
     * @var string $body
     */
    private string $body;

    /**
     * Ctor wrap.
     * @param string $body
     * @return FrWithBody
     */
    #[Pure] public static function new(string $body): FrWithBody
    {
        return new self($body);
    }

    /**
     * Ctor.
     * @param string $bdy
     */
    private function __construct(string $bdy)
    {
        $this->body = $bdy;
    }

    /**
     * @inheritDoc
     */
    #[Pure] public function handle(Request $req): FramePack
    {
        return FrPackSimple::new($this);
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function writtenInVia(Response $response): Response
    {
        return $response->with('X-Body', $this->body);
    }

}