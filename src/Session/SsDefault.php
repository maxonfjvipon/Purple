<?php

namespace Maxonfjvipon\Purple\Session;

use Exception;

use Maxonfjvipon\Purple\Request\Request;
use Maxonfjvipon\Purple\Request\RqDefault;
use Maxonfjvipon\Purple\Response\ResponseSent;
use Maxonfjvipon\Purple\Response\RsSent;
use Maxonfjvipon\Purple\Route\Route;

/**
 * The default session.
 */
final class SsDefault implements Session
{
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
    public function __construct(private Route $route)
    {
        $this->request = RqDefault::create();
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
