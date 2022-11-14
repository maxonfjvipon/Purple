<?php

namespace Maxonfjvipon\Purple\Response;

use Maxonfjvipon\ElegantElephant\Num\LengthOf;
use Maxonfjvipon\Purple\Response\Body\ResponseBody;
use Maxonfjvipon\Purple\Response\Headers\ResponseHeaders;
use Maxonfjvipon\Purple\Response\Headers\RsHdsWith;

/**
 * Response with body.
 */
final class RsWithBody extends RsWrap
{
    /**
     * Ctor.
     *
     * @param Response $response
     * @param ResponseBody $body
     */
    public function __construct(Response $response, ResponseBody $body)
    {
        parent::__construct(
            new RsDefault(
                new RsHdsWith(
                    $response->headers(),
                    ResponseHeaders::CONTENT_LENGTH,
                    new LengthOf($body)
                ),
                $body
            )
        );
    }
}
