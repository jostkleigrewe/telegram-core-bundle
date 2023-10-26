<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests;

abstract class AbstractRequest implements RequestInterface
{
    protected string $method = 'POST';

    public function __construct() {
        $this->up();
    }

    public function __destruct() {
        $this->down();
    }
    
    abstract public function getUrl(): string;

    protected function getJson(): ?array
    {
        return null;
    }

    protected function getBody(): ?array
    {
        return null;
    }

    protected function getHeaders(): ?array
    {
        return null;
    }

    protected function up(): void {}
    protected function down(): void {}

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getOptions(): array
    {
        $this->up();

        $options = [];

        //  add headers
        if ($this->getHeaders()) {
            $options['headers'] = $this->getHeaders();
        }

        //  add body
        if ($this->getBody()) {
            $options['body'] = $this->getBody();
        }

        //  add json
        if ($this->getJson()) {
            $options['json'] = $this->getJson();
        }

        dump($options);

        return $options;
    }
}