<?php

namespace Purple\Response\Headers;

use Maxonfjvipon\Elegant_Elephant\Arrayable\AbstractArrayable;

/**
 * Response headers.
 */
final class RsHeaders extends AbstractArrayable implements ResponseHeaders
{
    /**
     * @var array $self
     */
    private array $self;

    /**
     * Ctor.
     *
     * @param array $headers
     */
    public function __construct(array $headers)
    {
        $this->self = $headers;
    }

    /**
     * @return array<mixed>
     */
    public function asArray(): array
    {
        return $this->self;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function header(string $key)
    {
        return $this->self[$key] ?? "";
    }
}
