<?php
class Shape {
// Visibilité | Type | Propriétés
    protected int $x;
    protected int $y;
    protected string $color;
    protected float $opacity;

// Constructeur
    function __construct() {
        $this->x=0;
        $this->y=0;
        $this->color='grey';
        $this->opacity=1;
    }

// Getters & Setters
    function setLocation(int $x, int $y) {
        $this->x=$x;
        $this->y=$y;
    }

    function setFill(string $color, float $opacity) {
        $this->color = $color;
        $this->opacity = $opacity;
    }
}