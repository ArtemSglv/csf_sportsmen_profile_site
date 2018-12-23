<?php
	if (isset($_GET['id'])) {$id = $_GET['id'];}
require '../connection.php';
	$query = 'delete from profiles where id = "' . $id . '";';
	//print($query);
	$result = mysql_query($query);
	if ($result) 
		echo '<script type="text/javascript">alert("Анкета успешно удалёна!");</script>';
	header('Location: ../index.php');
?>