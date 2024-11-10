//answer
<?php
class shapeCalculator{
    private $rectangle;
    private $circle;
    private $triangle;

    public function setRectangle(int $width, int $height){
        return $width*$height;
    }

    public function setCircle(int $radius){
        return pi() * pow($radius, 2);
    }

    public function setTriangle(int $base, int $height){
        return 0.5 *$base*$height;
    }
}

$calculator = new shapeCalculator();
echo $calculator->setRectangle(5, 10);
echo $calculator->setCircle(7);
echo $calculator->setTriangle(4, 8);

?>



<!-- Score 75%

Final Thoughts
Your refactoring was on the right track and followed a more organized structure. 
Keep working on principles like SRP and naming conventions to further refine your clean code skills. 
Good job! Let me know if you want another example to work on. -->