<?php

namespace Purple\Response\Headers;

/**
 * Empty response headers.
 */
final class RsHdsEmpty extends RsHdsEnvelope
{
    private const SELf = [ResponseHeaders::STATUS => "HTTP/1.1 204 No Content"];

    /**
     * Ctor.
     */
    public function __construct()
    {
        parent::__construct(
            new RsHeaders(self::SELf)
        );
    }
}
