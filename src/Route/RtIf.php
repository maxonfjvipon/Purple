<?php

namespace Purple\Route;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Purple\Endpoint\Endpoint;
use Purple\Endpoint\EpOptDefault;
use Purple\Endpoint\EpOptEmpty;
use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;

/**
 * Conditionable route.
 */
final class RtIf implements Route
{
    use CastMixed;

    /**
     * @var callable|bool|Boolean $condition
     */
    private $condition;

    /**
     * @var Endpoint|Route $origin
     */
    private $origin;

    /**
     * @var array<mixed> $args
     */
    private array $args;

    /**
     * Ctor.
     *
     * @param Endpoint|Route $origin
     * @param callable|bool|Boolean $condition
     * @param mixed ...$args
     */
    public function __construct($origin, $condition, ...$args)
    {
        $this->origin = $origin;
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
        /** @var bool|callable $condition */
        $condition = $this->mixedCast($this->condition);

        if (is_callable($condition)) {
            $condition = $this->mixedCast(call_user_func($condition, $request, ...$this->args));

            if (!is_bool($condition)) {
                throw new Exception("Condition callback must return bool or an instance of Boolean");
            }
        }

        if ($condition) {
            if ($this->origin instanceof Route) {
                return $this->origin->destination($request);
            }

            return new EpOptDefault($this->origin);
        }

        return new EpOptEmpty();
    }
}
