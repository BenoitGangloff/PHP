<?php
    declare(strict_types=1);
    include 'functions.php';
    include 'class/Shape.php';
    include 'class/Rectangle.php';
    include 'class/Ellipse.php';
    include 'class/Polygon.php';
    include 'class/Square.php';
    include 'class/Circle.php';
    include 'class/Triangle.php';

    $rect = new Rectangle();
    $rect->setLocation(50, 100);
    $rect->setSize(200, 75);
    $rect->setFill("green", 0.8);

    $elli = new Ellipse();
    $elli->setLocation(400, 137);
    $elli->setSize(100, 50);
    $elli->setFill("red", 0.5);

    $poly = new Polygon();
    $poly->setPosition(600, 100, 700, 100, 600, 200, 700 ,200);
    $poly->setFill("blue", 0.7);

    $square = new Square();
    $square->setLocation(750, 100);
    $square->setSize(100);
    $square->setFill("orange", 0.3);

    $circle = new Circle();
    $circle->setLocation(100, 300);
    $circle->setSize(50);
    $circle->setFill("brown", 0.5);
    
    $triangle = new Triangle();
    $triangle->setCoordinates(500, 300, 700, 300, 600, 450);
    $triangle->setFill("violet", 0.7);


    $svg = '<svg width="1000" height="800">';

    // // Rectangle
    // $svg .= genRectangle(0,0,50,40,"red",0.5);
    // // Ellipse
    // $svg .= genEllipse(150,25,50,25,"green",0.5);
    // // Triangle
    // $svg .= genTriangle(275,0,300,50,250,50,"brown",0.5);
    // // Cercle
    // $svg .= genCircle(375,25,25,"orange",0.5);
    // // Carré
    // $svg .= genSquare(450,0,50,"black",0.5);

    $svg .= $rect->draw();
    $svg .= $elli->draw();
    $svg .= $poly->draw();
    $svg .= $square->draw();
    $svg .= $circle->draw();
    $svg .= $triangle->draw();
    

    $svg .= '</svg>';

include 'index.phtml';