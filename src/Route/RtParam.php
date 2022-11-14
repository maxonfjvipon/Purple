<?php

namespace Maxonfjvipon\Purple\Route;

use Exception;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\Purple\Request\Request;
use Maxonfjvipon\Purple\Request\RequestHeaders;
use Maxonfjvipon\Purple\Support\Traits\TrimUri;

/**
 * Route param.
 */
final class RtParam implements Txt
{
    use TrimUri;

    /**
     * Ctor.
     * @param Request $request
     * @param string $name
     */
    public function __construct(private Request $request, private string $name)
    {
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        $prefixes = $this->request->headers()->get(RequestHeaders::X_ROUTE_PREFIXES) ?? [];
        $param = "";

        if (!empty($prefixes)) {
            if (($key = array_search("{" . $this->name . "}", $prefixes)) !== false) {
                $path = $this->request->line()->uri()->path();

                $param = explode("/", $this->trimUri($path))[$key] ?? "";
            }
        }

        return $param;
    }
}
