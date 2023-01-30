<?php
	$db = new mysqli("localhost", "root", "", "lotti", "3306");

	if ($db->connect_error)
		die("Internal error.");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>People</title>
	</head>
	<body>
		<form action="./" method="post">
			<label>
				Name:
				<input name="name">
			</label>
			<label>
				Birth:
				<input type="date" name="birth">
			</label>
			<button>Submit</button>
		</form>

		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
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
							$row["name"] .
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
