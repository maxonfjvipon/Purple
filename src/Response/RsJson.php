<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Boolean;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJsonEncoded;
use Purple\Response\Body\RsBody;
use Purple\Support\ContentType;

/**
 * JSON response.
 */
final class RsJson extends RsEnvelope
{
    /**
     * @param string|int|float|array<mixed>|bool|Text|Number|Arrayable|Boolean|Scalar $json
     * @throws Exception
     */
    public function __construct($json)
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
