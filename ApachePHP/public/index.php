<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
	$db = new mysqli("db", "root", "", "db", 3306);

	if ($db->connect_error)
		die("Internal error.");

	if (isset($_POST["fullname"]) && isset($_POST["birth"]))
	{
		$stmt = $db->prepare("INSERT INTO people (fullname, birth) VALUES (?, ?)");

		if (!$stmt->bind_param("ss", $_POST["fullname"], $_POST["birth"]) || !$stmt->execute())
			die("Internal error.");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="./index.css">
		<title>People</title>
	</head>
	<body>
		<h1>People</h1>
		<hr>
		<form action="./" method="post">
			<div class="control">
				<label>
					Fullname:
					<input name="fullname">
				</label>
			</div>
			<div class="control">
				<label>
					Birth:
					<input type="date" name="birth">
				</label>
			</div>
			<button>Submit</button>
		</form>
		<hr>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Fullname</th>
					<th>Birth</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$result = $db->query("SELECT * FROM people");

					while($row = $result->fetch_assoc())
					{
						echo
							"<tr><td>" .
							$row["id"] .
							"</td><td>" .
							$row["fullname"] .
							"</td><td>" .
							$row["birth"] .
							"</td></tr>";
					}

					$db->close();
				?>
			</tbody>
		</table>
	</body>
</html>
