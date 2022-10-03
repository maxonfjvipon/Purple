<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Arrayable\AbstractArrayable;

/**
 * Request body.
 */
final class RqBody extends AbstractArrayable implements RequestBody
{
    /**
     * @var array $self
     */
    private array $self;

    /**
     * Ctor.
     *
     * @param array $self
     */
    public function __construct(array $self)
    {
        $this->self = $self;
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        return $this->self;
    }

    /**
     * @return string
     */
    public function asString(): string
    {
        return implode('\n', $this->self);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function param(string $name)
    {
        return $this->self[$name];
    }
}
