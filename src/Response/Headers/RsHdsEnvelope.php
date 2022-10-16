<?php

namespace Purple\Response\Headers;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\CountArrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\HasArrayableIterator;

/**
 * Response headers envelope.
 */
class RsHdsEnvelope implements ResponseHeaders
{
    use HasArrayableIterator;
    use CountArrayable;

    /**
     * @var ResponseHeaders $origin
     */
    private ResponseHeaders $origin;

    /**
     * Ctor.
     *
     * @param ResponseHeaders $headers
     */
    public function __construct(ResponseHeaders $headers)
    {
        $this->origin = $headers;
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->origin->asArray();
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function header(string $key)
    {
        return $this->origin->header($key);
    }
}
