<?php

namespace Purple\Request;

use Exception;
use JetBrains\PhpStorm\Pure;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use Purple\Request;

/**
 * Request method.
 * @package Purple\Request
 */
final class RqMethod implements Text
{
    /**
     * @var Request $request
     */
    private Request $request;

    /**
     * @param Request $request
     * @return RqMethod
     */
    #[Pure] public static function new(Request $request): RqMethod
    {
        return new self($request);
    }

    /**
     * Ctor.
     * @param Request $request
     */
    private function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        return TxtUpper::ofString(RqHeaders::new($this->request)->header("REQUEST_METHOD"))->asString();
    }
}