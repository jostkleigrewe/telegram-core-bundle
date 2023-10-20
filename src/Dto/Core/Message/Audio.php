<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message;

/**
 * DTO Audio
 *
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @link https://core.telegram.org/bots/api#audio
 */
class Audio
{

    /**
     * Identifier for this file, which can be used to download or reuse the file
     *
     * @var string $fileId
     */
    public string $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and
     * for different bots. Can't be used to download or reuse the file.
     *
     * @var string $file_unique_id
     */
    public string $file_unique_id;

    /**
     * Duration of the audio in seconds as defined by sender
     *
     * @var int $duration
     */
    public int $duration;

    /**
     * Optional. Performer of the audio as defined by sender or by audio tags
     *
     * @var string|null $performer
     */
    public ?string $performer = null;

    /**
     * Optional. Title of the audio as defined by sender or by audio tags
     *
     * @var string|null $title
     */
    public ?string $title = null;

    /**
     * Optional. Original filename as defined by sender
     *
     * @var string|null $file_name
     */
    public ?string $file_name = null;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var string|null $mime_type
     */
    public ?string $mime_type = null;

    /**
     * Optional. File size in bytes. It can be bigger than 2^31 and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant
     * bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this value.
     *
     * @var int|null $file_size
     */
    public ?int $file_size = null;

    /**
     * Optional. Thumbnail of the album cover to which the music file belongs
     *
     * @var PhotoSize|null $thumbnail
     */
    public ?PhotoSize $thumbnail = null;

    public function getFileId(): string
    {
        return $this->fileId;
    }

    public function setFileId(string $fileId): Audio
    {
        $this->fileId = $fileId;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): Audio
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): Audio
    {
        $this->duration = $duration;
        return $this;
    }

    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    public function setPerformer(?string $performer): Audio
    {
        $this->performer = $performer;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): Audio
    {
        $this->title = $title;
        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    public function setFileName(?string $file_name): Audio
    {
        $this->file_name = $file_name;
        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    public function setMimeType(?string $mime_type): Audio
    {
        $this->mime_type = $mime_type;
        return $this;
    }

    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    public function setFileSize(?int $file_size): Audio
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?PhotoSize $thumbnail): Audio
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }
}