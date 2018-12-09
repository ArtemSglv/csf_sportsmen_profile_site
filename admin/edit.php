<?php
	session_start ();
	if (isset($_GET['id'])) {$id = $_GET['id'];}
	require '../connection.php';
	$result = mysql_query('select fio, birth, kind_of_sport, faculty, level, achievements, phone, email from forms where id =' . $id);
	$form = mysql_fetch_array($result);
	//print_r($form);
?>
<!DOCTYPE html>
<html>
<head meta charset="utf8">
	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
	<title><?php printf($form["fio"]); ?>, редактирование анкеты</title>
	<script type = "text/javascript" src = "http://code.jquery.com/jquery-2.0.3.min.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="row">
				<div class="col m12 center-align">
					<a href="../index.php"><img class="responsive-img" src="../img/header.png"></a>
				</div>
			</header>
			<div class="edit_form">
				<div class="row">
					<div class="col m12 center-align">
						<img src = <?php printf('"../img/forms/%s"', $id);?> >
					</div>
				</div>
				<form action="update.php" method="POST">
					<div class="row">
						<div class="input-field col s6 offset-s3">
				          <input id="fio" type="text" class="validate" maxlength = "50" required name="fio" value = <?php print($form["fio"]);?>>
				          <label for="fio">ФИО</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="birth" type="text" class="validate" maxlength = "10" pattern="^\d{1,2}\.\d{1,2}\.\d{4}$" name="birth" required value =<?php printf("%s", $form["birth"]); ?>>
				          <label for="birth">Дата рождения</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="kind_of_sport" type="text" class="validate" maxlength = "50" name="kind_of_sport" required value =<?php printf("%s", $form["kind_of_sport"]); ?>>
				          <label for="kind_of_sport">Вид спорта</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="faculty" type="text" class="validate" maxlength = "30" name="faculty" required value =<?php printf("%s", $form["faculty"]); ?>>
				          <label for="faculty">Факультет</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="level" type="text" class="validate" maxlength = "30" name="level" required value =<?php printf("%s", $form["level"]); ?>>
				          <label for="level">Разряд в спорте</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="phone" type="text" class="validate" maxlength = "11" name="phone" required value =<?php printf("%s", $form["phone"]); ?>>
				          <label for="phone">Телефон</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <input id="email" type="text" class="validate" maxlength = "30" name="email" required value =<?php printf("%s", $form["email"]); ?>>
				          <label for="email">Email</label>
				        </div>
				        <div class="input-field col s6 offset-s3">
				          <textarea id="achievements" class="materialize-textarea" type="text" class="validate" maxlength = "500" name="achievements" required><?php printf("%s", $form["achievements"]);?></textarea>
				          <label for="achievements">Достижения в спорте</label>
				        </div>
				        <input type = "hidden" maxlength = "30" value = <?php printf('%s', $id);?> name = "id">
				        <button class="btn waves-effect waves-light col s2 offset-s3" type="submit" name="action">Обновить</button>
					</div>
				</form>
			</div>
			<div class="comments row">
				<div class="center-align">
					<form method="POST">
						<div class="row">
							<div class="input-field col s3 offset-s3">
			          <input id="nickname" type="text" class="validate" maxlength = "30" name="nickname" required>
			          <label for="nickname">Ник</label>
			        </div>
			      </div>
			      <div class="row">
							<div class="input-field col s6 offset-s3">
			          <textarea id="comment" class="materialize-textarea" type="text" class="validate" maxlength = "1000" name="comment" required></textarea>
			          <label for="comment">Комментарий</label>
					    </div>
					  </div>
						<input type = "hidden" maxlength = "30" value = <?php printf('%s', $id);?> name = "id">
						<button class="btn waves-effect waves-light col s2 offset-s3" type="submit" id="submitbtn">Добавить</button>
					</form>
					<script type="text/javascript">
					$(document).ready(function(){
						$('#submitbtn').click (function(){
							$.post('../addcomment.php', 
							{
								nickname: $('input[name = "nickname"]').val(),
								id: $('input[name = "id"]').val(),
								comment: $('textarea[name = "comment"]').val()
							},  
							function (data){
								alert("Комментарий успешно добавлен");
								document.location.href = document.location;
							});
						});
					})
					</script>
				</div>
			</div>
			<div class="early_comments row">
				<h4>Комментарии</h4>
				<?php 
				
					$query = "select NICK_NAME, COMMENT, COMMENT_ID from comments where FORM_ID= " . $id; // тянем из базы комменты
					$comments = mysql_query($query);

					while ($com = mysql_fetch_array($comments)) // и рисуем
					{
						echo '<div class="divider"></div>
										  <div class="section">';
						if(isset($_SESSION['user']))
							if ($_SESSION['user']=='ADMIN')
								
								printf('<h5>%s</h5>
												<p>%s</p>',$com["NICK_NAME"], $com["COMMENT"]);
								printf("<div class='right-align'><a href='removecomment.php?id=%s&form=%s'>Удалить</a></div>", $com["COMMENT_ID"], $id);
						echo '</div>';

					}
				?>				
			</div>
			<footer class="page-footer grey lighten-2">
        <div class="valign-wrapper">
        	<h6 class="black-text">
        		© 2018 Щеглов Артём и Зинькевич Георгий
        	</h6>
      	</div>
			</footer>
			<script type="text/javascript" src="../js/materialize.min.js"></script>
		</div>
	</body>
</html>