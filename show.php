<?php
	session_start ();
	//$_SESSION['user']='USER';
	if (isset($_GET['id'])) {$id = $_GET['id'];}
	require 'connection.php';
	$result = mysql_query('select fio, birth, kind_of_sport, faculty, level, achievements, phone, email FROM profiles where id =' . $id);
	$profile = mysql_fetch_array($result);
?>
<html>
	<head meta charset="utf8">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<title><?php printf($profile["fio"]) ?></title>
	<script type = "text/javascript" src = "http://code.jquery.com/jquery-2.0.3.min.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="row">
					<div class="col m12 center-align">
						<a href="index.php"><img class="responsive-img" src="img/logo.png"></a>
					</div>
			</header>
			<div class="show_profile">
				<?php
					if (isset($_SESSION['user']))
						if ($_SESSION['user']=='ADMIN')
							printf("<a href = 'admin/edit.php?id=%s'>Редактировать</a>", $id);
				?>
			<ul class="collection">
		      <li class="collection-item"><img height= "300px" src = <?php printf('"get_image.php?id=%s"', $id);?> ></li>
		      <li class="collection-item">Имя: <?php printf('%s', $profile["fio"]);?></li>
		      <li class="collection-item">Дата рождения: <?php printf('%s', $profile["birth"]);?></li>
		      <li class="collection-item">Вид спорта: <?php printf('%s', $profile["kind_of_sport"]);?></li>
		      <li class="collection-item">Факультет: <?php printf('%s', $profile["faculty"]);?></li>
		      <li class="collection-item">Разряд в спорте: <?php printf('%s', $profile["level"]);?></li>
		      <li class="collection-item">Телефон: <?php printf('%s', $profile["phone"]);?></li>
		      <li class="collection-item">Почта: <?php printf('%s', $profile["email"]);?></li>
		      <li class="collection-item">Достижения в спорте: <?php printf('%s', $profile["achievements"]);?></li>
		    </ul>			
			</div>
			<div class="comments">
				<form method="POST">
					<div class="row">
						<div class="input-field col s3">
		          <input id="nickname" type="text" class="validate" maxlength = "30" name="nickname" required>
		          <label for="nickname">Ник</label>
		        </div>
		      </div>
		      <div class="row">
						<div class="input-field col s6">
				          <textarea id="comment" class="materialize-textarea" type="text" class="validate" maxlength = "1000" name="comment" required></textarea>
				          <label for="comment">Комментарий</label>
				    </div>
				  </div>
					<input type = "hidden" maxlength = "30" value = <?php printf('%s', $id);?> name = "id">
					<button class="btn waves-effect waves-light col s1" type="submit" id="submitbtn">Добавить
					</button>
				</form>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#submitbtn').click (function(){
							$.post('addcomment.php', 
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
			<div class="early_comments row">
				<h4>Комментарии</h4>
				<?php				
					$query = "select NICK_NAME, COMMENT, COMMENT_ID from comments where profile_id= " . $id; // тянем из базы комменты
					$comments = mysql_query($query);

					while ($com = mysql_fetch_array($comments)) // и рисуем
					{
						printf('<div class="divider"></div>
										  <div class="section">
										    <h5>%s</h5>
										    <p>%s</p>
										</div>',$com["NICK_NAME"], $com["COMMENT"]);

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
			<script type="text/javascript" src="js/materialize.min.js"></script>
		</div>
	</body>
</html>