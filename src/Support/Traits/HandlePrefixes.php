<?php

namespace Maxonfjvipon\Purple\Support\Traits;

use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\ArrMapped;
use Maxonfjvipon\ElegantElephant\Arr\ArrMerged;
use Maxonfjvipon\ElegantElephant\Arr\ArrSplit;
use Maxonfjvipon\ElegantElephant\Arr\ArrSticky;
use Maxonfjvipon\ElegantElephant\Logic\PregMatch;
use Maxonfjvipon\ElegantElephant\Txt\TxtIf;
use Maxonfjvipon\ElegantElephant\Txt\TxtImploded;
use Maxonfjvipon\ElegantElephant\Txt\TxtJoined;
use Maxonfjvipon\ElegantElephant\Txt\TxtPregReplaced;
use Maxonfjvipon\Purple\Endpoint\Endpoint;
use Maxonfjvipon\Purple\Endpoint\OptionalEndpoint;
use Maxonfjvipon\Purple\Request\Request;
use Maxonfjvipon\Purple\Request\RequestHeaders;
use Maxonfjvipon\Purple\Request\RqWithHeader;
use Maxonfjvipon\Purple\Route\Route;
use Maxonfjvipon\Purple\Route\RtIf;

/**
 * Route can handle prefixes in URI.
 */
trait HandlePrefixes
{
    /**
     * @param string $prefix
     * @param Endpoint|Route $origin
     * @param bool $final
     * @return Route
     */
    private function routeWithPrefix(
        string $prefix,
        Endpoint|Route $origin,
        bool $final
    ): Route
    {
        return new class ($prefix, $origin, $final) implements Route {

            use TrimUri;

            /**
             * @var array $cache
             */
            private array $cache = [];

            /**
             * @var callable $getPrefixes
             */
            private $getPrefixes;

            /**
             * @var Route $route
             */
            private Route $route;

            /**
             * Ctor.
             *
             * @param string $prefix
             * @param Route|Endpoint $origin
             * @param bool $final
             */
            public function __construct(
                string $prefix,
                Endpoint|Route $origin,
                bool $final
            )
            {
                $this->getPrefixes = $getPrefixes = fn (Request $request) => $this->cache[0] ??= new ArrSticky(
                    new ArrMerged(
                        $request->headers()->get(RequestHeaders::X_ROUTE_PREFIXES), // fixme
                        new ArrMapped(
                            new ArrSplit("/", $this->trimUri($prefix)),
                            fn (string $prefix) => trim($prefix)
                        )
                    )
                );
                $this->route = new RtIf(
                    fn (Request $request) => new PregMatch(
                        new TxtJoined([
                            '/^\/',
                            new TxtPregReplaced(
                                ["/{[0-9a-z_]+}/", "/\//"],
                                ['[0-9a-z_]+', '\/'],
                                new TxtImploded("/", ...$getPrefixes($request))
                            ),
                            new TxtIf(
                                !$final,
                                '.*'
                            ),
                            '$/'
                        ]),
                        $request->line()->uri()->path()
                    ),
                    $origin
                );
            }

            /**
             * @param Request $request
             * @return OptionalEndpoint
             */
            public function destination(Request $request): OptionalEndpoint
            {
                /** @var Arr $prefixes */
                $prefixes = call_user_func($this->getPrefixes, $request);

                return $this->route->destination(
                    new RqWithHeader(
                        $request,
                        RequestHeaders::X_ROUTE_PREFIXES,
                        $prefixes
                    )
                );
            }
        };
    }
}
