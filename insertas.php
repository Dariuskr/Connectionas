<?php

header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');    // cache for 1 day

$servername = "localhost";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=localhost;port=3306;dbname=meniu", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO `meniu` (`pavadinimas`, `kaina`, `grupe`, `diena`)
    VALUES (? , ? , ?, ?)");


    // insert a row
    $pavadinimas = $_GET['pavadinimas'];
    $kaina = $_GET['kaina'];
    $grupe = $_GET['grupe'];
    $diena = $_GET['diena'];


    $stmt->bindParam(1, $pavadinimas);
    $stmt->bindParam(2, $kaina);
    $stmt->bindParam(3, $grupe);
    $stmt->bindParam(4, $diena);


    $stmt->execute();

    echo "Sekmingai prideta";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

