<?php

namespace Framework\Http;

class Request
{
    private array $queryParams;
    private ?array $parsedBody;

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function withQueryParams(array $query): Request
    {
        $new = clone $this;
        $new->queryParams = $query;

        return $new;
    }

    public function getParsedBody(): ?array
    {
        return !empty($this->parsedBody) ? $this->parsedBody : null;
    }

    public function withParsedBody($data): Request
    {
        $new = clone $this;
        $new->parsedBody = $data;

        return $new;
    }
}
