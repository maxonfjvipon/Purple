<?php

namespace Maxonfjvipon\Purple\Response;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\Purple\Response\Headers\ResponseHeaders;

/**
 * Response with type.
 */
final class RsWithType extends RsWrap
{
    /**
     * Ctor.
     *
     * @param Response $response
     * @param string|Txt $type
     * @throws Exception
     */
    public function __construct(Response $response, string|Txt $type)
    {
        parent::__construct(
            new RsWithHeader(
                $response,
                ResponseHeaders::CONTENT_TYPE,
                $type
            )
        );
    }
}
