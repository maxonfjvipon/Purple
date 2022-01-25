<?php

namespace Purple\Frame;

use Exception;
use JetBrains\PhpStorm\Pure;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Purple\Frame;
use Purple\Frame\FramePack\FrPackEmpty;
use Purple\FramePack;
use Purple\Request;
use Purple\Response;

/**
 * Optional frame.
 * @package Purple\Frame
 */
final class FrOpt implements Frame
{
    /**
     * @var Logical $predicate
     */
    private Logical $predicate;

    /**
     * @var Frame $origin
     */
    private Frame $origin;

    /**
     * Ctor wrap.
     * @param Logical $predicate
     * @param Frame $frame
     * @return FrOpt
     */
    #[Pure] public static function new(Logical $predicate, Frame $frame): FrOpt
    {
        return new self($predicate, $frame);
    }

    /**
     * Ctor.
     * @param Logical $predicate
     * @param Frame $fr
     */
    private function __construct(Logical $predicate, Frame $fr)
    {
        $this->predicate = $predicate;
        $this->origin = $fr;
    }


    /**
     * @inheritDoc
     * @throws Exception
     */
    public function handle(Request $req): FramePack
    {
        return $this->predicate->asBool()
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