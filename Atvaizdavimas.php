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




