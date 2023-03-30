<!DOCTYPE html>
<html>

<head>
	<title>Activity Log</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<link href="css/styles.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
	<main>
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card shadow-lg bg-info text-white border-0 rounded-lg mt-5">
					<div class="card-header">
						<h3 class="text-center font-weight-light text-info my-4">Activity Log</h3>
					</div>
					<div class="card-body">

						<?php
						require_once "navbar.php";
						require_once "config.php";

						// Get activity log data
						$query = "SELECT * FROM activity_log WHERE timestamp >= DATE_SUB(NOW(), INTERVAL 1 DAY) AND uid = " . $_SESSION["id"] . " ORDER BY timestamp desc";
						$result = mysqli_query($link, $query);

						// Display data in table
						if (mysqli_num_rows($result) > 0) {
							echo "<table>";
							echo "<tr><th>Date_Time</th><th>Action</th><th>Function</th><th>Additional Info</th></tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr><td>" . $row["timestamp"] . "</td><td>" . $row["action"] . "</td><td>" . $row["fun"] . "</td><td>" . $row["additional_info"] . "</td></tr>";
							}
							echo "</table>";

						} else {
							echo "No activity found.";
						}

						// Close database connection
						mysqli_close($link);
						?>

						<br><br>
						<button onclick="goBack()">Back</button>

						<script>
							function goBack() {
								window.history.back();
							}
						</script>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>

</html>