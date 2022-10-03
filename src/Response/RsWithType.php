<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Purple\Response\Headers\ResponseHeaders;

/**
 * Response with type.
 */
final class RsWithType extends RsEnvelope
{
    /**
     * Ctor.
     *
     * @param Response $response
     * @param string|Text $type
     * @throws Exception
     */
    public function __construct(Response $response, $type)
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
