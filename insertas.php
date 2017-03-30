<?php

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // return only the headers and not the content
    // only allow CORS if we're doing a GET - i.e. no saving for now.
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) &&
        $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'POST') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTION');
        header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');
    }
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    echo'';
}

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

    $data = json_decode(file_get_contents('php://input'), true);
//var_dump($data['pavadinimas']);die;

    // insert a row
    $pavadinimas = $data['pavadinimas'];
    $kaina = $data['kaina'];
    $grupe = $data['grupe'];
    $diena = $data['diena'];


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

