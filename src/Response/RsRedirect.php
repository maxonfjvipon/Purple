<?php

namespace Maxonfjvipon\Purple\Response;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\Purple\Response\Headers\ResponseHeaders;
use Maxonfjvipon\Purple\Support\HttpStatus;

/**
 * Redirect response.
 */
final class RsRedirect extends RsWrap
{
    /**
     * Ctor.
     *
     * @param string|Txt $location
     * @throws Exception
     */
    public function __construct(string|Txt $location)
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
