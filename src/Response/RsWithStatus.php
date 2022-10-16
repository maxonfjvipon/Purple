<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Purple\Response\Headers\ResponseHeaders;
use Purple\Support\HttpStatus;

/**
 * Response with status.
 */
final class RsWithStatus extends RsEnvelope
{
    use CastMixed;

    /**
     * Ctor wrap.
     *
     * @param Response $response
     * @param int $code
     * @return self
     * @throws Exception
     */
    public static function withoutReason(Response $response, int $code): self
    {
        return new self($response, $code, self::reason($code));
    }

    /**
     * Ctor.
     *
     * @param Response $response
     * @param int $code
     * @param string $reason
     * @throws Exception
     */
    public function __construct(Response $response, int $code, string $reason)
    {
        parent::__construct(
            new RsWithHeader(
                $response,
                ResponseHeaders::STATUS,
                "HTTP/1.1 $code $reason"
            )
        );
    }

    /**
     * @param int $code
     * @return string
     */
    private static function reason(int $code): string
    {
        return self::REASONS[$code] ?? "Unknown";
    }

    /** @var array<string, string> REASONS */
    private const REASONS = [
        HttpStatus::HTTP_OK => "OK",
        HttpStatus::SEE_OTHER => "See Other",
    ];
}
