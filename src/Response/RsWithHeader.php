<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Purple\Response\Headers\RsHdsWith;
use Purple\Response\Headers\RsHeaders;

/**
 * Response with header.
 */
final class RsWithHeader extends RsEnvelope
{
    use CastMixed;

    /**
     * Ctor.
     *
     * @param Response $response
     * @param string $name
     * @param mixed $value
     * @throws Exception
     */
    public function __construct(Response $response, string $name, $value)
    {
        parent::__construct(
            new RsDefault(
                new RsHdsWith(
                    $response->headers(),
                    $name,
                    $value
                ),
                $response->body()
            )
        );
    }
}
