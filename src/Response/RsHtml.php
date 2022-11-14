<?php

namespace Maxonfjvipon\Purple\Response;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\Purple\Response\Body\RsBodyOf;
use Maxonfjvipon\Purple\Support\ContentType;

/**
 * HTML response.
 */
final class RsHtml extends RsWrap
{
    /**
     * Ctor.
     *
     * @param string|Txt $html
     * @throws Exception
     */
    public function __construct(string|Txt $html)
    {
        parent::__construct(
            new RsWithType(
                new RsWithBody(
                    new RsEmptyOK(),
                    RsBodyOf::text($html)
                ),
                ContentType::HTML
            )
        );
    }
}
