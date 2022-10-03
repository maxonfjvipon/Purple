<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSticky;
use Purple\Request\RqHeaders;
use Purple\Response\Body\ResponseBody;
use Purple\Response\Body\RsBody;
use Purple\Response\Headers\ResponseHeaders;

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
                (new RsWithHeader(
                    $response,
                    ResponseHeaders::CONTENT_LENGTH,
                    new LengthOf(
                        $_body = RsBody::ofText(
                            new TxtSticky($body)
                        )
                    )
                ))->headers(),
                $_body
            )
        );
    }
}
