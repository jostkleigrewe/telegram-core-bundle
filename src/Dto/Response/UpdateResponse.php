<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Response;

use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Symfony\Component\Serializer\Annotation;
use Throwable;

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
     * @var UpdateRequest|null $updateRequest
     */
    public ?Throwable $error = null;

    /**
     * @param int $statusCode
     * @param string $message
     * @param UpdateRequest|null $updateRequest
     */
    public function __construct(
        int $statusCode,
        string $message,
        ?UpdateRequest $updateRequest = null,
        ?Throwable $error = null
    )
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
        $this->updateRequest = $updateRequest;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): static
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;
        return $this;
    }


    public function getUpdateRequest(): ?UpdateRequest
    {
        return $this->updateRequest;
    }

    public function setUpdateRequest(?UpdateRequest $updateRequest): static
    {
        $this->updateRequest = $updateRequest;
        return $this;
    }

    public function getError(): ?Throwable
    {
        return $this->error;
    }

    public function setError(Throwable $error): static
    {
        $this->error = $error;
        return $this;
    }

}
