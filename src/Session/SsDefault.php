<?php

namespace Purple\Session;

use Exception;

use Purple\Request\Request;
use Purple\Request\RqDefault;
use Purple\Response\ResponseSent;
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
     * @var ResponseSent $response
     */
    private ResponseSent $response;

    /**
     * Ctor.
     *
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
        $this->request = RqDefault::new();
        $this->response = new RsSent();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function process(): void
    {
        $target = $this->route->destination($this->request);

        if ($target->has()) {
            $this->response->send($target->origin()->act($this->request));
        }

        throw new Exception("Not found", 404);
    }
}
