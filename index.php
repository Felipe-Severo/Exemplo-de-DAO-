<?php
    include_once('db.php');
    include_once('dao/CarDAO.php');

    $carDao = new CarDAO($conn);
    $cars = $carDao->findAll();
?>

<h1>Insira um carro</h1>

<form action="process.php" method="POST">
    <label for="brand">Marca:</label><br>
    <input type="text" name="brand" id="brand" required><br><br>

    <label for="km">Quilometragem:</label><br>
    <input type="number" name="km" id="km" required><br><br>

    <label for="color">Cor:</label><br>
    <input type="text" name="color" id="color" required><br><br>

    <input type="submit" value="Cadastrar">
</form>

<h2>Carros cadastrados:</h2>
<ul>
    <?php foreach ($cars as $car): ?>
        <li>
            <?php echo "ID: " . $car->getId() . " - Marca: " . $car->getBrand() . " - KM: " . $car->getKm() . " - Cor: " . $car->getColor(); ?>
        </li>
    <?php endforeach; ?>
</ul>   
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    h1, h2 {
        color: #333;
    }
    form {
        margin-bottom: 30px;
    }
    label {
        font-weight: bold;
    }
    input[type="text"], input[type="number"] {
        width: 300px;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    ul {
        list-style-type: none;
        padding: 0;
    }
    li {
        background-color: #f9f9f9;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
</style>