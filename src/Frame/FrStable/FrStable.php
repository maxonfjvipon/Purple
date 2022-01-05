<?php

namespace Purple\Frame\FrStable;

use JetBrains\PhpStorm\Pure;
use Purple\Frame;
use Purple\Frame\FrPack;
use Purple\Request;
use Purple\Response;

/**
 * Frame stable
 *
 * <p>Always returns the same response
 *
 * @package Purple\Frame\FrStable
 */
class FrStable extends FrPack
{
    /**
     * Ctor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        parent::__construct(new class($response) implements Frame {
            /**
             * @var Response response
             */
            private Response $response;

            /**
             * Ctor.
             * @param Response $response
             */
            public function __construct(Response $response)
            {
                $this->response = $response;
            }

            /**
             * @param Request $request
             * @return Response
             */
            public function handle(Request $request): Response
            {
                return $this->response;
            }
        });
    }
}