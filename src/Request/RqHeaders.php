<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Arrayable\AbstractArrayable;

/**
 * Request headers.
 */
final class RqHeaders extends AbstractArrayable implements RequestHeaders
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
     * @return float|int|string
     */
    public function header(string $key)
    {
        return $this->self[$key];
    }
}
