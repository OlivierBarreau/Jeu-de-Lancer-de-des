<?php

namespace App\Entity;

use App\Repository\PartieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartieRepository::class)]
class Partie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $joueur1;

    #[ORM\Column(type: 'string', length: 100)]
    private $joueur2;

    #[ORM\Column(type: 'integer')]
    private $scoreJoueur1;

    #[ORM\Column(type: 'integer')]
    private $scoreJoueur2;

    #[ORM\Column(type: 'integer')]
    private $nombreLancerJoueur1;

    #[ORM\Column(type: 'integer')]
    private $nombreLancerJoueur2;

    #[ORM\Column(type: 'string', length: 100)]
    public $vainqueur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoueur1(): ?string
    {
        return $this->joueur1;
    }

    public function setJoueur1(string $joueur1): self
    {
        $this->joueur1 = $joueur1;

        return $this;
    }

    public function getJoueur2(): ?string
    {
        return $this->joueur2;
    }

    public function setJoueur2(string $joueur2): self
    {
        $this->joueur2 = $joueur2;

        return $this;
    }

    public function getScoreJoueur1(): ?int
    {
        return $this->scoreJoueur1;
    }

    public function setScoreJoueur1(int $scoreJoueur1): self
    {
        $this->scoreJoueur1 = $scoreJoueur1;

        return $this;
    }

    public function getScoreJoueur2(): ?int
    {
        return $this->scoreJoueur2;
    }

    public function setScoreJoueur2(int $scoreJoueur2): self
    {
        $this->scoreJoueur2 = $scoreJoueur2;

        return $this;
    }

    public function getNombreLancerJoueur1(): ?int
    {
        return $this->nombreLancerJoueur1;
    }

    public function setNombreLancerJoueur1(int $nombreLancerJoueur1): self
    {
        $this->nombreLancerJoueur1 = $nombreLancerJoueur1;

        return $this;
    }

    public function getNombreLancerJoueur2(): ?int
    {
        return $this->nombreLancerJoueur2;
    }

    public function setNombreLancerJoueur2(int $nombreLancerJoueur2): self
    {
        $this->nombreLancerJoueur2 = $nombreLancerJoueur2;

        return $this;
    }

    public function getVainqueur(): ?string
    {
        return $this->vainqueur;
    }

    public function setVainqueur(string $vainqueur): self
    {
        $this->vainqueur = $vainqueur;

        return $this;
    }
}
