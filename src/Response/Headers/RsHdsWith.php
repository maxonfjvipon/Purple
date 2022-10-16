<?php

namespace Purple\Response\Headers;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFromCallback;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Response headers with.
 */
final class RsHdsWith extends RsHdsEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param ResponseHeaders $headers
     * @param string $name
     * @param mixed $value
     */
    public function __construct(ResponseHeaders $headers, string $name, $value)
    {
        parent::__construct(
            new RsHeaders(
                new ArrMerged(
                    $headers,
                    new ArrFromCallback(
                        fn () => [$name => $this->mixedCast($value)]
                    )
                )
            )
        );
    }
}
