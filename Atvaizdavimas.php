<?php

header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$username = "root";
$password = "";


try {
    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));

    $stmt = $dbh->prepare("SELECT id, pavadinimas, kaina, grupe, diena FROM meniu");

    // call the stored procedure
    $stmt->execute();
    $rs = $stmt->fetchAll(PDO::FETCH_OBJ);

   echo json_encode($rs);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

//try {
//    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));
//
//    $stmt = $dbh->prepare("SELECT * FROM `meniu`WHERE `diena` = 1");
//
//    // call the stored procedure
//    $stmt->execute();
//    $rs = $stmt->fetchAll(PDO::FETCH_OBJ);
//
//    echo json_encode($rs);
//
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}
//
//try {
//    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));
//
//    $stmt = $dbh->prepare("SELECT * FROM `meniu`WHERE `diena` = 2");
//
//    // call the stored procedure
//    $stmt->execute();
//    $rs = $stmt->fetchAll(PDO::FETCH_OBJ);
//
//    echo json_encode($rs);
//
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}
//
//try {
//    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));
//
//    $stmt = $dbh->prepare("SELECT * FROM `meniu`WHERE `diena` = 3");
//
//    // call the stored procedure
//    $stmt->execute();
//    $rs = $stmt->fetchAll(PDO::FETCH_OBJ);
//
//    echo json_encode($rs);
//
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}
//
//try {
//    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));
//
//    $stmt = $dbh->prepare("SELECT * FROM `meniu`WHERE `diena` = 4");
//
//    // call the stored procedure
//    $stmt->execute();
//    $rs = $stmt->fetchAll(PDO::FETCH_OBJ);
//
//    echo json_encode($rs);
//
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}
//
//try {
//    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));
//
//    $stmt = $dbh->prepare("SELECT * FROM `meniu`WHERE `diena` = 5");
//
//    // call the stored procedure
//    $stmt->execute();
//    $rs = $stmt->fetchAll(PDO::FETCH_OBJ);
//
//    echo json_encode($rs);
//
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}