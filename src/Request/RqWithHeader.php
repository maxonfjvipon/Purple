<?php

namespace Maxonfjvipon\Purple\Request;

use Maxonfjvipon\ElegantElephant\Arr\ArrWith;

/**
 * Request with extra header.
 */
final class RqWithHeader extends RqWrap
{
    /**
     * Ctor.
     * @param Request $request
     * @param string $name
     * @param mixed $value
     */
    public function __construct(
        Request $request,
        private string $name,
        private mixed $value
    )
    {
        parent::__construct(
            new RequestOf(
                $request->line(),
                new RqHeaders(
                    new ArrWith(
                        $this->request->headers(),
                        $this->name,
                        $this->value
                    )
                ),
                $request->body(),
                $request->cookie(),
                $request->files()
            )
        );
    }
}