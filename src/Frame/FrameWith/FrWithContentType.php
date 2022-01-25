<?php

namespace Purple\Frame\FrameWith;

use JetBrains\PhpStorm\Pure;
use Purple\FramePack;
use Purple\Frame\FramePack\FrPackSimple;
use Purple\Request;
use Purple\Response;
use Purple\Frame;

/**
 * Frame that print itself to output with Content-Type header
 * @package Purple\Frame\FrameVia
 */
final class FrWithContentType implements Frame
{
    /**
     * @var string $contentType
     */
    private string $contentType;

    /**
     * @var string $charset
     */
    private string $charset;

    /**
     * Ctor wrap.
     * @param string $ctype
     * @param string $charset
     * @return FrWithContentType
     */
    #[Pure] public static function new(string $ctype, string $charset = 'UTF-8'): FrWithContentType
    {
        return new self($ctype, $charset);
    }

    /**
     * Ctor.
     * @param string $ctype
     * @param string $chrst
     */
    private function __construct(string $ctype, string $chrst)
    {
        $this->contentType = $ctype;
        $this->charset = $chrst;
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
     */
    public function writtenInVia(Response $response): Response
    {
        return $response->with('Content-Type', $this->contentType . ';charset=' . $this->charset);
    }
}