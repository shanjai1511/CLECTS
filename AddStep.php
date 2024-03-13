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
			select,
			input[type="text"],
			input[type="number"],
			textarea {
			width: 100%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			}
			textarea {
			height: 100px;
			}
			button[type="submit"] {
			background-color: grey;
			color: #fff;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			border-radius: 4px;
			cursor: pointer;
			}
			button[type="submit"]:hover {
			background-color: black;
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
	padding-top:50px;
	padding-right: 50px;
	padding-bottom:50px;
}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="sidebar">
				<h2>&nbsp</h2>
				<ul>
					<li><a href="http://localhost/chemlab/AdminIndex.php">View Experiment</a></li>
					<li><a href="http://localhost/chemlab/AddExperiment.php">Add Experiment</a></li>
                    <li class="active"><a href="http://localhost/chemlab/AddStep.php">Add Step</a></li>
					<li><a href="http://localhost/chemlab/deleteexperiment.php">Delete Experiment</a></li>
					<li><a href="http://localhost/chemlab/teachersafety.html">Safety Protocols</a></li>
				</ul>
			</div>
			<div class="content">
				<div class="header">
					<img src="logo.png" alt="Logo" class="logo">
					<h1>Sri Shakthi Institute of Engineering and Technology Chemistry Laboratory</h1>
				</div><div class="details">
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
			</div></div>
		</div>
	</body>
</html>