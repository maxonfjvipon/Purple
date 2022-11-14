<?php

namespace Maxonfjvipon\Purple\Request;

/**
 * Request cookie.
 */
final class RqCookie implements RequestCookie
{
    /**
     * Ctor.
     * @param array $self
     */
    public function __construct(private array $self)
    {
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name): mixed
    {
        return $this->self[$name];
    }

    /**
     * @return array
     */
    public function asArray(): array
    {
        return $this->self;
    }
}