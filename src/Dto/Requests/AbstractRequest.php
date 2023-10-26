<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests;

abstract class AbstractRequest implements RequestInterface
{

    abstract public function getUrl(): string;

    abstract protected function getJson(): array;
    abstract protected function getBody(): array;
    abstract protected function getHeaders(): array;

    abstract protected function up(): array;
    abstract protected function down(): array;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getOptions(): array
    {
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

        return $options;
    }


}