<?php

namespace Maxonfjvipon\Purple\Endpoint;

use Exception;
use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Any\EnsureAny;

final class EpOptOf implements OptionalEndpoint
{
    use EnsureAny;

    /**
     * @var callable $callback
     */
    private $callback;

    /**
     * @var array $cache
     */
    private array $cache = [];

    /**
     * Optional endpoint of Any
     * @param Any $any
     * @return EpOptOf
     */
    public static function any(Any $any): EpOptOf
    {
        return EpOptOf::func(fn (EpOptOf $self) => $self->ensuredAnyValue($any));
    }

    /**
     * @param callable $func
     * @param mixed ...$args
     * @return EpOptOf
     */
    public static function func(callable $func, mixed ...$args): EpOptOf
    {
        return new EpOptOf(function (EpOptOf $self) use ($func, $args) {
            $epOpt = call_user_func($func, $self, ...$args);

            if ($epOpt instanceof OptionalEndpoint) {
                return $epOpt;
            }

            throw new Exception("Function must return an instance of OptionalEndpoint");
        });
    }

    /**
     * @param callable $func
     */
    private function __construct(callable $func)
    {
        $this->callback = $func;
    }

    /**
     * @return Endpoint
     * @throws Exception
     */
    public function origin(): Endpoint
    {
        return $this->cached()->origin();
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function has(): bool
    {
        return $this->cached()->has();
    }

    /**
     * @return OptionalEndpoint
     */
    private function cached(): OptionalEndpoint
    {
        return $this->cache[0] ??= call_user_func($this->callback, $this);
    }
}