<?php

namespace Maxonfjvipon\Purple\Endpoint;

use Maxonfjvipon\ElegantElephant\Any\AnyCond;
use Maxonfjvipon\ElegantElephant\Logic;

/**
 * Conditional optional endpoint.
 */
final class EpOptCond extends EpOptWrap
{
    public function __construct(
        bool|Logic $condition,
        OptionalEndpoint $first,
        OptionalEndpoint $second,
    )
    {
        parent::__construct(
            EpOptOf::any(
                new AnyCond(
                    $condition,
                    $first,
                    $second
                )
            )
        );
    }
}