<?php

namespace Purple\Frame\FrameBy;

use Exception;
use JetBrains\PhpStorm\Pure;
use Maxonfjvipon\Elegant_Elephant\Logical\MatchTo;
use Maxonfjvipon\Elegant_Elephant\Text\TxtEnsureRegex;
use Purple\Frame;
use Purple\Frame\FrOpt;
use Purple\FramePack;
use Purple\Request;
use Purple\Request\RqUri;
use Purple\Response;

/**
 * Frame by request regex.
 * @package Purple\Frame\FrameBy
 */
final class FrByRegex implements Frame
{
    /**
     * @var string $pattern
     */
    private string $pattern;

    /**
     * @var Frame $origin
     */
    private Frame $origin;

    /**
     * Ctor wrap.
     * @param string $pattern
     * @param Frame $page
     * @return FrByRegex
     */
    #[Pure] public static function new(string $pattern, Frame $page): FrByRegex
    {
        return new self($pattern, $page);
    }

    /**
     * Ctor.
     * @param string $path
     * @param Frame $page
     */
    private function __construct(string $path, Frame $page)
    {
        $this->pattern = $path;
        $this->origin = $page;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function handle(Request $req): FramePack
    {
        return FrOpt::new(
            MatchTo::text(
                TxtEnsureRegex::ofString($this->pattern)
            )->inText(
                RqUri::new($req)
            ),
            $this->origin
        )->handle($req);
    }

    /**
     * @inheritDoc
     */
    public function writtenInVia(Response $response): Response
    {
        return $this->origin->writtenInVia($response);
    }
}