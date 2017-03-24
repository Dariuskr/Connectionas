<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr>id<th>Id</th>pavadinimas<th>Pavadinimas</th>kaina<th>Kaina</th>Grupe</tr>";

class TableRows extends RecursiveIteratorIterator
{
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
    }

    function beginChildren()
    {
        echo "<tr>";
    }

    function endChildren()
    {
        echo "</tr>" . "\n";
    }
}

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
        echo "output: " . $rs->name . "<BR>";
    }
    echo "<BR><B>" . date("r") . "</B>";

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

