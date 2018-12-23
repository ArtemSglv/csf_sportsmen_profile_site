<?php
if (isset($_POST['id'])) {$id = $_POST['id'];}

require 'connection.php';

$query = 'insert into comments (TIME, NICK_NAME, COMMENT, profile_id) values (SysDate(), "' . $_POST['nickname'] . '", "' . $_POST['comment'] . '", "' . $id . '")' ;
$res = mysql_query($query);
?>