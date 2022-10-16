<?php

namespace Purple\Request;

use Maxonfjvipon\Elegant_Elephant\Text\StringableText;
use Maxonfjvipon\Elegant_Elephant\Text\TxtEnvelope;

/**
 * Request body.
 */
final class RqBody implements RequestBody
{
    use StringableText;

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
     * @return string
     */
    public function asString(): string
    {
        return implode('\n', array_map(
            fn (string $key, string $value) => "$key: $value",
            array_keys($this->self),
            $this->self
        ));
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
