<?php

namespace Purple\Resources\Frame;

use JetBrains\PhpStorm\Pure;
use Purple\Frame;
use Purple\Request;
use Purple\Response;

class FrIndex implements Frame
{
    /**
     * @inheritDoc
     */
    #[Pure] public function handle(Request $request): Response
    {
       return new Response\RsEmpty();
    }
}