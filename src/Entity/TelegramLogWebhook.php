<?php

namespace Jostkleigrewe\TelegramCoreBundle\Entity;

use Jostkleigrewe\TelegramCoreBundle\Repository\TelegramLogWebhookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TelegramLogWebhookRepository::class)]
class TelegramLogWebhook
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column (type: 'json')]
    private string $data = '';

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }
}
