<?php
$link = mysql_connect('162.255.116.142', 'csgolqyk_krazy2', '6j4twj04nt23n92');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>