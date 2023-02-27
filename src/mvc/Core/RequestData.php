<?php

namespace mvc\Core;

use JsonException;

class RequestData {
    private array $get;

    private array $post;

    private array $headers;

    private array $server;

    private mixed $body;

    public function __construct(
        array $get = [],
        array $post = [],
        array $headers = [],
        array $server = [],
        mixed $body = null
    ) {
        $this->get     = $get;
        $this->post    = $post;
        $this->headers = $headers;
        $this->server  = $server;
        $this->body    = $body;
    }

    public function get(): array {
        return $this->get;
    }

    public function post(): array {
        if ($this->isJsonBody()) {
            $jsonData   = $this->bodyJson();
            $this->post = is_array($jsonData) ? $jsonData : [];
        }

        return $this->post;
    }

    public function server(): array {
        return $this->server;
    }

    public function body(): ?string {
        return $this->body;
    }

    public function headers(): array {
        return $this->headers;
    }

    public function isJsonBody(): bool {
        $method = strtoupper($this->server['REQUEST_METHOD'] ?? '');
        if (in_array($method, ['GET', 'HEAD'])) {
            return false;
        }

        $contentType = $this->headers['Content-Type'] ?? null;
        return $contentType === 'application/json';
    }

    /**
     * @throws JsonException
     */
    public function bodyJson(): mixed {
        $json = $this->body;
        if ($json === '' || $json === null) {
            return [];
        }
        return json_decode($json, true, JSON_THROW_ON_ERROR, JSON_THROW_ON_ERROR);
    }
}
