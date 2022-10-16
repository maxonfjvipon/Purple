<?php

namespace Purple\Support\Traits;

use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrExploded;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSticky;
use Maxonfjvipon\Elegant_Elephant\Boolean\PregMatch;
use Maxonfjvipon\Elegant_Elephant\Text\TxtIf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJoined;
use Maxonfjvipon\Elegant_Elephant\Text\TxtPregReplaced;
use Purple\Endpoint\Endpoint;
use Purple\Endpoint\OptionalEndpoint;
use Purple\Request\Request;
use Purple\Request\RequestHeaders;
use Purple\Route\Route;
use Purple\Route\RtIf;

/**
 * Route can handle prefixes in URI.
 */
trait HandlePrefixes
{
    /**
     * @param string $prefix
     * @param Route|Endpoint $origin
     * @param bool $final
     * @return Route
     */
    private static function routeWithPrefix(string $prefix, $origin, bool $final): Route
    {
        return new class ($prefix, $origin, $final) implements Route {

            use TrimUri;

            /**
             * @var Route $route
             */
            private Route $route;

            /**
             * @var callable $getPrefixes
             */
            private $getPrefixes;

            /**
             * @var array $cache
             */
            private array $cache = [];

            /**
             * Ctor.
             *
             * @param string $prefix
             * @param Route|Endpoint $origin
             * @param bool $final
             */
            public function __construct(string $prefix, $origin, bool $final)
            {
                $this->getPrefixes = fn (Request $request) => $this->cache[0] ??= new ArrSticky(
                    new ArrMerged(
                        $request->headers()->header(RequestHeaders::ROUTE_PREFIXES) ?? [],
                        new ArrMapped(
                            new ArrExploded("/", $this->trimUri($prefix)),
                            fn (string $prefix) => trim($prefix)
                        )
                    )
                );
                $this->route = new RtIf(
                    $origin,
                    fn (Request $request, callable $getPrefixes) => new PregMatch(
                        new TxtJoined(
                            '/^\/',
                            new TxtPregReplaced(
                                ["/{[0-9a-z_]+}/", "/\//"],
                                ['[0-9a-z_]+', '\/'],
                                new TxtImploded("/", ...$getPrefixes($request)->asArray())
                            ),
                            new TxtIf(
                                !$final,
                                '.*'
                            ),
                            '$/'
                        ),
                        $request->line()->uri()->path()
                    ),
                    $this->getPrefixes
                );
            }

            /**
             * @param Request $request
             * @return OptionalEndpoint
             */
            public function destination(Request $request): OptionalEndpoint
            {
                /** @var Arrayable<string> $prefixes */
                $prefixes = call_user_func($this->getPrefixes, $request);

                return $this->route->destination($request->with(RequestHeaders::ROUTE_PREFIXES, $prefixes->asArray()));
            }
        };
    }
}
