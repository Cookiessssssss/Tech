<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$link = mysqli_connect("localhost","root","","test_database");
	$password_check = $_POST['password-check'];
    if (isset($_POST['login'])) 
	{ 
		$login = $_POST['login'];
			if ($login == '') 
			{ 
				unset($login);
			} 
	}
    if (isset($_POST['password'])) 
	{ 
		$password=$_POST['password']; 
			if ($password =='') 
			{ 
				unset($password);
			} 
	}
	if (empty($login) or empty($password) or empty($password_check))
	{
		echo'
			<script>
				alert("Не все поля заполнены");
				window.location.href = "autorization.html";
			</script>
			';
	}
	if ($password != $password_check)
	{
		echo'
			<script>
				alert("Пароли совпадают");
				window.location.href = "autorization.html";
			</script>
		';
	}
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $result = mysqli_query($link,"SELECT login FROM users WHERE login = '$login'");
    $myrow = mysqli_fetch_array($result);
    if (($myrow['login'])!='') 
	{
		echo'
			<script>
				alert("Логин занят, выберите другой");
				window.location.href = "autorization.html";
			</script>
		';
    }
	else
	{
		$result2 = mysqli_query ($link,"INSERT INTO users VALUES(Null,'$login','$password',1)");
		if ($result2=='TRUE')
		{
			header("Location: login.html");
		}
		else 
		{
			echo "Ошибка! Вы не зарегистрированы.";
		}
	}
?>