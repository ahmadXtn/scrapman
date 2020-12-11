<?php
session_start();


?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

<form id="urlForm" action="lib/interceptor.php" method="post">
	<label for="url">Base Url</label>
	<input type="url" id="url" name="url">
	<input type="submit" id="send" name="send">
</form>
</body>
</html>
