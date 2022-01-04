<?php


namespace Purple\Route;

use Purple\Request;
use Purple\Response;

/**
 * Interface Route
 * @package Purple\Route
 */
interface Route
{
    /**
     * @param Request $req
     * @return Response
     */
    public function send(Request $req): Response;
}