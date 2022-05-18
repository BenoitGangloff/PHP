<?php
class Circle extends Ellipse {
// Getters & Setters
    function setSize(int $r, int $dummy = null) {
        // en PHP il doit y avoir le même nombre de paramètre: Principe de Liskov
        $this->rx = $r;
        $this->ry = $r;
    }
}