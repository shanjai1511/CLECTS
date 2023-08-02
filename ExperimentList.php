<!DOCTYPE html>
<html>
<head>
    <title>SIET Chem Lab</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <style>
        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            background-color: #D32F2F;
            font-family: 'Calibri', sans-serif !important;
        }

        .mt-100 {
            margin-top: 100px;
        }

        .mb-100 {
        }

        .card {
            margin-left:15px;
            margin-right:15px;
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid transparent;
            border-radius: 0px;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .card .card-title {
            position: relative;
            font-weight: 600;
            margin-bottom: 10px;
            display: inline-block;
        }

        .card .experiment-aim {
            color: #777;
        }

        ul.list-style-none {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul.list-style-none li {
            display: table-row;
        }

        ul.list-style-none li a {
            color: #673AB7;
            padding: 8px 0px;
            display: table-cell;
            text-decoration: none;
            vertical-align: middle;
        }

        .top-heading {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            margin-right: 10px;
            width: 40px;
            height: 40px;
        }

        .experiment-info {
            display: flex;
            align-items: center;
        }

        .experiment-name {
            margin-right: 10px;
        }

        .experiment-aim {
            color: #777;
        }

        /* Responsive Styling */
        @media only screen and (max-width: 600px) {
            .top-heading {
                font-size: 20px;
                margin-bottom: 10px;
            }

            .logo {
                width: 30px;
                height: 30px;
            }

            ul.list-style-none li a {
                padding: 5px 0px;
            }

            .card-body {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="mt-100 mb-100">
        <h1 class="top-heading">
            <img src="logo.png" alt="Logo" class="logo">
            SRI SHAKTHI INSTITUTE OF ENGINEERING AND TECHNOLOGY CHEMISTRY LABORATORY
        </h1>
        <div class="card">
            <div class="card-body">
                <a href="http://localhost/labequipment/studentsafety.html" style="float:right">Safety Protocol</a>
                <br>
                <h4 class="card-title">Experiments</h4>
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
                            echo '<li><a href="experiment_steps.php?experimentId=' . $row['experimentId'] . '"><div class="experiment-info"><span class="experiment-name">' . $row['experimentName'] . '</span> - <span class="experiment-aim">' . $row['aim'] . '</span></div></a></li>';
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
