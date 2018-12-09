<?php
	session_start();
  require 'connection.php';
	$result = mysql_query("select * from forms") or die(mysql_error());
?>
<html>
	<head meta charset="utf8">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<title>Анкеты спортсменов</title>
	</head>
	<body>
		<div class="container">
			<header class="row">
				<div class="col m12 center-align">
					<a href="index.php"><img class="responsive-img" src="img/header.png"></a>
					<h3>Добро пожаловать на сайт для спортсменов ВГУ!</h3>
					<p>На этом сайте спортсмены могут оставлять информацию о себе, в том числе о своих достижениях, а также просматривать успехи других спортсменов.</p>
				</div>
			</header>
			<div class="btns row">
				<div class="create_new col s3 offset-s2">
					<a class="waves-effect waves-light btn" href="create.php">Создать новую анкету</a>
				</div>
				<div class="col s2"></div>
				<div class="admin_login col s3">
					<?php
						if(isset($_SESSION['user'])) {
							if($_SESSION['user']=='ADMIN')
								echo '<a class="waves-effect waves-light btn" href="admin/logout.php">Выйти</a>';
						}
						else
								echo '<a class="waves-effect waves-light btn" href="admin/login.php">Войти как админ</a>';
						?>
				</div>
			</div>
			<div class="cards">
				<div class="row">
					<?php
						while ($forms = mysql_fetch_array($result)){
									printf('
												    <div class="col s12 m4">
												      <div class="card">
												        <div class="card-image">
												          <img height = "200px" width = "200px" src="img/forms/%s">
												          <span class="card-title">%s</span>
												        </div>
												        <div class="card-action">
												          <a href="show.php?id=%s">Просмотр</a>', $forms["id"], $forms["fio"], $forms["id"]);
											if(isset($_SESSION['user'])) {
												if($_SESSION['user']=='ADMIN')
								          printf('<a href="admin/edit.php?id=%s">Изменить</a>', $forms['id']);
								      }
											    echo '</div>
												      </div>
												    </div>';
						}
					?>
				</div>
			</div>
			<footer class="page-footer grey lighten-2">
      	<h6 class="black-text">
      		© 2018 Щеглов Артём и Зинькевич Георгий
      	</h6>
			</footer>
		</div>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
	<style>	
	</style>
</html>
