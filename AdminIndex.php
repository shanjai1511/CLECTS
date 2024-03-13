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
            <div class="experiment-container">
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
                            $experimentName = $row['experimentName'];
                            $experimentId = $row['experimentId'];
                            $aim = $row['aim'];
                            // Display experiment name and aim in a card format
                            echo '<div class="experiment">';
                            echo '<a href="ViewFull.php?experimentId=' . $experimentId . '"><div class="experiment-content">';
                            echo '<h3>' . $experimentName . '</h3>';
                            echo '<p>' . $aim . '</p>';
                            echo '</a></div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No experiments found.</p>';
                    }
                    
                    // Close the MySQL connection
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</body>
</html>