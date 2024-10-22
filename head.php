<?php
		session_start();
		if($_SESSION['login'] == '')
			header("Location: login.php");
?>
<Html>
	<head>
		<meta charset="utf-8">
		<title>Хаб</title>
	</head>
	<body>
		<div>
				<?php
					if($_SESSION['degree'] == 0)
					{
						echo '<div class="header-text"><p><a href="redact-form.php">Редактирование информационной базы</a></p></div>' ;
					}
					echo $_SESSION['login'];
				?>
				<p> <?php echo $_SESSION['degree'] ?> </p>
				<a href="exit.php">Выход</a>
		</div>
		<div>
				<p>----------------------------------------------------------</p>
		</div>
		<div>
			<p>Список товаров:</p>
			<table>
				<?php
				$link = mysqli_connect("localhost","root","","test_database");
				$result = mysqli_query($link,'SELECT * FROM Product');
				echo '<tr><p><th>Название |</th><th>Описание |</th><th>Цена |</th><th>Категория |</th></p></tr>';
					while($row = mysqli_fetch_array($result))
					{
						echo'<tr><td>'.$row['name'].'</td> <td>'.$row['description'].'</td> <td>'.$row['price'].'</td> <td>'.$row['category'].'</td></p></tr>';
					}
				?>
			</table>
		</div>
	</body>
</Html>