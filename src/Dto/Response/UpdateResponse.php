<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Response;

use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Symfony\Component\Serializer\Annotation;
use Throwable;

class UpdateResponse
{
    public int $statusCode = 200;

    public string $message = '';

    public ?UpdateRequest $updateRequest = null;

    public ?Throwable $error = null;

    public function __construct(
        int $statusCode,
        string $message
    )
    {
        $this->statusCode = $statusCode;
        $this->message = $message;
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
