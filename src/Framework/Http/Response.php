<?php

namespace Framework\Http;

class Response
{
    private array $headers = [];
    private $body;
    private int $statusCode;
    private string $reasonPhrase = '';

    public static array $phrases = [
        200 => 'OK',
        301 => 'Moved Permanently',
        400 => 'Bad Request',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error'
    ];

    public function __construct($body, $status = 200)
    {
        $this->body = $body;
        $this->statusCode = $status;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function withBody($body): self
    {
        $new = clone $this;
        $new->body = $body;

        return $new;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getReasonPhrase(): string
    {
        if (!$this->reasonPhrase &&
            isset(self::$phrases[$this->statusCode])) {
            $this->reasonPhrase = self::$phrases[$this->statusCode];
        }

        return $this->reasonPhrase;
    }

    public function withStatus($code, $reasonPhrase = ''): self
    {
        $new = clone $this;
        $new->statusCode = $code;
        $new->reasonPhrase = $reasonPhrase;

        return $new;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function hasHeaders($header): bool
    {
        return isset($this->headers[$header]);
    }

    public function withHeader($header, $value): self
    {
        $new = clone $this;

        if ($new->hasHeaders($header)) {
            unset($new->headers[$header]);
        }

        $new->headers[$header] = $value;

        return $new;
    }
}
