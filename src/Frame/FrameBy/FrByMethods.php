<?php

namespace Purple\Frame\FrameBy;

use Exception;
use JetBrains\PhpStorm\Pure;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrExploded;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Logical\ContainsIn;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTrimmed;
use Purple\Frame;
use Purple\Frame\FrOpt;
use Purple\FramePack;
use Purple\Request;
use Purple\Request\RqMethod;
use Purple\Response;

/**
 * Frame by methods.
 * @package Purple\Frame\Frame
 */
final class FrByMethods implements Frame
{
    /**
     * @var Arrayable $methods
     */
    private Arrayable $methods;

    /**
     * @var Frame $origin
     */
    private Frame $origin;

    /**
     * Ctor wrap of string.
     * @param string $methods
     * @param Frame $page
     * @return FrByMethods
     * @throws Exception
     */
    public static function newOfString(string $methods, Frame $page): FrByMethods
    {
        return new self(
            ArrMapped::ofArrayable(
                ArrExploded::byComma()->ofString($methods),
                fn(string $method) => TxtTrimmed::ofString($method)->asString()
            ),
            $page
        );
    }

    /**
     * Ctor wrap.
     * @param array $methods
     * @param Frame $page
     * @return FrByMethods
     */
    #[Pure] public static function new(array $methods, Frame $page): FrByMethods
    {
        return new self(ArrayableOf::array($methods), $page);
    }

    /**
     * Ctor.
     * @param Arrayable $mthds
     * @param Frame $page
     */
    private function __construct(Arrayable $mthds, Frame $page)
    {
        $this->methods = $mthds;
        $this->origin = $page;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function handle(Request $req): FramePack
    {
        return FrOpt::new(
            ContainsIn::arrayable(
                $this->methods,
                RqMethod::new($req)->asString()
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