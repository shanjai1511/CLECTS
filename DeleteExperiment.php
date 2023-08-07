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
			/* CSS for dropdown box */
			select {
			width: 30%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			font-family: 'Calibri', sans-serif;
			font-size: 14px;
			}
			/* CSS for button */
			input[type="submit"] {
			background-color: #5D54A4;
			color: #fff;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 4px;
			cursor: pointer;
			font-family: 'Calibri', sans-serif;
			}
			input[type="submit"]:hover {
			background-color: #5D54A2;
			}
		</style>
		<script>
			function confirmDeletion() {
			    var experimentName = document.getElementById("experiment").options[document.getElementById("experiment").selectedIndex].text;
			    return confirm("Are you sure you want to delete the experiment: " + experimentName + " and its associated steps?");
			}
		</script>
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
				<div>
					<h1>Experiment Removal</h1>
					<?php
						// Database connection
						$host = 'localhost';
						$dbname = 'experiment';
						$user = 'root';
						$password = 'root';
						
						try {
						    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
						
						    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
						        // Get the selected experimentId from the form
						        $selectedExperimentId = $_POST['experiment'];
						
						        // Delete records from experiment_steps table
						        $stmt = $dbh->prepare("DELETE FROM experiment_steps WHERE exptId = ?");
						        $stmt->execute([$selectedExperimentId]);
						
						        // Delete record from experiments table
						        $stmt = $dbh->prepare("DELETE FROM experiments WHERE experimentId = ?");
						        $stmt->execute([$selectedExperimentId]);
						
						        echo "Experiment and associated steps have been removed successfully.";
						
						        exit();
						    }
						
						    // Fetch experiment names from the database
						    $stmt = $dbh->query("SELECT experimentId, experimentName FROM experiments");
						    $experiments = $stmt->fetchAll(PDO::FETCH_ASSOC);
						} catch (PDOException $e) {
						    die("Error: " . $e->getMessage());
						}
						?>
					<?php if (empty($experiments)): ?>
					<p>No experiments to delete.</p>
					<?php else: ?>
					<form method="POST" action="" onsubmit="return confirmDeletion();">
						<label for="experiment">Select an experiment to remove:</label>
						<select name="experiment" id="experiment">
							<?php foreach ($experiments as $experiment): ?>
							<option value="<?php echo $experiment['experimentId']; ?>">
								<?php echo $experiment['experimentName']; ?>
							</option>
							<?php endforeach; ?>
						</select>
						<br><br>
						<input type="submit" value="Remove Experiment">
					</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</body>
</html>