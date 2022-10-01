<?php

namespace Purple\Route;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Logical\CastLogical;
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
    use CastLogical;

    /**
     * @var bool|Logical $condition
     */
    private $condition;

    /**
     * @var Endpoint|Route $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param bool|Logical $condition
     * @param Endpoint|Route $origin
     */
    public function __construct($condition, $origin)
    {
        $this->condition = $condition;
        $this->origin = $origin;
    }

    /**
     * @param Request $request
     * @return OptionalEndpoint
     * @throws Exception
     */
    public function destination(Request $request): OptionalEndpoint
    {
        if ($this->logicalCast($this->condition)) {
            if ($this->origin instanceof Route) {
                return $this->origin->destination($request);
            }

            return new EpOptDefault($this->origin);
        }

        return new EpOptEmpty();
    }
}
