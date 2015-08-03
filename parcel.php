<?php

class Parcel
{
    private $height;
    private $width;
    private $length;
    private $weight;

    function __construct($parcelH, $parcelWd, $parcelL, $parcelW)
    {
        $this->height = $parcelH;
        $this->width = $parcelWd;
        $this->length = $parcelL;
        $this->weight = $parcelW;
    }
    function setHeight($newHeight)
    {
        $this->height = $newHeight;
    }
    function getHeight()
    {
        return $this->height;
    }
    function setWidth($newWidth)
    {
        $this->width = $newWidth;
    }
    function getWidth()
    {
        return $this->width;
    }
    function setLength($newLength)
    {
        $this->length = $newLength;
    }
    function getLength()
    {
        return $this->length;
    }
    function setWeight($newWeight)
    {
        $this->weight = $newWeight;
    }
    function getWeight()
    {
        return $this->weight;
    }
    function volume()
    {
        return $this->height * $this->width * $this->length;
    }
    function costToShip()
    {
        return (0.0015 * ($this->volume() * $this->weight));
    }
}

$partyParcel = new Parcel($_GET["height"], $_GET["width"], $_GET["length"], $_GET["weight"]);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>PACKAGE INFO</title>
</head>
<body>
    <?php
    if(empty($partyParcel->getHeight()) || empty($partyParcel->getWidth()) || empty($partyParcel->getLength()) || empty($partyParcel->getWeight())) {
        echo "You missed a parameter";
    } else {
        echo "<h1>HEIGHT: " . $partyParcel->getHeight() .  "</h1>";
        echo "<h1>WIDTH: " . $partyParcel->getWidth(). "</h1>";
        echo "<h1>LENGTH: " . $partyParcel->getLength() . "</h1>";
        echo "<h1>WEIGHT: " . $partyParcel->getWeight() . "</h1>";
        echo "<h1>VOLUME: " . $partyParcel->volume() . "</h1>";
        setlocale(LC_MONETARY, 'en_US');
        echo "<h1>COST 2 SHIP: " . money_format('%(#1n', $partyParcel->costToShip()) . "</h1>";
    }
    ?>
</body>
</html>
