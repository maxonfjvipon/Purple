<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Purple\Response\Body\RsBody;
use Purple\Support\ContentType;
use Purple\Support\HttpStatus;

/**
 * Text response.
 */
final class RsText extends RsEnvelope
{
    /**
     * @param string|Text $text
     * @throws Exception
     */
    public function __construct($text)
    {
        parent::__construct(
            new RsWithType(
                new RsWithBody(
                    new RsEmptyOK(),
                    RsBody::ofText($text)
                ),
                ContentType::TEXT
            )
        );
    }
}
