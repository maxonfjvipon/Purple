<?php

namespace Purple\Frame\FrameWith;

use ElegantBro\Stringify\Just;
use Exception;
use JetBrains\PhpStorm\Pure;
use Maxonfjvipon\Elegant_Elephant\Numeric\LengthOfStingify;
use Purple\FramePack;
use Purple\Frame\FramePack\FrPackSimple;
use Purple\Request;
use Purple\Response;
use Purple\Frame;

/**
 * Frame that print itself to output with Content-Length header
 * @package Purple\Frame\FrameVia
 */
final class FrWithContentLengthOf implements Frame
{
    /**
     * @var string $body
     */
    private string $body;

    /**
     * Ctor wrap.
     * @param string $body
     * @return FrWithContentLengthOf
     */
    #[Pure] public static function new(string $body): FrWithContentLengthOf
    {
        return new self($body);
    }

    /**
     * Ctor.
     * FrameWithContentLengthOf constructor.
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
        return $response->with(
            'Content-Length',
            (new LengthOfStingify(new Just($this->body)))
                ->asNumber()
        );
    }
}