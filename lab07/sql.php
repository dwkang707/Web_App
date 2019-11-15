<!DOCTYPE html>
<html>
<head>
	<title>sql</title>
</head>
<body>
	<?php
		$db_name = $_POST["name"];
		$query = $_POST["query"];
		$db = new PDO("mysql:dbname=$db_name;host=localhost", "root", "root");
		$rows = $db->query($query);
		foreach ($rows as $row) {
	?>
	<ul>
		<li><?= print_r($row) ?></li>
	</ul>
	<?php
		}
	?>
</body>
</html>