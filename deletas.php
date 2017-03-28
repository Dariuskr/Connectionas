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

    $skaicius = $_GET["skaicius"];
// sql to delete a record
    $sql = "DELETE FROM meniu WHERE id=$skaicius";
    $preparedStatement = $conn->prepare($sql);

// use exec() because no results are returned
    $conn->exec($sql);
    echo "Sekmingai istrinta";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;