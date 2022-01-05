<?php


namespace Purple\Route;


use Purple\Request;
use Purple\Response;

/**
 * Pack for the route
 * @package Purple\Route
 */
class RtPack implements Route
{

    /**
     * @var Route $origin
     */
    private Route $origin;

    /**
     * Ctor.
     * @param Route $origin
     */
    public function __construct(Route $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @inheritDoc
     */
    public function send(Request $req): Response
    {
        return $this->origin->send($req);
    }
}