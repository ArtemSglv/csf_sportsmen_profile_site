<?php
	session_start ();
	if(isset($_SESSION['user']))
		if ($_SESSION['user'] != 'ADMIN') die ( 'Запрещено' );
			session_destroy ();
	header('Location: ../index.php');
?>