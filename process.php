<?php
    try {
        include_once('db.php');
        include_once('dao/CarDAO.php');
        include_once('models/Car.php');

        $car = new Car();
        $car->setBrand($_POST['brand']);
        $car->setKm($_POST['km']);
        $car->setColor($_POST['color']);

        $carDao = new CarDAO($conn);
        $carDao->create($car);

        header("Location: index.php");
    } catch (Exception $e) {
        echo "Erro ao processar o formulário: " . $e->getMessage();
    }