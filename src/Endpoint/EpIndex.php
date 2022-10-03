<?php

namespace Purple\Endpoint;

use Exception;
use Purple\Request\Request;
use Purple\Response\Response;
use Purple\Response\RsEmpty;

final class EpIndex implements Endpoint
{
    /**
     * @param Request $request
     * @return Response
     */
    public function act(Request $request): Response
    {
        return new RsEmpty();
    }
}
