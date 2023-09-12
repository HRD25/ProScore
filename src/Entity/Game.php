<?php

namespace App\Entity;

use App\Entity\Traits\idTrait;
use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
   use idTrait;

}
