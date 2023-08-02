<!DOCTYPE html>
<html>
<head>
    <title>Experiments</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background: linear-gradient(lightgreen, lightblue);
            color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        h3 {
            margin-top: 0;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "root", "experiment");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve experiments from the database
$sql = "SELECT * FROM experiments";
$result = mysqli_query($conn, $sql);

// Check if any experiments exist
if (mysqli_num_rows($result) > 0) {
    echo "<ul>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<h3 onclick=\"location.href='experiment_steps.php?experimentId=".$row['experimentId']."'\">".$row['experimentName']."</h3>";
        echo "<p>".$row['aim']."</p>";
        echo "</li>";
    }
    
    echo "</ul>";
} else {
    echo '<p>No experiments found.</p>';
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
