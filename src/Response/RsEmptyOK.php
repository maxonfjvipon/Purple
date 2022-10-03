<?php

namespace Purple\Response;

use Exception;
use Purple\Support\HttpStatus;

/**
 * Empty response with status 200 OK
 */
final class RsEmptyOK extends RsEnvelope
{
    /**
     * Ctor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct(
            RsWithStatus::withoutReason(
                new RsEmpty(),
                HttpStatus::HTTP_OK
            )
        );
    }
}
