<?php

namespace Purple\Route;

use Exception;
use Purple\Endpoint\Endpoint;
use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;
use Purple\Request\RequestHeaders;
use Purple\Support\Traits\TrimUri;

/**
 * Route by URI.
 */
final class RtUri implements Route
{
    use TrimUri;

    /**
     * @var string $uri
     */
    private string $uri;

    /**
     * @var Route|Endpoint $origin
     */
    private $origin;

    /**
     * Ctor.
     *
     * @param string $uri
     * @param Route|Endpoint $origin
     */
    public function __construct(string $uri, $origin)
    {
        $this->uri = $uri;
        $this->origin = $origin;
    }

    /**
     * @param Request $request
     * @return OptionalEndpoint
     * @throws Exception
     */
    public function destination(Request $request): OptionalEndpoint
    {
        return (new RtIf(
            $request->uri()->path() === $this->resultUri($request),
            $this->origin
        ))->destination($request);
    }

    /**
     * @param Request $request
     * @return string
     */
    private function resultUri(Request $request): string
    {
        $prefixes = $request->headers()->header(RequestHeaders::ROUTE_PREFIXES) ?? [];

        return '/' . join('/', [...$prefixes, $this->trimUri($this->uri)]);
    }
}
