<?php

namespace Maxonfjvipon\Purple\Response;

use Exception;
use Maxonfjvipon\Purple\Support\HttpStatus;

/**
 * Empty response with status 200 OK
 */
final class RsEmptyOK extends RsWrap
{
    /**
     * Ctor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct(
            new RsEmptyWithStatus(HttpStatus::HTTP_OK)
        );
    }
}
