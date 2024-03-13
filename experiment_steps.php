<!DOCTYPE html>
<html>
	<head>
		<title>SIET Chem Lab</title>
		<link rel="icon" type="image/x-icon" href="logo.png">
		<style>
  .top-heading {
	margin:auto;
text-align:center;
  padding: auto;
  overflow: hidden;
    background-color: #1A1A1A;
    padding: 1rem;
	color:#fff;
    justify-content: center;
    align-items: center;
 

  }

    #component {
		
        background-color:white;
        padding-bottom: 40px;
        perspective: 1000px;
    }

    #stepContainer {
        max-width: 600px;
		position:fixed;
        margin-left: 25%;
        background-color:white;
        transform-style: preserve-3d;
    }

    .card {
        background: linear-gradient(#333, #444);
        color: #fff;
        padding: 20px;
        position: relative;
        transform: rotateX(2deg) rotateY(-1deg);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
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
        background-color: #212121;
        color: #fff;
        border: none;
        cursor: pointer;
        display: inline-block;
        margin-left: 0px;
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
        overflow-x: auto;
        white-space: nowrap;
    }

    #navigation a {
        display: inline-block;
        padding: 5px 10px;
        background-color: #212121;
        color: #fff;
        text-decoration: none;
        margin-right: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    #navigation a.current {
        background-color: white;
        color:#212121;
        border:#212121 3px solid;
    }



    #navigation a {
        display: inline-block;
        padding: 5px 10px;
        background-color: #212121;
        color: #fff;
        text-decoration: none;
        margin-right: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    #navigation a.current {
        background-color: white;
        color:#212121;
        border:#212121 3px solid;
    }

    .logo {
        margin-right: 10px;
        width: 40px;
        height: 40px;
    }

	
			body {
		font-family: Arial, sans-serif;
		line-height: 1.6;
		color: #333;
		background-color: #f4f4f4;
		margin: 0;
		padding: 0;
		}

		.top-heading {
		margin: auto;
		text-align: center;
		padding: 1rem;
		overflow: hidden;
		background-color: #1A1A1A;
		color: #fff;
		justify-content: center;
		align-items: center;
		}

		.top-heading img {
		height: 40px;
		width: 40px;
		}

		#component {
		background-color: white;
		padding-bottom: 40px;
		perspective: 1000px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}

		#stepContainer {
		max-width: 600px;
		position: relative;
		background-color: white;
		transform-style: preserve-3d;
		margin: 0 auto;
		padding: 10px;
		border-radius: 5px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}

		.card {
		background: linear-gradient(#333, #444);
		color: #fff;
		padding: 20px;
		position: relative;
		transform: rotateX(2deg) rotateY(-1deg);
		box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
		transition: opacity 0.3s ease-in-out;
		opacity: 0;
		border-radius: 5px;
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
		background-color: #212121;
		color: #fff;
		border: none;
		cursor: pointer;
		display: inline-block;
		margin-left: 0px;
		border-radius: 5px;
		margin-bottom: 10px;
		}

		#voiceSelectorContainer {
		margin-top: 10px;
		text-align: center;
		}

		#voiceSelector {
		padding: 5px;
		font-size: 14px;
		border-radius: 5px;
		border: 1px solid #ccc;
		}

		#navigation {
		text-align: left;
		margin-top: 20px;
		overflow-x: auto;
		white-space: nowrap;
		}

		#navigation a {
		display: inline-block;
		padding: 5px 10px;
		background-color: #212121;
		color: #fff;
		text-decoration: none;
		margin-right: 5px;
		transition: background-color 0.3s ease-in-out;
		border-radius: 5px;
		margin-bottom: 10px;
		}
		a{
			text-decoration:none;
			color:white;
			background-color: black;
			padding: 5px;
		}
		#navigation a.current {
		background-color: white;
		color: #212121;
		border: #212121 3px solid;
		}
		ul {
		list-style-type: none;
		background-color:  #333;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
		}

		li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		}

		.active {
		background-color:  #333;
		}
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			display: flex;
			justify-content: space-between;
    }

    li a {
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: grey;
    }


    li:last-child {
      margin: auto;
    }
		@media screen and (max-width: 600px) {
		#stepContainer {
			max-width: 100%;
		}}

</style>
	</head>
	<body>
		<?php
		$experimentHeading = $_GET["experimentHeading"];
	
		?>
			<ul>
			<li style="margin-top:4px;margin-left:2px"><a href="http://localhost/chemlab/Experimentlist.php">Expet List</a></li>
			<li style="margin-top:4px;margin-left:2px"><a href="http://127.0.0.1:5000">Clear doubt</a></li>
			<li style="float:left;font-size:20px"><a class="active" href="#"><?php echo $experimentHeading; ?></a></li>
			</ul>
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
			        $videoLink = array();
			        while ($row = mysqli_fetch_assoc($result)) {
			            array_push($steps, $row['description']);
			            array_push($videoLink, $row['video']);
			        }
			
			    } else {
			        echo '<p>No steps found for this experiment.</p>';
			    }
			} else {
			    echo '<p>No experiment ID provided.</p>';
			}
			
			// Close the database connection
			mysqli_close($conn);
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
					<?php if (isset($totalSteps)) { 
						for ($i = 0; $i < $totalSteps; $i++) { ?>
					<a onclick="navigateToStep(<?php echo $i; ?>)" class="<?php echo $i === 0 ? 'current' : ''; ?>"><?php echo ($i + 1); ?></a>
					<?php } }?>
				</div>
			</div>
		</div>
		<script>
			var steps = <?php echo json_encode($steps); ?>;
			var video = <?php echo json_encode($videoLink); ?>;
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
			            card.innerHTML = '<h2>Step ' + (currentStep + 1) + '/' + totalSteps + '</h2>' + '<p style="font-size:20px;">' + steps[currentStep] + '</p>' +
			        '<video style="margin-left:40px;" height="300px" width="400px" controls>' +
			        '<source src="' + video[currentStep] + '" type="video/mp4">' +
			        '</video>';
			            card.classList.add('card-visible');
			        }, 300);
			    } else {
			        cardContainer.innerHTML =
			        '<div class="card card-visible">' +
			        '<h2>Step ' + (currentStep + 1) + '/' + totalSteps + '</h2>' +
			        '<p>' + steps[currentStep] + '</p><br><br>' +
			        '<video height="400px" width="600px" controls>' +
			        '<source src="' + video[currentStep] + '" type="video/mp4">' +
			        '</video>' +
			        '</div>';
			        console.log(video[currentStep]);
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
			
			// Function to handle voice commands
			function handleVoiceCommand(command) {
			    if (command.includes("play")) {
			        speakStep();
			    } else if (command.includes("next")) {
			        nextStep();
			    } else if (command.includes("previous")) {
			        previousStep();
			    }
			}
			function startSpeechRecognition() {
			    var recognition = new webkitSpeechRecognition(); // For Chrome
			    // var recognition = new SpeechRecognition(); // For Firefox
			
			    recognition.lang = 'en-US'; // Language for speech recognition
			
			    recognition.onresult = function(event) {
			        var result = event.results[0][0].transcript;
			        handleVoiceCommand(result);
			    }
			
			    recognition.onerror = function(event) {
			        console.error('Error occurred in recognition: ', event.error);
			    }
			
			    recognition.onend = function() {
			        console.log('Speech recognition ended. Restarting...');
			        recognition.start(); // Restart the recognition after it ends
			    }
			
			    recognition.start(); // Start the speech recognition automatically
			}
			
			// Start speech recognition automatically when the page loads
			startSpeechRecognition();
		</script>
	</body>
</html>