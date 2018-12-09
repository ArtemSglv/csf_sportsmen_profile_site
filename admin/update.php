<?php

if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['fio'])) {$fio = $_POST['fio'];}				
if (isset($_POST['birth'])) {$birth = $_POST['birth'];}				
if (isset($_POST['kind_of_sport'])) {$kind_of_sport = $_POST['kind_of_sport'];}		
if (isset($_POST['faculty'])) {$faculty = $_POST['faculty'];}				
if (isset($_POST['level'])) {$level = $_POST['level'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}		
if (isset($_POST['email'])) {$email = $_POST['email'];}				
if (isset($_POST['achievements'])) {$achievements = $_POST['achievements'];}

require '../connection.php';
	
	$query = "update forms SET fio= '" . $fio . "', birth= '" . $birth . "', kind_of_sport= '" . $kind_of_sport . "', faculty = '" . $faculty . "', level = '" . $level . "', achievements = '" . $achievements . "', phone = '" . $phone . "', email = '" . $email . "' where id =  " . $id;
	$result = mysql_query($query);
	
	//echo '<script type="text/javascript">alert("Анкета обновлена!");</script>';
	header('Location: ../show.php?id='.$_POST['id']);

?>