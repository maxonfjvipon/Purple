<?php

namespace Purple\Frame;

use Exception;
use JetBrains\PhpStorm\Pure;
use Purple\Frame;
use Purple\Frame\FrameWith\FrWithBody;
use Purple\Frame\FrameWith\FrWithContent;
use Purple\Frame\FramePack\FrPackSimple;
use Purple\FramePack;
use Purple\Request;
use Purple\Response;

/**
 * Frame that represent itself with text
 * @package Purple\Frame
 */
final class FrText implements Frame
{
    /**
     * @var string body
     */
    private string $body;

    /**
     * Ctor wrap.
     *
     * @param string $body
     * @return FrText
     */
    #[Pure] public static function new(string $body): FrText
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
     * @param Request $req
     * @return FramePack
     */
    #[Pure] public function handle(Request $req): FramePack
    {
        return FrPackSimple::new($this);
    }

    /**
     * @param Response $response
     * @return Response
     * @throws Exception
     */
    public function writtenInVia(Response $response): Response
    {
        return FrWithBody::new($this->body)
            ->writtenInVia(FrWithContent::new($this->body, 'text/plain')
                ->writtenInVia($response));
    }
}