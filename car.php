<?php
class Car
{
    public $make_model;
    public $price;
    public $miles;

    function __construct($make, $price1, $miles1)
    {
      $this->make_model = $make;
      $this->price = $price1;
      $this->miles = $miles1;
    }
}

$juliosCar = new Car("Volvo", 5000, 10000);
echo juliosCar
?>
