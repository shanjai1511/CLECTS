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
                background-color: #5D54A4;
                color: #fff;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                border-radius: 4px;
                cursor: pointer;
            }

            button[type="submit"]:hover {
                background-color: #5D54A2;
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
                
                <!-- Generated PHP code -->
                <?php
                    // Replace localhost, root, root, and experiment with your actual database credentials
                    $host = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "experiment";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve form data
                        $experimentName = $_POST['experimentName'];
                        $noOfSteps = $_POST['noOfSteps'];
                        $aim = $_POST['aim'];
                        $requiredApparatuss = $_POST['requiredApparatuss'];

                        // Create a new MySQLi instance
                        $mysqli = new mysqli($host, $username, $password, $dbname);

                        // Check connection
                        if ($mysqli->connect_errno) {
                            die("Failed to connect to MySQL: " . $mysqli->connect_error);
                        }

                        // Get the maximum experimentId from the table
                        $sql = "SELECT MAX(experimentId) AS maxId FROM experiments";
                        $result = $mysqli->query($sql);
                        $row = $result->fetch_assoc();
                        $maxId = $row['maxId'];

                        // Increment the maximum experimentId by one
                        $experimentId = $maxId + 1;

                        // Prepare the SQL statement
                        $sql = "INSERT INTO experiments (experimentId, experimentName, noOfSteps, aim, requiredApparatuss) VALUES (?, ?, ?, ?, ?)";

                        // Prepare the statement
                        $stmt = $mysqli->prepare($sql);

                        // Bind the parameters
                        $stmt->bind_param("issis", $experimentId, $experimentName, $noOfSteps, $aim, $requiredApparatuss);

                        // Execute the statement
                        if ($stmt->execute()) {
                            echo "Experiment added successfully.";
                        } else {
                            echo "Error adding experiment: " . $stmt->error;
                        }

                        // Close the statement and connection
                        $stmt->close();
                        $mysqli->close();
                    }
                ?>

                <!-- Add Experiment Form -->
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group"><br><br>
                        <label for="experimentName">Experiment Name:</label>
                        <input type="text" name="experimentName" id="experimentName" required>
                    </div>
                    <div class="form-group">
                        <label for="noOfSteps">Number of Steps:</label>
                        <input type="number" name="noOfSteps" id="noOfSteps" required>
                    </div>
                    <div class="form-group">
                        <label for="aim">Aim:</label>
                        <input type="text" name="aim" id="aim" required></input>
                    </div>
                    <div class="form-group">
                        <label for="requiredApparatuss">Required Apparatus:</label>
                        <textarea name="requiredApparatuss" id="requiredApparatuss" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add Experiment</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>