<?php

namespace App\Entity;

use App\Entity\Traits\idTrait;
use App\Entity\Traits\timeTrait;
use App\Entity\User\User;
use App\Repository\FileRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FileRepository::class)]
class File
{
   use idTrait;
   use timeTrait;

    #[ORM\OneToMany(mappedBy: 'image', targetEntity: User::class)]
    private Collection $users;

    public function __construct(
        #[ORM\Column(length: 255, nullable: true)]
        private ?string $safeName = null,

        #[ORM\Column(length: 255, nullable: true)]
        private ?string $originalName = null,

        #[ORM\Column(length: 255, nullable: true)]
        private ?string $extension = null
    ){
        $this->users = new ArrayCollection();
        $this->createdAt = new DateTime();
        $this->updateAt = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSafeName(): ?string
    {
        return $this->safeName;
    }

    public function setSafeName(?string $safeName): static
    {
        $this->safeName = $safeName;

        return $this;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(?string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }


    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): static
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setImage($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getImage() === $this) {
                $user->setImage(null);
            }
        }

        return $this;
    }

    public function getPathFile(string $fileName): string
    {
        return '/user/files/'.$fileName;
    }

}
