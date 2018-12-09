<?php
$dbname="test_practice";
$host = "localhost";
$user="root";
$pass="root";
$db = @mysql_connect($host,$user, $pass);
mysql_set_charset( 'utf8',  $db);
mysql_select_db( $dbname,$db);
?>
