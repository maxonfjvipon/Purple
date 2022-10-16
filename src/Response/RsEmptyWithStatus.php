<?php

namespace Purple\Response;

use Exception;

/**
 * Empty response with given status code.
 */
final class RsEmptyWithStatus extends RsEnvelope
{
    /**
     * Ctor.
     *
     * @param int $code
     * @throws Exception
     */
    public function __construct(int $code)
    {
        parent::__construct(
            RsWithStatus::withoutReason(
                new RsEmpty(),
                $code
            )
        );
    }
}
