<?php

namespace App\Entity;

use phpDocumentor\Reflection\Types\Boolean;

class RelancePartie {

    private $nouvellePartie;

    /**
     * @return bool
     */
    public function getNouvellePartie(){
        return $this->nouvellePartie;
    }

    /**
     * @param bool $relance
     * @return bool
     */
    public function setNouvellePartie(?bool $nouvellePartie){
        return $this->nouvellePartie = $nouvellePartie;
        return $this;
    }
}