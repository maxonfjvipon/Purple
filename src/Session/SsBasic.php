<?php

namespace Purple\Session;

use Exception;
use HttpException;
use JetBrains\PhpStorm\Pure;
use Purple\Frame;
use Purple\Request\RqLive;
use Purple\Response\RsBasic;
use Purple\Session;

/**
 * The basic session.
 * @package Purple
 */
final class SsBasic implements Session
{
    /**
     * @var Frame $page
     */
    private Frame $page;

    /**
     * Ctor wrap.
     * @param Frame $page
     * @return SsBasic
     */
    #[Pure] public static function new(Frame $page): SsBasic
    {
        return new self($page);
    }

    /**
     * Ctor.
     * @param Frame $pg
     */
    private function __construct(Frame $pg)
    {
        $this->page = $pg;
    }

    /**
     * Process the request
     * @throws Exception
     */
    public function process(): void
    {
        $this->target()->writtenInVia(RsBasic::new())->send();
    }

    /**
     * @return Frame
     * @throws Exception
     */
    private function target(): Frame
    {
        $target = $this->page->handle(RqLive::new());
        if ($target->has()) {
            return $target->origin();
        }
        throw new HttpException("Not found", 404);
    }
}