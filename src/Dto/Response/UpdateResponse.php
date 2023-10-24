<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Response;

use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Symfony\Component\Serializer\Annotation;


class UpdateResponse
{

    /**
     * @var int $statusCode
     */
    public int $statusCode = 200;

    /**
     * @var string $message
     */
    public string $message = '';

    /**
     * @var UpdateRequest|null $updateRequest
     */
    public ?UpdateRequest $updateRequest = null;

    /**
     * @param int $statusCode
     * @param string $message
     * @param UpdateRequest|null $updateRequest
     */
    public function __construct(
        int $statusCode,
        string $message,
        ?UpdateRequest $updateRequest = null)
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
        $this->updateRequest = $updateRequest;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): UpdateResponse
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): UpdateResponse
    {
        $this->message = $message;
        return $this;
    }


    public function getUpdateRequest(): ?UpdateRequest
    {
        return $this->updateRequest;
    }

    public function setUpdateRequest(?UpdateRequest $updateRequest): UpdateResponse
    {
        $this->updateRequest = $updateRequest;
        return $this;
    }


    
    
}
