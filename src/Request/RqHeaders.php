<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Arrayable\CountArrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\HasArrayableIterator;

/**
 * Request headers.
 */
final class RqHeaders implements RequestHeaders
{
    use HasArrayableIterator;
    use CountArrayable;

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
     * @todo: remove null
     * @param string $key
     * @return mixed
     */
    public function header(string $key)
    {
        return $this->self[$key] ?? null;
    }
}
