<?php

namespace Purple\Response;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable;
use Maxonfjvipon\Elegant_Elephant\Text;

/**
 * The basic response.
 */
final class RsDefault implements Response
{
    /**
     * @var int $status
     */
    private int $status;

    /**
     * @var array|Arrayable $headers
     */
    private $headers;

    /**
     * @var string|Text $body
     */
    private $body;

    /**
     * Ctor wrap.
     *
     * @param int $status
     * @param array $headers
     * @param string $body
     * @return self
     */
    public static function new(int $status = 200, array $headers = [], string $body = ""): self
    {
        return new self($status, $headers, $body);
    }

    /**
     * Ctor.
     *
     * @param int $status
     * @param array|Arrayable $headers
     * @param string|Text $body
     */
    public function __construct(int $status = 200, $headers = [], $body = "")
    {
        $this->status = $status;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @param string $name
     * @param string|float|int $value
     * @return Response
     */
    public function with(string $name, $value): Response
    {
        switch ($name) {
            case 'X-Status':
                return new self($value, $this->headers, $this->body);
            case 'X-Body':
                return new self($this->status, $this->headers, $value);
            default:
                return new self(
                    $this->status,
                    array_merge(
                        $this->headers,
                        ["$name: $value"]
                    ),
                    $this->body
                );
        }
    }

    /**
     * Send request to client.
     *
     * @throws Exception
     */
    public function send(): void
    {
        header("HTTP/1.1 " . $this->status);

        /** @var string|int|float $header */
        foreach ($this->headers as $header) {
            header($header);
        }

        echo $this->body;
    }
}
