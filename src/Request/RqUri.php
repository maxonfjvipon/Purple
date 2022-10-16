<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Text\StringableText;

/**
 * Request URI.
 */
final class RqUri implements RequestUri
{
    use StringableText;

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
            $this->self[RequestUri::PROTOCOL],
            '://',
            $this->self[RequestUri::HOST],
            $this->self[RequestUri::URI]
        ]);
    }

    /**
     * @return string
     */
    public function host(): string
    {
        return $this->self[RequestUri::HOST];
    }

    /**
     * @return string
     */
    public function query(): string
    {
        return $this->self[RequestUri::QUERY];
    }

    /**
     * @return string
     */
    public function path(): string
    {
        return explode('?', $this->self[RequestUri::URI])[0];
    }
}
