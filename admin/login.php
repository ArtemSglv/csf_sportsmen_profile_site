<?php
	session_start ();
	//если вошли, то ридерект на главную
	if(isset($_SESSION['user']))
		if ($_SESSION['user']=='ADMIN'){
			header('Location: ../index.php');
		}
	include ('config.php');
	if (isset($_POST['LogIn'])) {
		$login =$_POST['login'];
  	$pass = $_POST['password'];
    if ($login == $adminlogin && $password == $adminpass) {
			$_SESSION['user'] = 'ADMIN';
			header('Location: ../index.php');
		}
	}
?>
<html>
	<head meta charset="utf8">
	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
	<title>Вход</title>
	</head>
	<body>
		<div class="container">
			<header class="row">
				<div class="col m12 center-align">
					<a href="index.php"><img class="responsive-img" src="../img/logo.png"></a>
					<h3>Введите логин и пароль, чтобы войти как администратор!</h3>
				</div>
			</header>
			<div class="create_form">
				<form action="login.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s6 offset-s3">
		          <input id="login" type="text" class="validate" maxlength = "50" name="login" required>
		          <label for="login">Логин</label>
				    </div>
				  </div>
				  <div class="row">
		        <div class="input-field col s6 offset-s3">
		          <input id="password" type="password" class="validate" maxlength = "50" name="password" required>
		          <label for="password">Пароль</label>
		        </div>
		      </div>
	        <div class="center-align">
						<button class="btn waves-effect waves-light" type="submit" name="LogIn">Войти</button>
					</div>					
				</form>
			</div>
			<footer class="page-footer grey lighten-2">
      	<h6 class="black-text">
      		© 2018 Щеглов Артём и Зинькевич Георгий
      	</h6>
			</footer>
		</div>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
	</body>
	<style>	
	</style>
</html>