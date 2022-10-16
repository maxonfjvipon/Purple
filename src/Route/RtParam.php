<?php

namespace Purple\Route;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\CastMixed;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\StringableText;
use Purple\Request\Request;
use Purple\Request\RequestHeaders;
use Purple\Support\Traits\TrimUri;

/**
 * Route param.
 */
final class RtParam implements Text
{
    use TrimUri;
    use CastMixed;
    use StringableText;

    /**
     * @var Request $request
     */
    private Request $request;

    /**
     * @var string|Text $name
     */
    private $name;

    /**
     * Ctor.
     *
     * @param Request $request
     * @param string|Text $name
     */
    public function __construct(Request $request, $name)
    {
        $this->request = $request;
        $this->name = $name;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function asString(): string
    {
        $prefixes = $this->request->headers()->header(RequestHeaders::ROUTE_PREFIXES) ?? [];

        if (!empty($prefixes)) {
            if (($key = array_search("{" . $this->mixedCast($this->name) . "}", $prefixes)) !== false) {
                $path = $this->request->line()->uri()->path();

                return explode("/", $this->trimUri($path))[$key] ?? "";
            }
        }

        return "";
    }
}
