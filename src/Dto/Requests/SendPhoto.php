<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests;

class SendPhoto extends AbstractRequest
{
    private ?string $photoUrl = null;

    /**
     * @var resource|bool $fileHandle
     */
    private resource|bool $fileHandle = false;
    private string $caption = '';

    public function setPhotoUrl(string $photoUrl): static
    {
        $this->photoUrl = $photoUrl;

        return $this;
    }

    public function getPhoto(): resource|bool
    {
        return $this->fileHandle;
    }



    public function setCaption(string $caption): static
    {
        $this->caption = $caption;

        return $this;
    }

    public function getCaption(): string
    {
        return $this->caption;
    }

    protected function up(): void
    {
        $this->fileHandle = fopen($this->photoUrl, 'r');
    }

    protected function down(): void
    {
        if (false !== $this->fileHandle) {
            fclose($this->fileHandle);
        }
    }

    public function getUrl(): string
    {
        return 'sendPhoto';
    }

    protected function getBody(): ?array
    {
        return [
            'chat_id' => $this->getChatId(),
            'photo' => $this->getPhoto(),
            'caption' => $this->getCaption(),
        ];
    }

    protected function getHeaders(): ?array
    {
        return [
            'Content-Type' => 'multipart/form-data',
        ];
    }
}