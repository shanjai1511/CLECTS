
<!DOCTYPE html>
<html>
	<head>
		<title>SIET Chem Lab</title>
		<link rel="icon" type="image/x-icon" href="logo.png">
		<style>
  @import url('https://fonts.googleapis.com/css2?family=Calibri:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap');
  body {
    background-color: #212121;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
  }

  .top-heading {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
	font-size:20px;
	text-align:left;
    background-color: #1A1A1A;
    padding: 1rem;
    display: flex;
	color:#fff;
    justify-content: center;
    align-items: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    z-index: 1000;
  }

  .top-heading .logo {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-right: 10px;
  }

  .card {
    position: relative;
    display: flex;
    flex-direction: column;
    background-color: #3E3E3E;
    border-radius: 8px;
    margin: 1.5rem auto;
    width: 90%;
    max-width: 1200px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .card-body {
    padding: 2rem;
    position: relative;
    overflow: hidden;
  }

  .card-body::before {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: radial-gradient(circle at 50% 0, rgba(0, 0, 0, 0.2), transparent), radial-gradient(circle at 50% 100%, rgba(0, 0, 0, 0.2), transparent);
    background-size: 1500% 1500%;
    animation: Rotate 12s linear infinite;
    transform-origin: center;
  }

  .card-body h4 {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .card-body ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .card-body ul li {
    width: calc(33.333% - 20px);
    margin-bottom: 1rem;
    background-color: #4A4A4A;
    border-radius: 6px;
    overflow: hidden;
    transition: transform 0.3s;
  }
  .card-body ul li a {
    display: flex;
    align-items: center;
    padding: 1rem;
    text-decoration: none;
    color: #fff;
  }

		</style>
	</head>
	<body>
		<div class="mt-100 mb-100">
			<h1 class="top-heading">
				<img src="logo.png" alt="Logo" class="logo">
				SRI SHAKTHI INSTITUTE OF ENGINEERING AND TECHNOLOGY CHEMISTRY LABORATORY
			</h1>
			<br><br><br><br><br>
			
					
			<div class="card">
				<br>
			<a href="http://localhost/chemlab/studentsafety.html" style="color:white;margin-left:  50px;float:right">Safety Protocol</a>
     	<div class="card-body">
					<ul class="list-style-none">
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
							    while ($row = mysqli_fetch_assoc($result)) {
							        echo '<li><a href="experiment_steps.php?experimentId='.$row['experimentId'].'&experimentHeading='.$row['experimentName'].'"><span class="experiment-info"><span class="experiment-name">' . $row['experimentName'] . '</span> - <span class="experiment-aim">' . $row['aim'] . '</span></span></a></li>';
								}
							} else {
							    echo '<li>No experiments found.</li>';
							}
							
							// Close the database connection
							mysqli_close($conn);
							?>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>