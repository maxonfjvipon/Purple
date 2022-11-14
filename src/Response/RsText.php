<?php

namespace Maxonfjvipon\Purple\Response;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\Purple\Response\Body\RsBodyOf;
use Maxonfjvipon\Purple\Support\ContentType;

/**
 * Text response.
 */
final class RsText extends RsWrap
{
    /**
     * @param string|Txt $text
     * @throws Exception
     */
    public function __construct(string|Txt $text)
    {
        parent::__construct(
            new RsWithType(
                new RsWithBody(
                    new RsEmptyOK(),
                    RsBodyOf::text($text)
                ),
                ContentType::TEXT
            )
        );
    }
}
