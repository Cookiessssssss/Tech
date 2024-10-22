<?php
	session_start();
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$link = mysqli_connect("localhost","root","","test_database");
	$login = $_POST['new-login'];
	$password = $_POST['new-password'];
	$degree = $_POST['new-degree'];
	$result = mysqli_query($link,"SELECT login FROM users WHERE login = '$login'");
	$myrow_login = mysqli_fetch_array($result);
	if ($login == '' or $password == '' or $degree == '')
	{
		echo'
			<script>
				alert("Не все поля заполнены");
				window.location.href = "redact-user-form.php";
			</script>
		';
	}
	else if($_SESSION['login'] == $login or $_SESSION['login'] == $myrow_login)
	{
		echo'
		<script>
			alert("Этот логин занят")
			window.location.href = "redact-user-form.php"
		</script>
		';
	}
	else
	{
		mysqli_query ($link,"INSERT INTO users VALUES (Null,'$login','$password','$degree')");
		header("Location: redact-user-form.php");
	}
?>