<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$link = mysqli_connect("localhost","root","","test_database");
	$old_name = $_POST['old-name'];
	$name = $_POST['new-name'];
	$description = $_POST['new-description'];
	$price = $_POST['new-price'];
	$category = $_POST['new-category'];
    mysqli_query ($link,"UPDATE Product SET name = '$name',description = '$description', price = '$price' , category = '$category' WHERE name= '$old_name'");
		header("Location: redact-form.php");
?>