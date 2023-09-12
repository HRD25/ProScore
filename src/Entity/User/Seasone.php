<?php

namespace App\Entity\User;

use App\Entity\Traits\idTrait;
use App\Repository\User\SeasoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeasoneRepository::class)]
class Seasone
{
  use idTrait;
}
