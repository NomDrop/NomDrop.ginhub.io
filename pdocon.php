<?php
$user="csgol";
$pass="6";
try {
    $dbh = new PDO('mysql:host=xxIP;dbname=dbnamexd350', $user, $pass);
   // foreach($dbh->query('SELECT * from game25') as $row) {
   //    print_r($row);
   // }
    //$dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>