<?php
	session_start();

	if ($_SERVER['REQUEST_METHOD'] === 'POST'){

		if (isset($_POST['fio'])) {$fio = $_POST['fio'];}				
		if (isset($_POST['birth'])) {$birth = $_POST['birth'];}				
		if (isset($_POST['kind_of_sport'])) {$kind_of_sport = $_POST['kind_of_sport'];}		
		if (isset($_POST['faculty'])) {$faculty = $_POST['faculty'];}				
		if (isset($_POST['level'])) {$level = $_POST['level'];}
		if (isset($_POST['phone'])) {$phone = $_POST['phone'];}		
		if (isset($_POST['email'])) {$email = $_POST['email'];}				
		if (isset($_POST['achievements'])) {$achievements = $_POST['achievements'];}

		require 'connection.php';

		if(is_uploaded_file($_FILES['upload_image']['tmp_name'])){
			// Читаем содержимое файла
		    $image = file_get_contents( $_FILES['upload_image']['tmp_name'] );
		    // Экранируем специальные символы в содержимом файла
		    $image = mysql_escape_string( $image );

			$query = 'insert into profiles (fio, kind_of_sport, birth, level, faculty, phone, email, achievements, img) values ("' . $fio . '", "' . $kind_of_sport . '", "' . $birth . '", "' . $level . '", "' . $faculty . '", "' . $phone . '", "' . $email . '", "' . $achievements .'","'.$image.'")' ;
			mysql_query($query);
		}

		echo '<script type="text/javascript">alert("Анкета создана!");</script>';
		header('Location: index.php');
	}
?>
