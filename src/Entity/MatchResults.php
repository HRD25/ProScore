<?php

namespace App\Entity;

use App\Entity\Traits\idTrait;
use App\Repository\MatchResultsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchResultsRepository::class)]
class MatchResults
{
    use idTrait;

    #[ORM\Column(nullable: true)]
    private ?array $data = null;

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(?array $data): static
    {
        $this->data = $data;

        return $this;
    }
}
