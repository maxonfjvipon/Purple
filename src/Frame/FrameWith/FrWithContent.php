<?php

namespace Purple\Frame\FrameWith;

use Exception;
use JetBrains\PhpStorm\Pure;
use Purple\Frame\FramePack\FrPackSimple;
use Purple\Request;
use Purple\Response;
use Purple\Frame;
use Purple\FramePack;

/**
 * Frame that print itself to output with Content-Length and Content-Type headers
 * @package Purple\Frame\FrameVia
 */
final class FrWithContent implements Frame
{
    /**
     * @var string $body
     */
    private string $body;

    /**
     * @var string $contentType
     */
    private string $contentType;

    /**
     * Ctor wrap.
     * @param string $body
     * @param string $ctype
     * @return FrWithContent
     */
    #[Pure] public static function new(string $body, string $ctype): FrWithContent
    {
        return new self($body, $ctype);
    }

    /**
     * Ctor.
     * @param string $bdy
     * @param string $ctype
     */
    private function __construct(string $bdy, string $ctype)
    {
        $this->body = $bdy;
        $this->contentType = $ctype;
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
        return FrWithContentType::new($this->contentType)
            ->writtenInVia(FrWithContentLengthOf::new($this->body)
                ->writtenInVia($response));
    }
}