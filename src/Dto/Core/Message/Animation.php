<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message;

/**
 * Class Animation
 *
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 *
 * @link https://core.telegram.org/bots/api#animation
 */
class Animation
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
     * Video width as defined by sender
     *
     * @var int $width
     */
    public int $width;

    /**
     * Video height as defined by sender
     *
     * @var int $height
     */
    public int $height;

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @var int $duration
     */
    public int $duration;

    /**
     * Optional. Animation thumbnail as defined by sender
     *
     * @var PhotoSize|null $thumbnail
     */
    public ?PhotoSize $thumbnail = null;

    /**
     * Optional. Original animation filename as defined by sender
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
     * File size in bytes. It can be bigger than 2^31 and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most
     * 52 significant bits, so a signed 64-bit integer or double-precision float
     * type are safe for storing this value.
     *
     * @var int|null $file_size
     */
    public ?int $file_size = null;

    public function getFileId(): string
    {
        return $this->fileId;
    }

    public function setFileId(string $fileId): Animation
    {
        $this->fileId = $fileId;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): Animation
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): Animation
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): Animation
    {
        $this->height = $height;
        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): Animation
    {
        $this->duration = $duration;
        return $this;
    }

    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?PhotoSize $thumbnail): Animation
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    public function setFileName(?string $file_name): Animation
    {
        $this->file_name = $file_name;
        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    public function setMimeType(?string $mime_type): Animation
    {
        $this->mime_type = $mime_type;
        return $this;
    }

    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    public function setFileSize(?int $file_size): Animation
    {
        $this->file_size = $file_size;
        return $this;
    }
    
    
}