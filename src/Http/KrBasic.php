<?php

namespace Purple\Http;

use Purple\Frame;
use Purple\Request\RqLive;
use Purple\Response\RsHtml;

/**
 * Class KrBasic
 * @package Purple\Http
 */
final class KrBasic implements Kernel
{
    private Frame $frame;

    public function __construct(Frame $frame)
    {
        $this->frame = $frame;
    }

    public function process()
    {
        $request = new RqLive(); // request - need to construct from $_GET, $_POST, etc...
        $response = $this->frame->handle($request); // response - made from frame
        $rsAsHtml = (new RsHtml($response))->asString();
        var_dump($rsAsHtml);
        echo $rsAsHtml;
    }
}