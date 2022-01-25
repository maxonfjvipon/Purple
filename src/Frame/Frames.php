<?php

namespace Purple\Frame;

use Exception;
use HttpException;
use JetBrains\PhpStorm\Pure;
use Purple\Frame;
use Purple\FramePack;
use Purple\Frame\FramePack\FrPackEmpty;
use Purple\Request;
use Purple\Response;

/**
 * Frames.
 * @package Purple\Frame
 */
final class Frames implements Frame
{
    /**
     * @var Frame[] $frames
     */
    private array $frames;

    #[Pure] public static function new(Frame ...$frames): Frames
    {
        return new self($frames);
    }

    /**
     * Ctor.
     * @param Frame ...$frms
     */
    private function __construct(Frame ...$frms)
    {
        $this->frames = $frms;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function handle(Request $req): FramePack
    {
        $target = FrPackEmpty::new();
        foreach ($this->frames as $frame) {
            $current = $frame->handle($req);
            if ($current->has()) {
                $target = $current;
                break;
            }
        }
        return $target;
    }

    /**
     * Should never happen...
     * @inheritDoc
     * @throws HttpException
     */
    public function writtenInVia(Response $response): Response
    {
        throw new HttpException("Not found", 404);
    }
}