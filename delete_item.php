<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$link = mysqli_connect("localhost","root","","test_database");
	$name = $_POST['name-delete'];
	if (empty($name))
	{
		echo'
			<script>
				alert("Не все поля заполнены");
				window.location.href = "redact-form.php";
			</script>
		';
	}
	else
	{
		mysqli_query ($link,"DELETE FROM Product WHERE name= '$name'");
			header("Location: redact-form.php");
	}

?>