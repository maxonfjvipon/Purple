<?php

namespace Purple\Exp\Response;

use Purple\Exp\Response;

final class ResponseBasic implements Response
{
    private int $status;

    private array $headers;

    private string $body;

    public function __construct(int $stts = 404, array $hdrs = [], $bd = "")
    {
        $this->status = $stts;
        $this->headers = $hdrs;
        $this->body = $bd;
    }

    public function with(string $name, string $value): Response
    {
        return match ($name) {
            'X-Status' => new self($value, $this->headers, $this->body),
            'X-Body' => new self($this->status, $this->headers, $value),
            default => new self($this->status, array_merge($this->headers, [$name . ': ' . $value]), $this->body)
        };
    }

    public function send(): void
    {
        header("HTTP/1.1 " . $this->status);
        foreach ($this->headers as $header) {
            header($header);
        }
        echo $this->body;
    }
}