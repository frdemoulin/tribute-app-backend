<?php

namespace App\Entity;

use App\Repository\LogUserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: LogUserRepository::class)]
class LogUser
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $sessionId = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'logUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?\App\Entity\User $user = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $loginAt = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $logoutAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(?string $sessionId): self
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLoginAt(): ?\DateTimeImmutable
    {
        return $this->loginAt;
    }

    public function setLoginAt(\DateTimeImmutable $loginAt): self
    {
        $this->loginAt = $loginAt;

        return $this;
    }

    public function getLogoutAt(): ?\DateTimeImmutable
    {
        return $this->logoutAt;
    }

    public function setLogoutAt(?\DateTimeImmutable $logoutAt): self
    {
        $this->logoutAt = $logoutAt;

        return $this;
    }
}
