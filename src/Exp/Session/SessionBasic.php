<?php

namespace Purple\Exp\Session;

use Exception;
use HttpException;
use Purple\Exp\Page;
use Purple\Exp\Response\ResponseBasic;
use Purple\Exp\Session;

/**
 * The basic session.
 * @package Purple\Exp
 */
final class SessionBasic implements Session
{
    /**
     * @var Page $page
     */
    private Page $page;

    /**
     * @var array<string> $keys
     */
    private array $keys = [
        'HTTP_HOST',
        'HTTP_COOKIE',
        'SERVER_NAME',
        'REQUEST_SCHEME',
        'REQUEST_URI',
        'REQUEST_METHOD',
    ];

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
    public function process(): void
    {
        $this->target()->via(new ResponseBasic())->send();
    }

    /**
     * @return Page
     * @throws Exception
     */
    private function target(): Page
    {
        $target = $this->page->handle();
        if ($target->has()) {
            return $target->origin();
        }
        throw new HttpException("Not found", 404);
    }
}