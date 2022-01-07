<?php

namespace Purple\Exp;

use Exception;
use Purple\Exp\Response\BaseResponse;

/**
 * The session.
 * @package Purple\Exp
 */
class Session
{
    /**
     * @var Page $page
     */
    private Page $page;

    /**
     * Ctor.
     * @param Page $pg
     */
    public function __construct(Page $pg)
    {
        $this->page = $pg;
    }

    /**
     * Process the request
     * @throws Exception
     */
    public function process()
    {
        $this->page->via((new BaseResponse()))->send();
    }
}