<?php

namespace Maxonfjvipon\Purple\Response;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt\TxtJsonEncoded;
use Maxonfjvipon\Purple\Response\Body\RsBodyOf;
use Maxonfjvipon\Purple\Support\ContentType;

/**
 * JSON response.
 */
final class RsJson extends RsWrap
{
    /**
     * @param mixed $json
     * @throws Exception
     */
    public function __construct(mixed $json)
    {
        parent::__construct(
            new RsWithType(
                new RsWithBody(
                    new RsEmptyOK(),
                    RsBodyOf::text(
                        new TxtJsonEncoded($json)
                    )
                ),
                ContentType::JSON
            )
        );
    }
}
