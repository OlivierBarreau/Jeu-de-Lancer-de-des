<?php

namespace App\Entity;

use App\Repository\ClassementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassementRepository::class)]
class Classement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $rang;

    #[ORM\Column(type: 'string')]
    private $pseudo;

    #[ORM\Column(type: 'integer')]
    private $nombreMatchGagne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRang(): ?int
    {
        return $this->rang;
    }

    public function setRang(int $rang): self
    {
        $this->rang = $rang;

        return $this;
    }

    public function getNombreMatchGagne(): ?int
    {
        return $this->nombreMatchGagne;
    }

    public function setNombreMatchGagne(int $nombreMatchGagne): self
    {
        $this->nombreMatchGagne = $nombreMatchGagne;

        return $this;
    }

     public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

}
