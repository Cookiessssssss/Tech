<?php
	session_start();
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$link = mysqli_connect("localhost","root","","test_database");
	$login = $_POST['login-delete'];
	if($login == "")
	{
		echo'
			<script>
				alert("Не все поля заполнены");
				window.location.href = "redact-user-form.php";
			</script>
		';
	}
	else if($_SESSION['login'] == $login)
	{
		echo'
		<script>
			alert("Нельзя удалить авторизованного пользователя")
			window.location.href = "redact-user-form.php"
		</script>
		';
	}
	else
	{
		mysqli_query ($link,"DELETE FROM users WHERE login = '$login'");
		header("Location: redact-user-form.php");
	}
?>