<?php


namespace Purple\Response;

use ElegantBro\Interfaces\Stringify;
use ElegantBro\Stringify\Just;
use ElegantBro\Stringify\Strings\Formatted;
use ElegantBro\Stringify\Strings\Joined;
use Purple\Head;

/**
 * Class HeadPrint
 * @package Purple\Response
 */
class HeadPrint implements Head, Stringify
{
    /**
     * HTTP End Of Line.
     */
    private static string $EOL = "\r\n";

    /**
     * @var Head
     */
    private Head $origin;

    /**
     * HeadPrint constructor.
     * @param Head $head
     */
    public function __construct(Head $head)
    {
        $this->origin = $head;
    }

    /**
     * @inheritDoc
     */
    public function head(): array
    {
        return $this->origin->head();
    }

    public function asString(): string
    {
        return (new Formatted(
            new Just("%s%s%s"),
            Joined::strings(
                self::$EOL,
                $this->head(),
            ),
            self::$EOL,
            self::$EOL
        ))->asString();
    }
}