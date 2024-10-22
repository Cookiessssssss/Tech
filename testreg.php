<?php
    session_start();	
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
	if (empty($login) or empty($password))
		{
		echo'
			<script>
				alert("Вы заполнили не все поля");
				window.location.href = "login.html";
			</script>
			';
		}
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);
    $link = mysqli_connect("localhost","root","","test_database");
	$result = mysqli_query($link,"SELECT * FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['login']))
	{
		echo'
			<script>
				alert("Такого логина не существует");
				window.location.href = "login.html";
			</script>
		';
	}
	else 
	{
		if ($myrow['password']==$password) 
		{
			$_SESSION['degree']=$myrow['degree'];
			$_SESSION['login']=$myrow['login']; 
			header("Location: head.php");
		}
		else 
		{
			echo'
			<script>
				alert("Неверный пароль");
				window.location.href = "login.html";
			</script>
		';
		}
	}
    ?>