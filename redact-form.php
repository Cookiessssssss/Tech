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
				<div><p><a href="redact-user-form.php">Редактирование пользователей</a></p></div>
				<div><p><a href="head.php">Вернуться на главный сайт</a></p></div>
				<div><p><a href="exit.php">Выход</a></p></div>
			</div>
		</div>
		<div>
			<p>----------------------------------------------------------</p>
		</div>
		<form method="POST" action="insert_item.php">
			<div>
				<p>Запись товара:</p>
				<div><label>Название товара: </label><input type="text" name="create-name"></div><br>
				<div><label>Описание товара: </label><input type="text" name="create-description"></div><br>
				<div><label>Цена: </label><input type="text" name="create-price"></div><br>
				<div><label>Категория товара: </label><input type="text" name="create-category"></div><br>
				<div><button type="submit" name="submit">Отправить</button></div>
			</div>
		</form>
		<div>
			<p>----------------------------------------------------------</p>
		</div>
		<form method="POST" action="redact_item.php">
			<div>
				<p>Редактирование товара:</p>
				<div><label>Название товара: </label><input type="text" name="old-name"></div><br>
				<p>В нижних полях введите новые данные:</p><br>
				<div><label>Название товара: </label><input type="text" name="new-name"></div><br>
				<div><label>Описание товара: </label><input type="text" name="new-description"></div><br>
				<div><label>Цена: </label><input type="text" name="new-price"></div><br>
				<div><label>Категория товара: </label><input type="text" name="new-category"></div><br>
				<div><button type="submit" name="submit">Отправить</button></div>
			</div>
		</form>
		<div>
			<p>----------------------------------------------------------</p>
		</div>
		<form method="POST" action="delete_item.php">
			<div>
				<p>Удаление товара:</p>
				<div><label>Название товара: </label><input type="text" name="name-delete"></div><br>
				<div><button type="submit" name="submit">Отправить</button></div>
			</div>
		</form>
		<div>
			<p>Список товаров:</p>
			<table>
					<?php
					$link = mysqli_connect("localhost","root","","test_database");
					$result = mysqli_query($link,'SELECT name, description, price, category FROM Product');
					echo '<tr><p><th>Название |</th><th>Описание |</th><th>Цена |</th><th>Категория |</th></p></tr>';
						while($row = mysqli_fetch_array($result))
						{
							echo '<tr><td>'.$row['name'].'</td> <td>'.$row['description'].'</td> <td>'.$row['price'].'</td> <td>'.$row['category'].'</td></p></tr>';
						}
					?>
			</table>
		</div>
	</body>
</Html>