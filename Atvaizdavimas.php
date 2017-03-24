<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false));

    $stmt = $dbh->prepare("SELECT id, pavadinimas, kaina, grupe, diena FROM meniu");

    // call the stored procedure
    $stmt->execute();

    echo "<B>outputting...</B><BR>";
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

try {

    $pavad = $_GET['pavadinimas'];
    $pavad = $_GET['pavadinimas'];
    $pavad = $_GET['pavadinimas'];
    $pavad = $_GET['pavadinimas'];

    $conn = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array(PDO::ATTR_PERSISTENT => false)
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO meniu (pavadinimas, kaina, grupe, diena)
    VALUES (".$pavad.",".$kaina.", ".$grope.")";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;