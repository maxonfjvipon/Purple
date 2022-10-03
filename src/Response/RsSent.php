<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;
use Purple\Response\Headers\ResponseHeaders;

/**
 * Response that can send an encapsulated one to the client.
 */
final class RsSent extends RsEnvelope implements ResponseSent
{
    /**
     * @throws Exception
     */
    public function send(): void
    {
        $headers = $this->headers()->asArray();

        header($headers[ResponseHeaders::STATUS]); // HTTP/1.1 {STATUS} {REASON}

        unset($headers[ResponseHeaders::STATUS]);

        foreach ($headers as $key => $header) {
            header("$key: $header");
        }

        echo $this->body()->asString();
    }
}
