<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=meniu', $username, $password, array( PDO::ATTR_PERSISTENT => false));

    $stmt = $dbh->prepare("CALL getname()");

    // call the stored procedure
    $stmt->execute();

    echo "<B>outputting...</B><BR>";
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo "output: ".$rs->name."<BR>";
    }
    echo "<BR><B>".date("r")."</B>";

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

