<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSticky;
use Purple\Response\Body\ResponseBody;
use Purple\Response\Body\RsBody;
use Purple\Response\Headers\ResponseHeaders;
use Purple\Response\Headers\RsHdsWith;
use Purple\Response\Headers\RsHeaders;

/**
 * Response with body.
 */
final class RsWithBody extends RsEnvelope
{
    /**
     * Ctor.
     *
     * @throws Exception
     */
    public function __construct(Response $response, ResponseBody $body)
    {
        parent::__construct(
            new RsDefault(
                new RsHdsWith(
                    $response->headers(),
                    ResponseHeaders::CONTENT_LENGTH,
                    new LengthOf($body)
                ),
                $body
            )
        );
    }
}
