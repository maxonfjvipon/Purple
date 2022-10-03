<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Purple\Response\Body\RsBody;
use Purple\Support\ContentType;
use Purple\Support\HttpStatus;

/**
 * HTML response.
 */
final class RsHtml extends RsEnvelope
{
    /**
     * Ctor.
     *
     * @param string|Text $html
     * @throws Exception
     */
    public function __construct($html)
    {
        parent::__construct(
            new RsWithType(
                new RsWithBody(
                    new RsEmptyOK(),
                    RsBody::ofText($html)
                ),
                ContentType::HTML
            )
        );
    }
}
