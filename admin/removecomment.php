<?php
	if (isset($_GET['id'])) {$id = $_GET['id'];}
	if (isset($_GET['form'])) {$formid = $_GET['form'];}
require '../connection.php';
	$query = 'delete from comments where COMMENT_ID = "' . $id . '";';
	$result = mysql_query($query);
	if ($result) echo "Комментарий успешно удалён. <a href = 'edit.php?id=" . $formid . "'>Вернуться назад</a>";
	else echo 'что-то не так';
?>