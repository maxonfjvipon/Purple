<?php

namespace Purple\Route;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\PregMatch;
use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJoined;
use Maxonfjvipon\Elegant_Elephant\Text\TxtPregReplaced;
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
        $prefixes = $request->headers()->header(RequestHeaders::ROUTE_PREFIXES) ?? [];

        return (new RtIf(
            new PregMatch(
                new TxtJoined(
                    '/^\/',
                    new TxtPregReplaced(
                        ['/{[a-z_]+}/', '/\//'],
                        ['[0-9]+', '\/'],
                        new TxtImploded('/', ...$prefixes, $this->trimUri($this->uri))
                    ),
                    '$/'
                ),
                $request->line()->uri()->path()
            ),
            $this->origin
        ))->destination($request);
    }
}
