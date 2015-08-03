<?php
class Triangle
{
    private $side_a;
    private $side_b;
    private $side_c;

    function __construct($sideA, $sideB, $sideC)
    {
        $this->side_a = $sideA;
        $this->side_b = $sideB;
        $this->side_c = $sideC;
    }
    function setSideA($sideA)
    {
        $this->side_a = $sideA;
    }
    function getSideA()
    {
        return $this->side_a;
    }
    function setSideB($sideB)
    {
        $this->side_b = $sideB;
    }
    function getSideB()
    {
        return $this->side_b;
    }
    function setSideC($sideC)
    {
        $this->side_c = $sideC;
    }
    function getSideC()
    {
        return $this->side_c;
    }
    function isNotTriangle()
    {
        $isSideA = ($this->side_a > ($this->side_b + $this->side_c));
        $isSideB = ($this->side_b > ($this->side_a + $this->side_c));
        $isSideC = ($this->side_c > ($this->side_b + $this->side_a));
        if($isSideA || $isSideB || $isSideC) {
            return true;
        }
        return false;
    }
    function whatTriangle()
    {
        if(($this->side_a == $this->side_b) && ($this->side_a == $this->side_c)) {
            return "Your Triangle is Equilateral";
        } elseif(($this->side_a == $this->side_b) || ($this->side_a == $this->side_c) || ($this->side_c == $this->side_b)) {
            return "Your Triangle is Isosceles";
        } else {
            return "Your Triangle is Scalene";
        }
    }
}
$daTriangle = new Triangle($_GET['side1'], $_GET['side2'], $_GET['side3']);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>TRIANGLEzzzzz</title>
</head>
<body>
    <div class="container">
        <h1>Da Triangle</h1>
        <?php
            if($daTriangle->isNotTriangle()){
                echo "<h1>That Aint No Triangle</h1>";
            } else {
                echo "<h1>" . $daTriangle->whatTriangle() . "</h1>";
            }
        ?>
    </div>
</body>
</html>
