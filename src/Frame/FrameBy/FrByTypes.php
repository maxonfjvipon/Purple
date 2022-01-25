<?php

namespace Purple\Frame\FrameBy;

use JetBrains\PhpStorm\Pure;
use Purple\Frame;
use Purple\FramePack;
use Purple\Frame\FramePack\FrPackEmpty;
use Purple\Request;
use Purple\Response;

/**
 * Frame by types accepted by "Accept" HTTP header.
 * @package Purple\Frame\Frame
 */
final class FrByTypes implements Frame
{
    /**
     * @var array<string> $types
     */
    private array $types;

    /**
     * @var Frame $origin
     */
    private Frame $origin;

    /**
     * @var string $key
     */
    private string $key = 'HTTP_ACCEPT';

    /**
     * Ctor wrap.
     * @param array $types
     * @param Frame $page
     * @return FrByTypes
     */
    #[Pure] public static function new(array $types, Frame $page): FrByTypes
    {
        return new self($types, $page);
    }

    /**
     * Ctor.
     * @param array $tps
     * @param Frame $page
     */
    private function __construct(array $tps, Frame $page)
    {
        $this->types = $tps;
        $this->origin = $page;
    }

    /**
     * @todo check accept type
     * @inheritDoc
     */
    public function handle(Request $req): FramePack
    {
        return isset($_SERVER[$this->key])
            ? $this->origin->handle($req)
            : FrPackEmpty::new();
    }

    /**
     * @inheritDoc
     */
    public function writtenInVia(Response $response): Response
    {
        return $this->origin->writtenInVia($response);
    }
}