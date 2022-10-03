<?php

namespace Purple\Response\Body;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\CastText;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;

/**
 * Response body.
 */
final class RsBody implements ResponseBody
{
    use CastMixed;
    use CastText;

    /**
     * @var string|callable|Text $self
     */
    private $self;

    /**
     * Ctor wrap.
     *
     * @param int|float|Numerable $num
     * @return self
     */
    public static function ofNumber($num): self
    {
        return new self(fn () => (string) $this->castMixed($num));
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
     * @param Any $any
     * @return self
     */
    public static function ofAny(Any $any): self
    {
        return new self(new TextOf($any));
    }

    /**
     * Ctor.
     *
     * @param string|callable|Text $text
     */
    private function __construct($text)
    {
        $this->self = $text;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return $this->textOrCallableCast($this->self);
    }
}
