<?php

namespace Purple\Route;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\PregMatch;
use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJoined;
use Maxonfjvipon\Elegant_Elephant\Text\TxtReplaced;
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
    private $origin;

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

        $joinedPrefix = join('/', $prefixes);

        preg_replace()

        return (new RtIf(
            new PregMatch(
                new TxtJoined(
                    "/\/",
                    new TxtReplaced(
                        '',
                        new TxtImploded(
                            '/',
                            ...$prefixes
                        )
                    )
                ),
                '/\/' . join('/', $prefixes) . '\//',
                $request->uri()->path()
            ),
            $this->origin,
        ))->destination($request->with(RequestHeaders::ROUTE_PREFIXES, $prefixes));


        return $this->origin->destination($request->with(
            RequestHeaders::ROUTE_PREFIXES,
            array_merge($prefixes, [$this->trimUri($this->prefix)])
        ));
    }
}
