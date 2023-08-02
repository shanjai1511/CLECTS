<?php
    // Replace localhost, root, root, and experiment with your actual database credentials
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "experiment";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the number of steps and experimentId from the form
        $noOfSteps = $_POST['noOfSteps'];
        $experimentId = $_POST['experimentId'];

        // Create a new MySQLi instance
        $mysqli = new mysqli($host, $username, $password, $dbname);

        // Check connection
        if ($mysqli->connect_errno) {
            die("Failed to connect to MySQL: " . $mysqli->connect_error);
        }

        // Prepare the SQL statement to insert steps
        $sql = "INSERT INTO experiment_steps (exptId, stepNo, description) VALUES (?, ?, ?)";

        // Prepare the statement
        $stmt = $mysqli->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("iis", $experimentId, $stepNumber, $stepDescription);

        // Loop through each step and insert into the database
        for ($i = 1; $i <= $noOfSteps; $i++) {
            $stepNumber = $i;
            $stepDescription = $_POST['step' . $i];
            $stmt->execute();
        }

        // Close the statement and connection
        $stmt->close();
        $mysqli->close();

        echo "Steps added successfully.";
    }
?>
