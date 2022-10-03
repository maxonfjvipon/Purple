<?php

namespace Purple\Session;

use Exception;
//use HttpException;
use Purple\Endpoint\Endpoint;
use Purple\Request\Request;
use Purple\Request\RqDefault;
use Purple\Response\RsSent;
use Purple\Route\Route;

/**
 * The default session.
 */
final class SsDefault implements Session
{
    /**
     * @var Route $route
     */
    private Route $route;

    /**
     * @var Request $request
     */
    private Request $request;

    /**
     * Ctor.
     *
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
        $this->request = RqDefault::new();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function process(): void
    {
        (new RsSent($this->target()->act($this->request)))->send();
    }

    /**
     * @return Endpoint
//     * @throws HttpException
     * @throws Exception
     */
    private function target(): Endpoint
    {
        $target = $this->route->destination($this->request);

        if ($target->has()) {
            return $target->origin();
        }

        throw new Exception("Not found", 404);
    }
}
