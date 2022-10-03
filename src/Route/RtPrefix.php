<?php

namespace Purple\Route;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\PregMatch;
use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJoined;
use Maxonfjvipon\Elegant_Elephant\Text\TxtPregReplaced;
use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;
use Purple\Request\RequestHeaders;
use Purple\Support\Traits\TrimUri;

/**
 * Route with prefix.
 */
final class RtPrefix implements Route
{
    use TrimUri;

    /**
     * @var string $prefix
     */
    private string $prefix;

    /**
     * @var Route $origin
     */
    private Route $origin;

    /**
     * Ctor.
     *
     * @param string $prefix
     * @param Route $route
     */
    public function __construct(string $prefix, Route $route)
    {
        $this->prefix = $prefix;
        $this->origin = $route;
    }

    /**
     * @param Request $request
     * @return OptionalEndpoint
     * @throws Exception
     */
    public function destination(Request $request): OptionalEndpoint
    {
        $prevPrefixes = $request->headers()->header(RequestHeaders::ROUTE_PREFIXES) ?? [];

        $prefixes = array_merge($prevPrefixes, [$this->trimUri($this->prefix)]);

        return (new RtIf(
            new PregMatch(
                new TxtJoined(
                    '/^\/',
                    new TxtPregReplaced(
                        ['/{[a-z_]+}/', '/\//'],
                        ['[0-9]+', '\/'],
                        new TxtImploded("/", ...$prefixes)
                    ),
                    '.*$/'
                ),
                $request->line()->uri()->path(),
            ),
            $this->origin,
        ))->destination($request->with(RequestHeaders::ROUTE_PREFIXES, $prefixes));
    }
}
