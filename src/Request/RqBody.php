<?php

namespace Maxonfjvipon\Purple\Request;

use Maxonfjvipon\ElegantElephant\Txt\TxtToString;

/**
 * Request body.
 */
final class RqBody implements RequestBody
{
    use TxtToString;

    /**
     * Ctor.
     *
     * @param array $self
     */
    public function __construct(private array $self)
    {
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
    public function get(string $name): mixed
    {
        return $this->self[$name];
    }
}
