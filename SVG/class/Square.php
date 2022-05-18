<?php
class Square extends Rectangle {
    // Une possibilité est... Mais ce n'est pas la seule
    function setSize(int $size, int $dummy = null) {
        // en PHP il doit y avoir le même nombre de paramètre: Principe de Liskov (SO L ID)
        $this->width = $size;
        $this->height = $size;
    }
}