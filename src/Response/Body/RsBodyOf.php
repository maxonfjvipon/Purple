<?php

namespace Maxonfjvipon\Purple\Response\Body;

use Maxonfjvipon\ElegantElephant\Any;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Num;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\TxtImploded;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtWrap;

/**
 * Response body.
 */
final class RsBodyOf extends TxtWrap implements ResponseBody
{
    /**
     * Ctor wrap.
     *
     * @param int|float|Num $num
     * @return self
     */
    public static function num(int|float|Num $num): self
    {
        return new self(TxtOf::num($num));
    }

    /**
     * Ctor wrap.
     *
     * @param string|Txt $text
     * @return self
     */
    public static function text(string|Txt $text): self
    {
        return new self(TxtOf::func(fn () => $text));
    }

    /**
     * Ctor wrap.
     *
     * @param array|Arr $arr
     * @return self
     */
    public static function arr(array|Arr $arr): RsBodyOf
    {
        return new self(new TxtImploded("\n", ...$arr));
    }

    /**
     * Ctor wrap.
     *
     * @param Any $any
     * @return self
     */
    public static function any(Any $any): self
    {
        return new self(TxtOf::any($any));
    }

    /**
     * Ctor.
     *
     * @param string|Txt $text
     */
    private function __construct($text)
    {
        parent::__construct($text);
    }
}
