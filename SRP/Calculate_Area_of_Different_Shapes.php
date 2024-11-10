
/*Question*/
<!-- class ShapeCalculator {
    public function getArea($shape) {
        if ($shape['type'] === 'rectangle') {
            return $shape['width'] * $shape['height'];
        } elseif ($shape['type'] === 'circle') {
            return pi() * pow($shape['radius'], 2);
        } elseif ($shape['type'] === 'triangle') {
            return 0.5 * $shape['base'] * $shape['height'];
        }
        return 0;
    }
}

$calculator = new ShapeCalculator();
echo $calculator->getArea(['type' => 'rectangle', 'width' => 5, 'height' => 10]);
echo $calculator->getArea(['type' => 'circle', 'radius' => 7]);
echo $calculator->getArea(['type' => 'triangle', 'base' => 4, 'height' => 8]); -->





<!-- Evaluation
What’s Good 👍
Separation of Concerns: You’ve split the calculations for each shape into individual methods, which is great for readability and flexibility.
Clear Method Naming: Each method clearly states what shape it calculates the area for, which enhances clarity.
Suggestions for Improvement 💡
Class Naming Conventions: According to PHP’s naming conventions for classes, class names should be in PascalCase. shapeCalculator should be ShapeCalculator.
Single Responsibility Principle (SRP): The ShapeCalculator class still does multiple things. Ideally, each shape should have its own class (e.g., Rectangle, Circle, and Triangle), each with a method to calculate its area. This way, ShapeCalculator doesn’t need to know about each shape’s properties.
Method Naming Conventions: Method names like setRectangle and setCircle suggest setting values rather than calculating them. Renaming them to something like calculateRectangleArea or area would make their purpose clearer.
Avoid Hardcoding Calculations in Setters: Returning calculations directly in the setter method is unusual. A clearer structure would be to set properties in setters, then have a separate method for calculating the area. -->


<?php

abstract class Shape {
    abstract public function area(): float;
}

class Rectangle extends Shape {
    private $width;
    private $height;

    public function __construct(int $width, int $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area(): float {
        return $this->width * $this->height;
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct(int $radius) {
        $this->radius = $radius;
    }

    public function area(): float {
        return pi() * pow($this->radius, 2);
    }
}

class Triangle extends Shape {
    private $base;
    private $height;

    public function __construct(int $base, int $height) {
        $this->base = $base;
        $this->height = $height;
    }

    public function area(): float {
        return 0.5 * $this->base * $this->height;
    }
}

// Usage
$rectangle = new Rectangle(5, 10);
$circle = new Circle(7);
$triangle = new Triangle(4, 8);

echo $rectangle->area();
echo $circle->area();
echo $triangle->area();
?>