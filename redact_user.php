<?php
	session_start();
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$link = mysqli_connect("localhost","root","","test_database");
	$old_login = $_POST['old-login-redact'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$degree = $_POST['degree'];
	if ($login == '' or $password == '' or $degree == '')
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
			alert("Нельзя редактировать авторизованного пользователя")
			window.location.href = "redact-user-form.php"
		</script>
		';
	}
	else
	{
		mysqli_query ($link,"UPDATE users SET login = '$login', password = '$password',degree = '$degree' WHERE login='$old_login'");
		header("Location: redact-user-form.php");
	} 
?>