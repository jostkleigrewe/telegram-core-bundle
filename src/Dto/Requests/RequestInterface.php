<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests;

interface RequestInterface
{
    public function getMethod(): string;


    public function getUrl(): string;




    public function getOptions(): array;

}