<?php

namespace Purple\Response;

use JetBrains\PhpStorm\Pure;
use Purple\Response;

final class ResponseBasic implements Response
{
    private int $status;

    private array $headers;

    private string $body;

    /**
     * Ctor wrap.
     * @param int $status
     * @param array $headers
     * @param string $body
     * @return ResponseBasic
     */
    #[Pure] public static function new(int $status = 200, array $headers = [], $body = ""): ResponseBasic
    {
        return new self($status, $headers, $body);
    }

    /**
     * Ctor.
     * @param int $stts
     * @param array $hdrs
     * @param string $bd
     */
    private function __construct(int $stts = 200, array $hdrs = [], $bd = "")
    {
        $this->status = $stts;
        $this->headers = $hdrs;
        $this->body = $bd;
    }

    /**
     * @inheritDoc
     */
    public function with(string $name, string $value): Response
    {
        return match ($name) {
            'X-Status' => new self($value, $this->headers, $this->body),
            'X-Body' => new self($this->status, $this->headers, $value),
            default => new self($this->status, array_merge($this->headers, [$name . ': ' . $value]), $this->body)
        };
    }

    /**
     * Send request to client.
     */
    public function send(): void
    {
        header("HTTP/1.1 " . $this->status);
        foreach ($this->headers as $header) {
            header($header);
        }
        echo $this->body;
    }
}