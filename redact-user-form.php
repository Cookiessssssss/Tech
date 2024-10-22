<?php
		session_start();
		if($_SESSION['login'] == '')
			header("Location: login.php");
?>
<Html>
	<head>
		<meta charset="utf-8">
		<title>Редактирование БД</title>
	</head>
	<body>
		<div>
			<div>
				<div><p><a href="redact-form.php">Редактирование базы данных</a></p></div>
				<div><p><a href="head.php">Вернуться в хаб</a></p></div>
				<div><p><a href="exit.php">Выход</a></p></div>
			</div>
		</div>
		<div>
				<p>----------------------------------------------------------</p>
		</div>
		<div>
			<form method="POST" action="insert_user.php">
				<div>
					<p>Создание пользователя: </p>
					<div><label>Логин: </label><input type="text" name="new-login"></div><br>
					<div><label>Пароль: </label><input type="text" name="new-password"></div><br>
					<div><label>Уровень доступа: </label>
						<select name="new-degree">
							<option value="1">Пользователь</option>
							<option value="0">Администратор</option>
						</select>
					</div><br>
					<div><button type="submit" name="submit">Отправить</button></div>
				</div>
			</form>
		</div>
		<div>
			<div>
				<p>----------------------------------------------------------</p>
			</div>
		</div>
		<form method="POST" action="redact_user.php">
			<div>
				<p>Редактирование пользователя: </p>
				<div><label>Логин: </label><input type="text" name="old-login-redact"></div><br>
				<p>В нижних полях введите новые данные</p><br>
				<div><label>Логин: </label><input type="text" name="login"></div><br>
				<div><label>Пароль: </label><input type="text" name="password"></div><br>
				<div><label>Уровень доступа: </label>
					<select name="degree">
						<option value="1">Пользователь</option>
						<option value="0">Администратор</option>
					</select>
				</div><br>
				<div><button type="submit" name="submit">Отправить</button></div>
			</div>
		</form>
		<div>
			<div>
				<p>----------------------------------------------------------</p>
			</div>
		</div>
		<form method="POST" action="delete_user.php">
			<div>
				<p>Удаление пользователя: </p>
				<div><label>Логин: </label><input type="text" name="login-delete"></div><br>
				<div><button type="submit" name="submit">Отправить</button></div>
			</div>
		</form>
		<div>
			<div>
				<p>----------------------------------------------------------</p>
			</div>
		</div>
		<div>
			<p>Список пользователей:</p>
			<table>
				<?php
				$link = mysqli_connect("localhost","root","","test_database");
				$result = mysqli_query($link,'SELECT * FROM users');
				$md5_password = '';
				echo '<tr><p><th>Логин |</th><th>Пароль |</th><th>Уровень доступа |</th></p></tr>';
					while($row = mysqli_fetch_array($result))
					{
						$md5_password = MD5($row['password']);
						if($row['degree'] == 0)
						{
							echo '<tr><td>'.$row['login'].'</td> <td> | '.$md5_password.' | </td> <td> Администратор </td></p></tr>';
						}
						else
						{
							echo '<tr><td>'.$row['login'].'</td> <td> | '.$md5_password.' | </td> <td> Пользователь </td></p></tr>';
						}
						
					}
				?>
			</table>
		</div>
	</body>
</Html>