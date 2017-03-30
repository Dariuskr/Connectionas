<?php

header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$username = "root";
$password = "";




try {

   $day =  $_GET['day'];

    switch ($day){

        case 'pirmadienis':
            $diena = 1;
            break;
        case 'antradienis':
            $diena = 2;
            break;
        case 'treciadienis':
            $diena = 3;
            break;
        case 'ketvirtadienis':
            $diena = 4;
            break;
        case 'penktadienis':
            $diena = 5;
            break;
        default:
            $diena = 1;
            break;

    }



    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));

    $stmt = $dbh->prepare("SELECT * FROM `meniu` WHERE `diena` = ?");

    $stmt->bindParam(1, $diena);


    // call the stored procedure
    $stmt->execute();
    $rs = $stmt->fetchAll(PDO::FETCH_OBJ);

    echo json_encode($rs);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
