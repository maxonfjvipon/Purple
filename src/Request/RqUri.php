<?php

namespace Purple\Request;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrExploded;
use Maxonfjvipon\Elegant_Elephant\Text;
use Purple\Request;

/**
 * Request href
 * @package Purple\Request
 */
final class RqUri implements Text
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * Ctor wrap.
     * @param Request $req
     * @return RqUri
     */
    public static function new(Request $req): RqUri
    {
        return new self($req);
    }

    /**
     * Ctor.
     * @param Request $req
     */
    private function __construct(Request $req)
    {
        $this->request = $req;
    }

    /**
     * @inheritDoc
     */
    public function asString(): string
    {
        return ArrExploded::byString("?")
            ->ofString(RqHeaders::new($this->request)->header("REQUEST_URI"))
            ->asArray()[0];
    }
}