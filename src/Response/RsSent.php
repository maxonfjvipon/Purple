<?php

namespace Purple\Response;

use Exception;
use Purple\Response\Headers\ResponseHeaders;

/**
 * Response that can send an encapsulated one to the client.
 */
final class RsSent implements ResponseSent
{
    /**
     * @param Response $response
     * @return void
     * @throws Exception
     */
    public function send(Response $response): void
    {
        /** @var array $headers */
        $headers = $response->headers()->asArray();

        header($headers[ResponseHeaders::STATUS]); // HTTP/1.1 {STATUS} {REASON}

        unset($headers[ResponseHeaders::STATUS]);

        foreach ($headers as $key => $header) {
            header("$key: $header");
        }

        echo $response->body();
    }
}
