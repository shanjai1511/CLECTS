<!DOCTYPE html>
<html>
	<head>
		<title>SIET Chem Lab</title>
		<link rel="icon" type="image/x-icon" href="logo.png">
		<style>
			body {
			margin: 0;
			padding: 0;
			font-family: 'calibri';
			}
			.container {
			display: flex;
			flex-direction: row;
			min-height: 100vh;
			}
			.sidebar {
			background-color: #5D54A4;
			color: #fff;
			width: 200px;
			padding: 20px;
			margin-bottom: 0px;
			}
			.sidebar h2 {
			margin-top: 0;
			font-size: 24px;
			}
			.sidebar ul {
			list-style: none;
			padding: 0;
			margin: 20px 0;
			}
			.sidebar li {
			margin-bottom: 10px;
			}
			.sidebar a {
			color: #fff;
			text-decoration: none;
			}
			.sidebar a:hover {
			text-decoration: underline;
			}
			.content {
			flex: 1;
			padding: 20px;
			}
			.header {
			background-color: #5D54A4;
			color: #fff;
			padding: 20px;
			display: flex;
			align-items: center;
			}
			.header h1 {
			margin: 0;
			font-size: 24px;
			}
			.form-group {
			margin-bottom: 20px;
			}
			label {
			display: block;
			font-weight: bold;
			margin-bottom: 5px;
			}
			input[type="text"],
			input[type="number"],
			textarea,
			select {
			width: 100%;
			padding: 8px;
			border: 2px solid #ccd;
			border-radius: 4px;
			box-sizing: border-box;
			height:40px;
			}
			textarea {
			height: 70px;
			}
			button[type="submit"] {
			background-color: #5D54A4;
			color: #fff;
			border: none;
			width:200px;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 4px;
			cursor: pointer;
			margin-left: 300px
			}
			button[type="submit"]:hover {
			background-color: blue;
			}
			.logo {
			width: 40px;
			height: 40px;
			margin-right: 10px;
			}
			.experiment-list {
			list-style: none;
			padding: 0;
			margin-top: 20px;
			}
			.experiment-list li {
			margin-bottom: 10px;
			color: #555;
			cursor: pointer;
			}
			.experiment-list li span {
			font-weight: bold;
			}
			.experiment-list li .aim {
			color: #777;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="sidebar">
				<h2>Navigation</h2>
				<ul>
					<li><a href="http://localhost/chemlab/AdminIndex.php">View Experiment</a></li>
					<li><a href="http://localhost/chemlab/AddExperiment.php">Add Experiment</a></li>
                    <li><a href="http://localhost/chemlab/AddStep.php">Add Step</a></li>
					<li><a href="http://localhost/chemlab/deleteexperiment.php">Delete Experiment</a></li>
					<li><a href="http://localhost/chemlab/teachersafety.html">Safety Protocols</a></li>
				</ul>
			</div>
			<div class="content">
				<div class="header">
					<img src="logo.png" alt="Logo" class="logo">
					<h1>Sri Shakthi Institute of Engineering and Technology Chemistry Laboratory</h1>
				</div>
				<h2>Add Experiment Step</h2>
				
				<?php
					// Database connection
					$servername = "localhost";
					$username = "root";
					$password = "root";
					$dbname = "experiment";

					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					// Retrieve experiment options for dropdown
					$experimentQuery = "SELECT experimentId, experimentName FROM experiments";
					$experimentResult = $conn->query($experimentQuery);
				?>

				<form action="rough1.php" method="POST">
					<label for="experiment">Select Experiment:</label>
					<select name="experiment" id="experiment">
						<option>-Select one-</option>
						<?php
							while ($row = $experimentResult->fetch_assoc()) {
								echo '<option value="' . $row["experimentId"] . '">' . $row["experimentName"] . '</option>';
							}
						?>
					</select><br><br>

					<label for="description">Description:</label>
					<textarea name="description" id="description" rows="4" cols="50"></textarea><br><br>

					<label for="stepNo">Step Number:</label>
					<input type="number" name="stepNo" id="stepNo" required><br><br>

					<label for="video">Video URL:</label>
					<input type="text" name="video" id="video"><br><br>

					<button type="submit" value="Add Step">Submit</button>
				</form>

				<?php
					// Insert data into experiment_steps table
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$exptId = $_POST["experiment"];
						$description = $_POST["description"];
						$stepNo = $_POST["stepNo"];
						$video = $_POST["video"];

						$insertQuery = "INSERT INTO experiment_steps (exptId, description, stepNo, video) VALUES ('$exptId', '$description', '$stepNo', '$video')";
						if ($conn->query($insertQuery) === TRUE) {
							echo "Step added successfully.";
						} else {
							echo "Error: " . $insertQuery . "<br>" . $conn->error;
						}
					}

					$conn->close();
				?>
			</div>
		</div>
	</body>
</html>