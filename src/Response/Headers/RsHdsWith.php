<?php

namespace Maxonfjvipon\Purple\Response\Headers;

use Maxonfjvipon\ElegantElephant\Arr\ArrWith;

/**
 * Response headers with.
 */
final class RsHdsWith extends RsHdsWrap
{
    /**
     * Ctor.
     *
     * @param ResponseHeaders $headers
     * @param string $name
     * @param mixed $value
     */
    public function __construct(ResponseHeaders $headers, string $name, mixed $value)
    {
        parent::__construct(
            new RsHeaders(
                new ArrWith(
                    $headers,
                    $name,
                    $value
                )
            )
        );
    }
}
