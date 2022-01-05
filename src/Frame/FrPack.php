<?php


namespace Purple\Frame;

use Exception;
use Purple\Frame;
use Purple\Request;
use Purple\Response;

/**
 * Class FrPack
 * @package Purple\Frame
 */
class FrPack implements Frame
{
    /**
     * @var Frame
     */
    private Frame $origin;

    /**
     * FrPack constructor.
     * @param Frame $frame
     */
    public function __construct(Frame $frame)
    {
        $this->origin = $frame;
    }

    /**
     * @inheritDoc
     */
    public function handle(Request $request): Response
    {
        return $this->origin->handle($request);
    }
}