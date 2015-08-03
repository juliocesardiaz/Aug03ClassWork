<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $car_image;

    function __construct($make, $price1, $miles1, $pic)
    {
      $this->make_model = $make;
      $this->price = $price1;
      $this->miles = $miles1;
      $this->car_image = $pic;
    }

    function setMake($newMake)
    {
      $this->make_model = $newMake;
    }
    function getMake()
    {
      return $this->make_model;
    }
    function setPrice ($newPrice)
    {
      $this->price = $newPrice;
    }
    function getPrice()
    {
      return $this->price;
    }
    function setMiles($newMiles)
    {
      $this->miles = $newMiles;
    }
    function getMiles()
    {
      return $this->miles;
    }
    function setImage($newImage)
    {
      $this->car_image = $newImage;
    }
    function getImage()
    {
      return $this->car_image;
    }

}

$firstCar = new Car("Tesla X", 100000, 0, "pictures/tesla.jpg");
$secondCar = new Car("Honda Accord", 10000, 50000, "pictures/honda.jpg");
$thirdCar = new Car("Ferrari Enzo", 350000, 15000, "pictures/ferrari-enzo.jpg");
$fourthCar = new Car("Toyota Corolla", 6000, 100000, "pictures/toyota-corolla.jpg");
$fifthCar = new Car("Mitsubishi Lancer", 20000, 100, "pictures/mitsubishi-lancer.jpg");
$allCars = array($firstCar, $secondCar, $thirdCar, $fourthCar, $fifthCar);
function searchCar($maxPrice, $maxMileage, $cars)
{
  $searchedCars = array();
  foreach ($cars as $car)
  {
    $price = $car->getPrice();
    $mileage = $car->getMiles();
    if(($price <= $maxPrice) && ($mileage <= $maxMileage)) {
      array_push($searchedCars, $car);
    }
  }
  return $searchedCars;
}
$matchingCars = searchCar($_GET["max_price"], $_GET["max_mileage"], $allCars);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <title>RESULTS</title>
</head>
<body>
  <div class="container">
    <h1>HERE ARE THE CARS YOU SEARCHED FOR</h1>
    <ul>
      <?php
        if (empty($matchingCars)) {
          echo "<h2>There ain't no cars here.</h2>";
        } else {
            foreach ($matchingCars as $result) {
              echo "<img src=" .  $result->getImage() . ">";
              echo "<ul>" . $result->getMake() ."</ul>";
              setlocale(LC_MONETARY, 'en_US');
              echo "<ul>Price: " . money_format('%i', $result->getPrice()) . "</ul>";
              echo "<ul>Mileage: " . number_format($result->getMiles()) . "</ul>";
            }
          }
      ?>
