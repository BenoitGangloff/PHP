<?php
class Rectangle extends Shape {
// Visibilité | Type | Propriétés
    protected int $width;
    protected int $height;

// Constructeur
    function __construct() {
        parent::__construct();
        //Pour appeller la méthode __construct de Shape
        //On "Surcharge" le constructeur de Shape
        //"::" (= "->" pour les Classes): Opérateur de résolution de Portée
        $this->width=10;
        $this->height=5;
    }

// Getters & Setters
// Rq: on pourrait ajouter "public" au début de la fonction mais c'est implicite.
    function setSize(int $width, int $height) {
        $this->width = $width;
        $this->height = $height;
        // $this = Objet Courant (ici Rectangle)
    }

// Autres Fonctions
    function draw():string
    {
        return '<rect x="'.$this->x.'" y="'.$this->y.'" width="'.$this->width.'" height="'.$this->height.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}