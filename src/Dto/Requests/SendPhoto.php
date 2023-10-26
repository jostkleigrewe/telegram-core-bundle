<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests;

class SendPhoto extends AbstractRequest
{

    /**
     * @var resource|bool $fileHandle
     */
    private $fileHandle = false;


    public function __construct(
        private int     $chatId,
        private string  $photoUrl,
        private ?string $caption = null
    )
    {
        parent::__construct();
    }

    protected function up(): void
    {
        $this->fileHandle = fopen($this->photoUrl, 'r');

        if (!$this->fileHandle) {
            throw new \RuntimeException("Failed to open file: {$this->photoUrl}");
        }
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
            'chat_id' => $this->chatId,
            'caption' => $this->caption,
            'photo' => $this->fileHandle,
        ];
    }

    protected function getHeaders(): ?array
    {
        return [
            'Content-Type' => 'multipart/form-data',
        ];
    }
}