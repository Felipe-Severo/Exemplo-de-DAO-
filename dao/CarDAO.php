<?php

include_once(__DIR__ . "/../models/Car.php");

class CarDAO implements CarDAOInterface {
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    public function create(Car $car) {
        $stmt = $this->conn->prepare("INSERT INTO cars (brand, km, color) VALUES (:brand, :km, :color)");

        $brand = $car->getBrand();
        $km = $car->getKm();
        $color = $car->getColor();
        
        $stmt->bindParam(':brand', $brand);
        $stmt->bindParam(':km', $km, PDO::PARAM_INT);
        $stmt->bindParam(':color', $color);

        $stmt->execute();
    }

    public function findAll() {
        $cars = [];

        $stmt = $this->conn->query("SELECT * FROM cars");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $row) {
            $car = new Car();

            $car->setId($row['id']);
            $car->setBrand($row['brand']);
            $car->setKm($row['km']);
            $car->setColor($row['color']);

            $cars[] = $car;
        }
        return $cars;
    }
    
}