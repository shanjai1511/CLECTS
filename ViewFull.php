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
				<?php
					$conn = mysqli_connect("localhost", "root", "root", "experiment");
					if (!$conn) die("Connection failed: " . mysqli_connect_error());
					if (isset($_GET['experimentId'])) {
					    $experimentId = $_GET['experimentId'];
					    $sql = "SELECT * FROM experiments WHERE experimentId = " . $experimentId;
					    $result = mysqli_query($conn, $sql);
					    if (mysqli_num_rows($result) > 0) {
					        $row = mysqli_fetch_assoc($result);
					        echo '<h2 style="margin-left:200px;margin-top:25px;">' . $row['experimentName'] . '</h2>';
					        echo '<p><b>Aim:</b> ' . $row['aim'] . '</p>';
					        echo '<p><b>Required Apparatus:</b> ' . $row['requiredApparatuss'] . '</p>';
					        $sql = "SELECT * FROM experiment_steps WHERE exptId = " . $experimentId . " ORDER BY stepNo";
					        $result = mysqli_query($conn, $sql);
					        if (mysqli_num_rows($result) > 0) {
					            echo '<h3>Experiment Steps</h3>';
					            echo '<ol>';
					            while ($stepRow = mysqli_fetch_assoc($result))  echo '<li>' . $stepRow['description'] . '</li>';
					            echo '</ol>';
					        } else  echo '<p>No steps found for this experiment.</p>';
					    } else  echo '<p>Experiment not found.</p>';
					} else echo '<p>No experiment selected.</p>';
					mysqli_close($conn);
					?>
			</div>
		</div>
	</body>
</html>