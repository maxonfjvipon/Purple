<?php

namespace Maxonfjvipon\Purple\Response\Headers;

use Exception;

/**
 * Response headers envelope.
 */
class RsHdsWrap implements ResponseHeaders
{
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
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->origin->asArray();
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name): mixed
    {
        return $this->origin->get($name);
    }
}
