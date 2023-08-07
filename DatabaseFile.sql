use experiment;
CREATE TABLE users (
  userId CHAR(7) PRIMARY KEY,
  name VARCHAR(45) NOT NULL,
  designation VARCHAR(45) NOT NULL,
  password VARCHAR(12) NOT NULL
);
INSERT INTO users (userId, name, designation, password) VALUES 
  ('TCH001', 'Rajesh Kumar', 'Professor', 'teacher123'),
  ('TCH002', 'Deepika Sharma', 'Assistant Professor', 'teacher456'),
  ('TCH003', 'Sanjay Verma', 'Lecturer', 'teacher789'),
  ('TCH004', 'Sneha Rajan', 'Associate Professor', 'teacher012'),
  ('TCH005', 'Aruna Menon', 'Senior Lecturer', 'teacher345'),
  ('LAB001', 'Meena Sundaram', 'Lab Assistant', 'lab123'),
  ('LAB002', 'Suresh Raman', 'Junior Lab Assistant', 'lab456'),
  ('LAB003', 'Priya Nair', 'Senior Lab Assistant', 'lab789'),
  ('LAB004', 'Karthik Rajendran', 'Lab Technician', 'lab012'),
  ('LAB005', 'Nithya Balaji', 'Lab Supervisor', 'lab345'),
  ('STU001', 'Arjun Sharma', 'Student', 'student123'),
  ('STU002', 'Divya Menon', 'Student', 'student456'),
  ('STU003', 'Rahul Kapoor', 'Student', 'student789'),
  ('STU004', 'Ananya Nair', 'Student', 'student012'),
  ('STU005', 'Kiran Rajendran', 'Student', 'student345');
select * from users;
CREATE TABLE experiments (
  experimentId INT PRIMARY KEY,
  experimentName VARCHAR(255),
  noOfSteps INT,
  aim VARCHAR(255),
  requiredApparatuss VARCHAR(255)
);
INSERT INTO experiments (experimentId, experimentName, noOfSteps, aim, requiredApparatuss)
VALUES 
  (1, 'Chemical Reaction', 5, 'To study the reaction kinetics', 'Beakers, Bunsen burner, Thermometer'),
  (2, 'Electrical Circuit Analysis', 8, 'To analyze circuit behavior', 'Multimeter, Breadboard, Resistors'),
  (3, 'Microbiology Culture', 6, 'To cultivate microorganisms', 'Petri dishes, Agar, Incubator'),
  (4, 'Genetic Sequencing', 10, 'To sequence DNA', 'PCR machine, DNA sequencer, Primers'),
  (5, 'Physics Pendulum Experiment', 4, 'To study pendulum motion', 'String, Weight, Stopwatch'),
  (6, 'Acid-Base Titration', 7, 'To determine concentration', 'Burette, Pipette, Indicator'),
  (7, 'Plant Growth Observation', 3, 'To monitor plant growth', 'Pots, Soil, Watering can'),
  (8, 'Density Measurement', 5, 'To measure density of substances', 'Graduated cylinder, Balance'),
  (9, 'Magnetic Field Mapping', 6, 'To map magnetic field lines', 'Compass, Magnetic probes'),
  (10, 'Heat Transfer Experiment', 7, 'To study heat conduction', 'Heat source, Thermocouples'),
  (11, 'Chemical Synthesis', 4, 'To synthesize organic compounds', 'Round-bottom flask, Condenser'),
  (12, 'Solar Cell Efficiency', 5, 'To measure solar cell efficiency', 'Solar simulator, Current-voltage meter'),
  (13, 'Reaction Rate Determination', 6, 'To determine reaction rates', 'Reaction vessel, Spectrophotometer'),
  (14, 'Bacterial Staining', 4, 'To stain bacteria for microscopy', 'Crystal violet, Safranin'),
  (15, 'Electroplating Process', 6, 'To electroplate metal objects', 'Electrolyte, Power supply'),
  (16, 'Optical Fiber Communication', 8, 'To transmit data using optical fibers', 'Optical transmitter, Receiver'),
  (17, 'DNA Extraction', 5, 'To extract DNA from samples', 'Buffer solution, Centrifuge'),
  (18, 'Water Quality Analysis', 7, 'To analyze water parameters', 'pH meter, Turbidity meter'),
  (19, 'Motion Sensor Calibration', 4, 'To calibrate motion sensors', 'Motion sensor, Data logger'),
  (20, 'Chemical Equilibrium', 5, 'To study chemical equilibrium', 'Test tubes, Reagents');
