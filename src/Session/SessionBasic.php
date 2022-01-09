<?php

namespace Purple\Session;

use Exception;
use HttpException;
use JetBrains\PhpStorm\Pure;
use Purple\Page;
use Purple\Response\ResponseBasic;
use Purple\Session;

/**
 * The basic session.
 * @package Purple
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

    #[Pure] public static function new(Page $page): SessionBasic
    {
        return new self($page);
    }

    /**
     * Ctor.
     * @param Page $pg
     */
    private function __construct(Page $pg)
    {
        $this->page = $pg;
    }

    /**
     * Process the request
     * @throws Exception
     */
    public function process(): void
    {
        $this->target()->via(ResponseBasic::new())->send();
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