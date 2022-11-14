<?php

namespace Maxonfjvipon\Purple\Response;

use Exception;
use Maxonfjvipon\Purple\Response\Headers\RsHdsWith;

/**
 * Response with header.
 */
final class RsWithHeader extends RsWrap
{
    /**
     * Ctor.
     *
     * @param Response $response
     * @param string $name
     * @param mixed $value
     * @throws Exception
     */
    public function __construct(Response $response, string $name, mixed $value)
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