CREATE TABLE experiment_steps (
  exptId INT,
  description VARCHAR(255),
  stepNo INT,
  video VARCHAR(255),
  FOREIGN KEY (exptId) REFERENCES experiments(experimentId)
);
INSERT INTO experiment_steps (exptId, description, stepNo, video) VALUES (2, 'Preparing the sample', 6, 'C:\Users\User\Desktop\Main.mp4');
INSERT INTO experiment_steps (exptId, description, stepNo)
VALUES 
  (1, 'Measure and pour the reactants into the beaker', 1),
  (1, 'Heat the mixture using a Bunsen burner', 2),
  (1, 'Record the temperature every 30 seconds', 3),
  (1, 'Analyze the reaction products', 4),
  (1, 'Calculate the reaction rate', 5),
  (2, 'Design the circuit diagram', 1),
  (2, 'Connect components on the breadboard', 2),
  (2, 'Apply voltage and measure current', 3),
  (2, 'Record voltage and current values in a table', 4),
  (2, 'Calculate total resistance and power', 5),
  (2, 'Analyze circuit behavior using Ohms Law', 6),
  (2, 'Draw voltage and current waveforms', 7),
  (2, 'Summarize circuit analysis findings', 8),
  (3, 'Prepare the growth medium', 1),
  (3, 'Inoculate the microorganisms onto the agar', 2),
  (3, 'Incubate the Petri dishes at the appropriate temperature', 3),
  (3, 'Observe and document the colony growth', 4),
  (3, 'Perform Gram staining to determine cell type', 5),
  (3, 'Identify and classify the microorganisms', 6),
  (4, 'Extract DNA from the sample', 1),
  (4, 'Set up the PCR reaction with appropriate primers', 2),
  (4, 'Run the PCR cycles in a thermal cycler', 3),
  (4, 'Prepare the DNA sequencing reaction', 4),
  (4, 'Load the sample into the DNA sequencer', 5),
  (4, 'Analyze and interpret the DNA sequencing results', 6),
  (4, 'Generate a DNA sequence report', 7),
  (4, 'Perform sequence alignment and comparison', 8),
  (4, 'Identify genetic variations and mutations', 9),
  (4, 'Draw conclusions about the DNA sequence', 10),
  (5, 'Set up a pendulum with a string and weight', 1),
  (5, 'Release the pendulum from a fixed angle', 2),
  (5, 'Measure the time period of the pendulum', 3),
  (5, 'Repeat the measurements for different lengths', 4),
  (6, 'Prepare the standard solutions of acid and base', 1),
  (6, 'Fill the burette with one of the solutions', 2),
  (6, 'Add the solution gradually to the flask', 3),
  (6, 'Record the volume at the equivalence point', 4),
  (6, 'Calculate the concentration of the unknown solution', 5),
  (6, 'Repeat the titration for accuracy', 6),
  (7, 'Plant the seeds in the pots with soil', 1),
  (7, 'Water the plants regularly', 2),
  (7, 'Observe and record the plant growth', 3),
  (8, 'Measure the mass of the substance', 1),
  (8, 'Fill the graduated cylinder with a known volume of water', 2),
  (8, 'Carefully add the substance to the cylinder', 3),
  (8, 'Record the new water volume', 4),
  (8, 'Calculate the density using the mass and volume', 5),
  (9, 'Place the compass near the magnetic field source', 1),
  (9, 'Note the direction of the compass needle', 2),
  (9, 'Move the compass to different locations', 3),
  (9, 'Plot the magnetic field lines on a map', 4),
  (9, 'Use magnetic probes to measure the field strength', 5),
  (9, 'Analyze and interpret the magnetic field data', 6),
  (10, 'Prepare the heat source', 1),
  (10, 'Connect the thermocouples to the objects', 2),
  (10, 'Measure and record the initial temperatures', 3),
  (10, 'Apply heat and monitor the temperature changes', 4),
  (10, 'Record the final temperatures', 5),
  (10, 'Calculate the rate of heat transfer', 6),
  (10, 'Analyze the results and draw conclusions', 7),
  (11, 'Set up the round-bottom flask and condenser', 1),
  (11, 'Add the reactants and catalyst to the flask', 2),
  (11, 'Heat the mixture and monitor the reaction', 3),
  (11, 'Cool the reaction and extract the product', 4),
  (12, 'Set up the solar cell in a controlled environment', 1),
  (12, 'Measure and record the incident light intensity', 2),
  (12, 'Measure and record the current-voltage characteristics', 3),
  (12, 'Calculate the efficiency of the solar cell', 4),
  (12, 'Repeat the measurements for different conditions', 5),
  (13, 'Prepare the reaction vessel and reagents', 1),
  (13, 'Initiate the reaction and start the timer', 2),
  (13, 'Measure the absorbance at regular intervals', 3),
  (13, 'Plot a graph of absorbance versus time', 4),
  (13, 'Determine the reaction rate from the graph', 5),
  (13, 'Analyze factors affecting the reaction rate', 6),
  (14, 'Prepare the bacterial smear on a slide', 1),
  (14, 'Stain the bacteria with crystal violet', 2),
  (14, 'Wash and decolorize the slide', 3),
  (14, 'Counterstain the bacteria with safranin', 4),
  (15, 'Prepare the electrolyte solution', 1),
  (15, 'Connect the object to be electroplated', 2),
  (15, 'Immerse the object and apply current', 3),
  (15, 'Monitor the electroplating process', 4),
  (16, 'Set up the optical transmitter', 1),
  (16, 'Connect the optical fibers', 2),
  (16, 'Transmit data through the fibers', 3),
  (16, 'Receive and decode the transmitted data', 4),
  (16, 'Analyze the data transmission quality', 5),
  (16, 'Optimize the system for better performance', 6),
  (16, 'Summarize the findings and conclusions', 7),
  (17, 'Collect the sample for DNA extraction', 1),
  (17, 'Break down the cells and release DNA', 2),
  (17, 'Separate DNA from other cellular components', 3),
  (17, 'Purify the extracted DNA', 4),
  (17, 'Quantify and assess the DNA quality', 5),
  (18, 'Collect water samples from different sources', 1),
  (18, 'Measure and record the pH of each sample', 2),
  (18, 'Measure and record the turbidity of each sample', 3),
  (18, 'Perform additional tests for other parameters', 4),
  (18, 'Compare the results with water quality standards', 5),
  (18, 'Interpret the data and draw conclusions', 6),
  (19, 'Calibrate the motion sensor', 1),
  (19, 'Set up the data logger for recording', 2),
  (19, 'Perform controlled motion and record data', 3),
  (19, 'Analyze the motion data for accuracy', 4),
  (20, 'Prepare the test tubes with reagents', 1),
  (20, 'Add reactants to each test tube', 2),
  (20, 'Observe and record the color changes', 3),
  (20, 'Attain equilibrium by varying reactant ratios', 4),
  (20, 'Analyze the equilibrium state and concentrations', 5);
  select * from experiment_steps;