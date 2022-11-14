<?php

namespace Maxonfjvipon\Purple\Route;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic;
use Maxonfjvipon\ElegantElephant\Logic\LogicCond;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\Purple\Endpoint\Endpoint;
use Maxonfjvipon\Purple\Endpoint\EpOptCond;
use Maxonfjvipon\Purple\Endpoint\EpOptDefault;
use Maxonfjvipon\Purple\Endpoint\EpOptEmpty;
use Maxonfjvipon\Purple\Endpoint\EpOptOf;
use Maxonfjvipon\Purple\Endpoint\OptionalEndpoint;
use Maxonfjvipon\Purple\Request\Request;

/**
 * Conditional route.
 */
final class RtIf implements Route
{
    /**
     * @var bool|callable|Logic $condition
     */
    private $condition;

    /**
     * @var array $args
     */
    private array $args;

    /**
     * Ctor.
     *
     * @param callable|bool|Logic $condition
     * @param Endpoint|Route $origin
     * @param mixed ...$args
     */
    public function __construct(
        bool|callable|Logic $condition,
        private Endpoint|Route $origin,
        mixed ...$args
    )
    {
        $this->condition = $condition;
        $this->args = $args;
    }

    /**
     * @param Request $request
     * @return OptionalEndpoint
     * @throws Exception
     */
    public function destination(Request $request): OptionalEndpoint
    {
        return new EpOptCond(
            new LogicCond(
                is_callable($this->condition),
                LogicOf::func($this->condition, $request, ...$this->args),
                LogicOf::func(fn () => $this->condition)
            ),
            new EpOptCond(
                LogicOf::func(fn () => $this->origin instanceof Route),
                EpOptOf::func(fn () => $this->origin->destination($request)),
                new EpOptDefault($this->origin)
            ),
            new EpOptEmpty()
        );
    }
}
