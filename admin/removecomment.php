<?php
	if (isset($_GET['id'])) {$comment_id = $_GET['id'];}
	if (isset($_GET['profile'])) {$profile_id = $_GET['profile'];}
require '../connection.php';
	$query = 'delete from comments where COMMENT_ID = "' . $comment_id . '";';
	$result = mysql_query($query);
	header('Location: edit.php?id='.$profile_id);
?>