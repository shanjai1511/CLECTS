<!DOCTYPE html>
<html>
	<head>
		<title>SIET Chem Lab</title>
		<link rel="icon" type="image/x-icon" href="logo.png">
		<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            background-color: #333;
            color: #fff;
            width: 200px;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 24px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 10px 0;
            margin-left:0px;
        }

        .sidebar li {
            margin-bottom: 10px;
            padding-bottom: 15px;
            padding-top: 15px;
            padding-left: 15px;
            background-color: ;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar li:hover{
            margin-bottom: 10px;
            padding-bottom: 15px;
            padding-top: 15px;
            padding-left: 15px;
            background-color: grey;
            text-decoration: underline;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .content {
            flex: 1;
            padding: 20px;
            margin-left: 200px; /* Adjust based on sidebar width */
            background-color: #f2f2f2; /* Changed content background color */
            overflow-y: auto;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin-left:50px;
            margin-top:20px;
            display: flex;
            align-items: center;
            position: fixed;
            top: 0;
            left: 200px; /* Adjust based on sidebar width */
            right: 0;
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

        .experiment-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 80px; /* Adjust based on header height */
            margin-left: 20px;
            padding: 20px;
        }

        .experiment {
            flex-basis: calc(33.33% - 20px); /* Adjust width as per your preference */
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .experiment:hover {
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .experiment-content {
            padding: 20px;
        }

        .experiment h3 {
            margin-top: 0;
        }

        .experiment p {
            margin: 0;
        }
        .experiment a{
            text-decoration:none;
            color: black;
        }

        .active{
	margin-bottom: 10px;
  padding-bottom: 15px;
  padding-top: 15px;
  padding-left: 15px;
  background-color: grey;
  text-decoration: none;
}
.details{
	border-width:1px;
	/* border-style:solid; */
	margin-left:60px;
	margin-right: 30px;
	margin-top: 130px;
	background-color:white;
	padding-left:30px;
	border-radius: 15px;
	padding-top:20px;
	padding-bottom:50px;
}
		</style>
	</head>
	<body>
    <div class="container">
        <div class="sidebar">
            <h2>&nbsp</h2>
            <ul>
                <li class="active"><a href="http://localhost/chemlab/AdminIndex.php">View Experiment</a></li>
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
			<div class="details">
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
		</div>
	</body>
</html>