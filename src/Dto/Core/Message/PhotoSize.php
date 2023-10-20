<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message;

/**
 * Class PhotoSize
 *
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @link https://core.telegram.org/bots/api#photosize
 */
class PhotoSize
{
    /**
     * Unique identifier for this file
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
     * Photo width
     *
     * @var int $width
     */
    public int $width;

    /**
     * Photo height
     *
     * @var int $height
     */
    public int $height;

    /**
     * Optional. File size
     *
     * @var int|null $fileSize
     */
    public ?int $fileSize = null;

}