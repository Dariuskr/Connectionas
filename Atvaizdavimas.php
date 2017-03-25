<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));

    $stmt = $dbh->prepare("SELECT id, pavadinimas, kaina, grupe, diena FROM meniu");

    // call the stored procedure
    $stmt->execute();

    echo "<B>Meniu</B><BR>";
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "Pavadinimas: " . $rs->pavadinimas . "<BR>";
        echo "Kaina: " . $rs->kaina . "<BR>";
        echo "Grupe: " . $rs->grupe . "<BR>";
        echo "Diena: " . $rs->diena . "<BR>";
    }
    echo "<BR><B>" . date("r") . "</B>";

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

//try {
//
//    $pavad = $_GET['pavadinimas'];
//    $kaina = $_GET['kaina'];
//    $grupe = $_GET['grupe'];
//    $diena = $_GET['diena'];
//
//    $conn = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false)
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $sql = "INSERT INTO meniu (pavadinimas, kaina, grupe, diena)
//    VALUES (".$pavad.",".$kaina.",".$grupe.",".$diena.")";
//    // use exec() because no results are returned
//
//    $conn->exec($sql);
//    echo "New record created successfully";
//}
//catch(PDOException $e)
//{
//    echo $sql . "<br>" . $e->getMessage();
//}
//
//$conn = null;

try {
    $conn = new PDO("mysql:host=localhost;port=3306;dbname=meniu", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO `meniu` (`pavadinimas`, `kaina`, `grupe`, `diena`) 
    VALUES (? , ? , ?, ?)");

    // insert a row
    $pavadinimas = "Bulves";
    $kaina = 4.00;
    $grupe = "karstas";
    $diena = 2;


    $stmt->bindParam(1, $pavadinimas);
    $stmt->bindParam(2, $kaina);
    $stmt->bindParam(3, $grupe);
    $stmt->bindParam(4, $diena);



    $stmt->execute();

    echo "Sekmingai prideta";
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
