<?php

namespace Purple\Response\Body;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Number;
use Maxonfjvipon\Elegant_Elephant\Scalar;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtEnvelope;
use Maxonfjvipon\Elegant_Elephant\Text\TxtFromCallback;
use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;

/**
 * Response body.
 */
final class RsBody extends TxtEnvelope implements ResponseBody
{
    use CastMixed;

    /**
     * Ctor wrap.
     *
     * @param int|float|Number $num
     * @return self
     */
    public static function ofNumber($num): self
    {
        return new self(new TextOf($num));
    }

    /**
     * Ctor wrap.
     *
     * @param string|Text $text
     * @return self
     */
    public static function ofText($text): self
    {
        return new self($text);
    }

    /**
     * Ctor wrap.
     *
     * @param array|Arrayable $arr
     * @return self
     */
    public static function ofArray($arr): RsBody
    {
        return new self(fn () => new TxtImploded("\n", ...$arr));
    }

    /**
     * Ctor wrap.
     *
     * @param Scalar $scalar
     * @return self
     */
    public static function ofScalar(Scalar $scalar): self
    {
        return new self(new TextOf($scalar));
    }

    /**
     * Ctor.
     *
     * @param string|callable|Text $text
     */
    private function __construct($text)
    {
        parent::__construct(
            new TxtFromCallback(
                fn () => $this->mixedOrCallableCast($text)
            )
        );
    }
}
