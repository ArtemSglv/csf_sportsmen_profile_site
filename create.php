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
			$query = 'insert into forms (fio, kind_of_sport, birth, level, faculty, phone, email, achievements ) values ("' . $fio . '", "' . $kind_of_sport . '", "' . $birth . '", "' . $level . '", "' . $faculty . '", "' . $phone . '", "' . $email . '", "' . $achievements .'")' ;
			mysql_query($query);


		//копирование фотографий
		$id = mysql_insert_id();

		if(is_uploaded_file($_FILES['upload_file']['tmp_name'])){
		    	move_uploaded_file($_FILES['upload_file']['tmp_name'], "img/forms/" .  $id);
		}

		echo '<script type="text/javascript">alert("Анкета создана!");</script>';
	}
?>
<html>
	<head meta charset="utf8">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<title>Создание анкеты</title>
	</head>
	<body>
		<div class="container">
			<header class="row">
				<div class="col m12 center-align">
					<a href="index.php"><img class="responsive-img" src="img/header.png"></a>
				</div>
			</header>
			<div class="create_form">
				<form action="create.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s6 offset-s3">
				          <input id="fio" type="text" class="validate" maxlength = "50" name="fio" required>
				          <label for="fio">ФИО</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="birth" type="text" class="validate" maxlength = "10" pattern="^\d{1,2}\.\d{1,2}\.\d{4}$" name="birth" required>
				          <label for="birth">Дата рождения</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="kind_of_sport" type="text" class="validate" maxlength = "50" name="kind_of_sport" required>
				          <label for="kind_of_sport">Вид спорта</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="faculty" type="text" class="validate" maxlength = "30" name="faculty" required>
				          <label for="faculty">Факультет</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="level" type="text" class="validate" maxlength = "30" name="level" required>
				          <label for="level">Разряд в спорте</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="phone" type="text" class="validate" maxlength = "11" name="phone" required>
				          <label for="phone">Телефон</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="email" type="text" class="validate" maxlength = "30" name="email" required>
				          <label for="email">Email</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <textarea id="achievements" class="materialize-textarea" type="text" class="validate" maxlength = "500" name="achievements" required></textarea>
				          <label for="achievements">Достижения в спорте</label>
				        </div>
				        <div class="col s6 offset-s3">
						    <div class="file-field input-field">
						      <div class="btn">
						        <span>Фото</span>
						        <input type="file" name="upload_file">
						      </div>
						      <div class="file-path-wrapper">
						        <input class="file-path validate" type="text" name="file_path">
						      </div>
						    </div>
						</div>
						<button class="btn waves-effect waves-light col s6 offset-s3" type="submit" name="action">Создать
  						</button>
					</div>
				</form>
			</div>
			<footer class="page-footer grey lighten-2">
            <div class="valign-wrapper">
            	<h6 class="black-text">
            		© 2018 Щеглов Артём и Зинькевич Георгий
            	</h6>
          	</div>
			</footer>
		</div>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>