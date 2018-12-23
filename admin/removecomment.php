<?php
	if (isset($_GET['id'])) {$comment_id = $_GET['id'];}
	if (isset($_GET['form'])) {$form_id = $_GET['form'];}
require '../connection.php';
	$query = 'delete from comments where COMMENT_ID = "' . $comment_id . '";';
	$result = mysql_query($query);
	if ($result) echo "Комментарий успешно удалён. <a href = 'edit.php?id=" . $form_id . "'>Вернуться назад</a>";
	else echo 'что-то не так';
?>