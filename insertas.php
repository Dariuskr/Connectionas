<?php

$servername = "localhost";
$username = "root";
$password = "";

try{

    $pavad = $_GET['pavadinimas'];
    $kaina = $_GET['kaina'];
    $grupe = $_GET['grupe'];
    $diena = $_GET['diena'];

    $conn = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO meniu (pavadinimas, kaina, grupe, diena)
    VALUES (" . $pavad . "," . $kaina . "," . $grupe . "," . $diena . ")";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch (PDOException $e) {

    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;