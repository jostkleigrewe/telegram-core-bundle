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
     * @var UpdateRequest|null $updateRequest
     */
    public ?UpdateRequest $updateRequest = null;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): UpdateResponse
    {
        $this->statusCode = $statusCode;
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
