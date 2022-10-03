<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Logical;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJsonEncoded;
use Purple\Response\Body\RsBody;
use Purple\Support\ContentType;
use Purple\Support\HttpStatus;

/**
 * JSON response.
 */
final class RsJson extends RsEnvelope
{
    /**
     * @param string|int|float|array<mixed>|bool|Text|Numerable|Arrayable|Logical|Any $json
     * @throws Exception
     */
    private function __construct($json)
    {
        parent::__construct(
            new RsWithType(
                new RsWithBody(
                    new RsEmptyOK(),
                    RsBody::ofText(
                        new TxtJsonEncoded($json)
                    )
                ),
                ContentType::JSON
            )
        );
    }
}
