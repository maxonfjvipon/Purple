<?php

namespace Maxonfjvipon\Purple\Request;

/**
 * Request files
 */
final class RqFiles implements RequestFiles
{
    /**
     * Ctor.
     * @param array $self
     */
    public function __construct(private array $self)
    {
    }

    /**
     * @inheritDoc
     */
    public function asArray(): array
    {
        return $this->self;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name): mixed
    {
        return $this->self[$name];
    }
}