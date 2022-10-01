<?php

namespace Purple\Request;

/**
 * Request URI.
 */
final class RqUri implements RequestUri
{
    /**
     * @var array<string, string> $self
     */
    private array $self;

    /**
     * Ctor.
     *
     * @param array $components
     */
    public function __construct(array $components)
    {
        $this->self = $components;
    }

    /**
     * @return string
     */
    public function asString(): string
    {
        return join([
            $this->self['PROTOCOL'],
            '://',
            $this->self['HOST'],
            $this->self['URI']
        ]);
    }

    /**
     * @return string
     */
    public function host(): string
    {
        return $this->self['HOST'];
    }

    /**
     * @return string
     */
    public function query(): string
    {
        return $this->self['QUERY'];
    }

    /**
     * @return string
     */
    public function path(): string
    {
        return explode('?', $this->self['URI'])[0];
    }
}
