<?php

namespace Purple\Response\Headers;

use Maxonfjvipon\Elegant_Elephant\Arrayable\AbstractArrayable;

/**
 * Empty response headers.
 */
final class RsHeadersEmpty extends AbstractArrayable implements ResponseHeaders
{
    private const SELf = [ResponseHeaders::STATUS => "HTTP/1.1 204 No Content"];

    /**
     * @param string $key
     * @return string
     */
    public function header(string $key): string
    {
        return self::SELf[ResponseHeaders::STATUS];
    }

    /**
     * @return string[]
     */
    public function asArray(): array
    {
        return self::SELf;
    }
}
