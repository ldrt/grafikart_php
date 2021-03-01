<?php
class Compteur {
    const INCREMENT = 1;
    private $fichier;

    public function __construct(string $fichier)
    {
        $this->fichier = $fichier;
    }

    public function incrementer() : void 
    {
        $cpt = 1;
        if (file_exists($this->fichier)) {
            $cpt = (int) file_get_contents($this->fichier);
            $cpt+= static::INCREMENT;
        }
        file_put_contents($this->fichier, $cpt);
    }

    public function recuperer() : int 
    {
        if (!file_exists($this->fichier)) {
            return 0;
        }
        return file_get_contents($this->fichier);
    }
}
?>