<!DOCTYPE html>
<html>
<head>
  <title>SIET Chem Lab</title>
  <link rel="icon" type="image/x-icon" href="logo.png">
  <style>
    *{
      cursor: default;
    }
    body {
      background-color: #D32F2F;
      font-family: 'Calibri', sans-serif !important;
      margin: 0;
      padding: 20px;
    }
    #component {
      padding-top: 100px;
      margin-right: 5px;
      margin-left: 5px;
      background-color:white;
      padding-bottom: 100px;
    }

    #stepContainer {
      max-width: 600px;
      margin: 0 auto;
      background-color:white;
    }

    .card {
        /* background of steps */
      background-color:#D32F2F;/* linear-gradient(lightgreen,lightblue/*#9E6F21,#9E6F21);*/
      color: #fff;
      padding: 20px;
      margin-bottom: 10px;
      transition: opacity 0.3s ease-in-out;
      opacity: 0;
    }

    .card-visible {
      opacity: 1;
    }

    #buttonContainer {
      text-align: right;
      margin-top: 20px;
    }

    #previousButton,
    #nextButton,
    #playButton {
      padding: 10px 20px;
      font-size: 16px;
      /* play and next button */
      background-color: #D32F2F;
      color: #fff;
      border: none;
      cursor: pointer;
      display: inline-block;
      margin-left: 10px;
    }

    #voiceSelectorContainer {
      margin-top: 10px;
      text-align: center;
    }

    #voiceSelector {
      padding: 5px;
      font-size: 14px;
    }

    #navigation {
      text-align: left;
      margin-top: 20px;
    }

    #navigation a {
      padding: 5px 10px;
      color: #fff;
      text-decoration: none;
      margin-right: 5px;
      transition: background-color 0.3s ease-in-out;
    }

    #navigation a.current {
      background-color:#D32F2F;
    }
    #buttonContainer {
  text-align: center;
  margin-top: 20px;
}

#navigation {
  text-align: left;
  margin-top: 20px;
  overflow-x: auto;
  white-space: nowrap;
}
.top-heading {
    font-size: 24px;
    font-weight: bold;
    color: #fff;
    margin-top:80px;
    text-align: center;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}
#navigation a {
  display: inline-block;
  padding: 5px 10px;
  background-color: #D32F2F;
  color: #fff;
  text-decoration: none;
  margin-right: 5px;
  transition: background-color 0.3s ease-in-out;
}

#navigation a.current {
    /* active navigation button */
  background-color: white;
  color:#D32F2F;
  border:#D32F2F 3px solid;
}

.logo {
    margin-right: 10px;
    width: 40px;
    height: 40px;
}

  </style>
</head>
<body>


<h1 class="top-heading">
            <img src="logo.png" alt="Logo" class="logo">
            SRI SHAKTHI INSTITUTE OF ENGINEERING AND TECHNOLOGY CHEMISTRY LABORATORY
        </h1>

<?php
    // Connect to MySQL
    $conn = mysqli_connect("localhost", "root", "root", "experiment");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve procedure steps from the database
    if (isset($_GET['experimentId'])) {
        $experimentId = $_GET['experimentId'];
        $sql = "SELECT * FROM experiment_steps WHERE exptId = $experimentId";
        $result = mysqli_query($conn, $sql);

        // Check if any steps exist
        if (mysqli_num_rows($result) > 0) {
            $currentStep = 0;
            $totalSteps = mysqli_num_rows($result);

            // Fetch all steps
            $steps = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($steps, $row['description']);
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            echo '<p>No steps found for this experiment.</p>';
        }
    } else {
        echo '<p>No experiment ID provided.</p>';
    }
?>
<div id="component">
    <div id="stepContainer">
        <div id="cardContainer">
            <div class="card card-visible"></div>
        </div>
        <div id="buttonContainer">
            <button id="previousButton" onclick="previousStep()">Previous</button>
            <button id="playButton" onclick="speakStep()">Play</button>
            <button id="nextButton" onclick="nextStep()">Next</button>
        </div>
        <div id="voiceSelectorContainer">
            <label for="voiceSelector">Select Voice:</label>
            <select id="voiceSelector" onchange="changeVoice()"></select>
        </div>
        <div id="navigation">
            <?php for ($i = 0; $i < $totalSteps; $i++) { ?>
                <a onclick="navigateToStep(<?php echo $i; ?>)" class="<?php echo $i === 0 ? 'current' : ''; ?>"><?php echo ($i + 1); ?></a>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    var steps = <?php echo json_encode($steps); ?>;
    var currentStep = 0;
    var totalSteps = <?php echo $totalSteps; ?>;
    var voices = [];

    function populateVoiceList() {
        var voiceSelector = document.getElementById('voiceSelector');
        voiceSelector.innerHTML = '';

        voices = window.speechSynthesis.getVoices();

        voices.forEach(function (voice) {
            var option = document.createElement('option');
            option.textContent = voice.name;
            option.value = voice.name;
            voiceSelector.appendChild(option);
        });
    }

    function showCurrentStep() {
        var cardContainer = document.getElementById('cardContainer');
        var card = cardContainer.querySelector('.card');

        if (card) {
            card.classList.remove('card-visible');

            setTimeout(function () {
                card.innerHTML = '<h2>Step ' + (currentStep + 1) + '/' + totalSteps + '</h2>' + '<p>' + steps[currentStep] + '</p>';
                card.classList.add('card-visible');
            }, 300);
        } else {
            cardContainer.innerHTML = '<div class="card card-visible">' + '<h2>Step ' + (currentStep + 1) + '/' + totalSteps + '</h2>' + '<p>' + steps[currentStep] + '</p>' + '</div>';
        }

        var nextButton = document.getElementById('nextButton');
        var previousButton = document.getElementById('previousButton');

        if (currentStep === 0) {
            previousButton.style.display = 'none';
        } else {
            previousButton.style.display = 'inline-block';
        }

        if (currentStep === totalSteps - 1) {
            nextButton.style.display = 'none';
        } else {
            nextButton.style.display = 'inline-block';
        }

        updateNavigation();
    }

    function nextStep() {
        if (currentStep < totalSteps - 1) {
            currentStep++;
            showCurrentStep();
        } else {
            alert('No more steps.');
        }
    }

    function previousStep() {
        if (currentStep > 0) {
            currentStep--;
            showCurrentStep();
        } else {
            alert('This is the first step.');
        }
    }

    function speakStep() {
        var speech = new SpeechSynthesisUtterance();
        speech.text = steps[currentStep];
        var selectedVoice = document.getElementById('voiceSelector').value;
        var voice = voices.find(function (voice) {
            return voice.name === selectedVoice;
        });

        if (voice) {
            speech.voice = voice;
        }

        window.speechSynthesis.speak(speech);
    }

    function changeVoice() {
        var selectedVoice = document.getElementById('voiceSelector').value;
        var voice = voices.find(function (voice) {
            return voice.name === selectedVoice;
        });

        if (voice) {
            speechSynthesis.cancel();
            speakStep();
        }
    }

    function navigateToStep(step) {
        currentStep = step;
        showCurrentStep();
    }

    function updateNavigation() {
        var navigationLinks = document.querySelectorAll('#navigation a');
        navigationLinks.forEach(function (link, index) {
            if (index === currentStep) {
                link.classList.add('current');
            } else {
                link.classList.remove('current');
            }
        });
    }

    // Wait for the voices to be loaded
    window.speechSynthesis.onvoiceschanged = function () {
        populateVoiceList();
    };

    // Display the initial step
    showCurrentStep();
</script>
</body>
</html>
