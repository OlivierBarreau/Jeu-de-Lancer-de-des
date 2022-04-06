<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Inscription {
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=1, max=100)
     */
    private $pseudoPremierJoueur;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=1, max=100)
     */
    private $pseudoDeuxiemeJoueur;

    /**
     * @return null|string
     */
    public function getPseudoPremierJoueur(){
        return $this->pseudoPremierJoueur;
    }

    /**
     * @param string|null $pseudoJ1 
     * @return string|null
     */
    public function setPseudoPremierJoueur(?string $pseudoJ1 ){
        return $this->pseudoPremierJoueur = $pseudoJ1;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPseudoDeuxiemeJoueur(){
        return $this->pseudoDeuxiemeJoueur;
    }

    /**
     * @param null|string $pseudoJ2 
     * @return null|string
     */
    public function setPseudoDeuxiemeJoueur(?string $pseudoJ2 ){
        return $this->pseudoDeuxiemeJoueur = $pseudoJ2;
        return $this;
    }
}