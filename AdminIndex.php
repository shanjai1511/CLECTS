<!DOCTYPE html>
<html>
	<head>
		<title>SIET Chem Lab</title>
		<link rel="icon" type="image/x-icon" href="logo.png">
		<style>
			@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);
			body {
			margin: 0;
			padding: 0;
			font-family: 'Calibri', sans-serif;
			text-decoration: none;
			overflow: hidden;
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
					<li><a href="http://localhost/labequipment/AdminIndex.php">View Experiment</a></li>
					<li><a href="http://localhost/labequipment/AddExperiment.php">Add Experiment</a></li>
					<li><a href="http://localhost/labequipment/deleteexperiment.php">Delete Experiment</a></li>
					<li><a href="http://localhost/labequipment/teachersafety.html">Safety Protocols</a></li>
				</ul>
			</div>
			<div class="content">
				<div class="header">
					<img src="logo.png" alt="Logo" class="logo">
					<h1>Sri Shakthi Institute of Engineering and Technology Chemistry Laboratory</h1>
				</div>
				<h2>List of Experiments</h2>
				<ul class="experiment-list">
					<?php
						// Connect to MySQL
						$conn = mysqli_connect("localhost", "root", "root", "experiment");
						
						// Check connection
						if (!$conn) die("Connection failed: " . mysqli_connect_error());
						
						// Retrieve experiments from the database
						$sql = "SELECT experimentId, experimentName, aim FROM experiments";
						$result = mysqli_query($conn, $sql);
						
						// Check if any experiments exist
						if (mysqli_num_rows($result) > 0) {
						    while ($row = mysqli_fetch_assoc($result)) {
						        $experimentId = $row['experimentId'];
						        $experimentName = $row['experimentName'];
						        $aim = $row['aim'];
						        // Display experiment name and aim with a link to the experiment details page
						        echo '<li><a href="ViewFull.php?experimentId=' . $experimentId . '"><span>' . $experimentName . '</span></a>';
						        echo ' - <span class="aim">' . $aim . '</span></li>';
						    }
						} else echo '<li>No experiments found.</li>';
						
						// Close the MySQL connection
						mysqli_close($conn);
						?>
				</ul>
			</div>
		</div>
	</body>
</html>