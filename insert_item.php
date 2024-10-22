<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$link = mysqli_connect("localhost","root","","test_database");
	$name = $_POST['create-name'];
	$description = $_POST['create-description'];
	$price = $_POST['create-price'];
	$category = $_POST['create-category'];
	
	if (empty($name) or empty($description) or empty($price) or empty($category))
	{
		echo'
			<script>
				alert("Не все поля заполнены");
				window.location.href = "redact-form.php";
			</script>
		';
	}
	else if ($name == $myrow_name)
	{
		echo'
			<script>
				alert("Товар уже существует");
				window.location.href = "redact-form.php";
			</script>
		';
	}
	else
	{
		mysqli_query ($link,"INSERT INTO Product VALUES (Null,'$name','$description','$price','$category')");
		header("Location: redact-form.php");
	}
?>