<?php

namespace Maxonfjvipon\Purple\Response\Headers;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrSticky;

/**
 * Response headers.
 */
final class RsHeaders implements ResponseHeaders
{
    /**
     * @var Arr $self
     */
    private Arr $self;

    /**
     * Ctor.
     *
     * @param array|Arr $headers
     */
    public function __construct(array|Arr $headers)
    {
        $this->self = new ArrSticky(
            ArrOf::func(fn () => $headers)
        );
    }

    /**
     * @return array
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->self->asArray();
    }

    /**
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function get(string $name): mixed
    {
        return $this->self->asArray()[$name];
    }
}
