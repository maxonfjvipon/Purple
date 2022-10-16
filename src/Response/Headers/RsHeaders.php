<?php

namespace Purple\Response\Headers;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFromCallback;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSticky;
use Maxonfjvipon\Elegant_Elephant\Arrayable\CountArrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\HasArrayableIterator;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;

/**
 * Response headers.
 */
final class RsHeaders implements ResponseHeaders
{
    use CountArrayable;
    use HasArrayableIterator;
    use CastMixed;

    /**
     * @var Arrayable $self
     */
    private Arrayable $self;

    /**
     * Ctor.
     *
     * @param array|Arrayable $headers
     */
    public function __construct($headers)
    {
        $this->self = new ArrSticky(
            new ArrFromCallback(fn () => $headers)
        );
    }

    /**
     * @return array<mixed>
     * @throws Exception
     */
    public function asArray(): array
    {
        return $this->self->asArray();
    }

    /**
     * @param string $key
     * @return mixed
     * @throws Exception
     */
    public function header(string $key)
    {
        return $this->self->asArray()[$key];
    }
}
