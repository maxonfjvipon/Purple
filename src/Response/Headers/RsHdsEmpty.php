<?php

namespace Maxonfjvipon\Purple\Response\Headers;

/**
 * Empty response headers.
 */
final class RsHdsEmpty extends RsHdsWrap
{
    /**
     * Ctor.
     */
    public function __construct()
    {
        parent::__construct(
            new RsHeaders([ResponseHeaders::STATUS => "HTTP/1.1 204 No Content"])
        );
    }
}
