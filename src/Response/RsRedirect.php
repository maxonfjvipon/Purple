<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Purple\Response\Headers\ResponseHeaders;
use Purple\Support\HttpStatus;

/**
 * Redirect response.
 */
final class RsRedirect extends RsEnvelope
{
    /**
     * Ctor.
     *
     * @param string|Text $location
     * @throws Exception
     */
    public function __construct($location)
    {
        parent::__construct(
            new RsWithHeader(
                new RsEmptyWithStatus(HttpStatus::SEE_OTHER),
                ResponseHeaders::LOCATION,
                $location
            )
        );
    }
}
