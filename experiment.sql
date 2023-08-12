-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 03:13 PM
-- Server version: 8.0.29
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `experiment`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiments`
--

CREATE TABLE `experiments` (
  `experimentId` int NOT NULL,
  `experimentName` varchar(255) DEFAULT NULL,
  `noOfSteps` int DEFAULT NULL,
  `aim` varchar(255) DEFAULT NULL,
  `requiredApparatuss` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `experiments`
--

INSERT INTO `experiments` (`experimentId`, `experimentName`, `noOfSteps`, `aim`, `requiredApparatuss`) VALUES
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
(16, 'Optical Fiber Communication', 8, 'To transmit data using optical fibers', 'Optical transmitter, Receiver');

-- --------------------------------------------------------

--
-- Table structure for table `experiment_steps`
--

CREATE TABLE `experiment_steps` (
  `exptId` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `stepNo` int DEFAULT NULL,
  `video` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `experiment_steps`
--

INSERT INTO `experiment_steps` (`exptId`, `description`, `stepNo`, `video`) VALUES
(1, 'Measure and pour the reactants into the beaker', 1, 'http://localhost/chemlab/Main.mp4'),
(1, 'Heat the mixture using a Bunsen burner', 2, 'http://localhost/chemlab/Main.mp4'),
(1, 'Record the temperature every 30 seconds', 3, 'http://localhost/chemlab/Main.mp4'),
(1, 'Analyze the reaction products', 4, 'http://localhost/chemlab/Main.mp4'),
(1, 'Calculate the reaction rate', 5, 'http://localhost/chemlab/Main.mp4'),
(2, 'Design the circuit diagram', 1, 'http://localhost/chemlab/Main.mp4'),
(2, 'Connect components on the breadboard', 2, 'http://localhost/chemlab/Main.mp4'),
(2, 'Apply voltage and measure current', 3, 'http://localhost/chemlab/Main.mp4'),
(2, 'Record voltage and current values in a table', 4, 'http://localhost/chemlab/Main.mp4'),
(2, 'Calculate total resistance and power', 5, 'http://localhost/chemlab/Main.mp4'),
(2, 'Analyze circuit behavior using Ohms Law', 6, 'http://localhost/chemlab/Main.mp4'),
(2, 'Draw voltage and current waveforms', 7, 'http://localhost/chemlab/Main.mp4'),
(2, 'Summarize circuit analysis findings', 8, 'http://localhost/chemlab/Main.mp4'),
(3, 'Prepare the growth medium', 1, 'http://localhost/chemlab/Main.mp4'),
(3, 'Inoculate the microorganisms onto the agar', 2, 'http://localhost/chemlab/Main.mp4'),
(3, 'Incubate the Petri dishes at the appropriate temperature', 3, 'http://localhost/chemlab/Main.mp4'),
(3, 'Observe and document the colony growth', 4, 'http://localhost/chemlab/Main.mp4'),
(3, 'Perform Gram staining to determine cell type', 5, 'http://localhost/chemlab/Main.mp4'),
(3, 'Identify and classify the microorganisms', 6, 'http://localhost/chemlab/Main.mp4'),
(4, 'Extract DNA from the sample', 1, 'http://localhost/chemlab/Main.mp4'),
(4, 'Set up the PCR reaction with appropriate primers', 2, 'http://localhost/chemlab/Main.mp4'),
(4, 'Run the PCR cycles in a thermal cycler', 3, 'http://localhost/chemlab/Main.mp4'),
(4, 'Prepare the DNA sequencing reaction', 4, 'http://localhost/chemlab/Main.mp4'),
(4, 'Load the sample into the DNA sequencer', 5, 'http://localhost/chemlab/Main.mp4'),
(4, 'Analyze and interpret the DNA sequencing results', 6, 'http://localhost/chemlab/Main.mp4'),
(4, 'Generate a DNA sequence report', 7, 'http://localhost/chemlab/Main.mp4'),
(4, 'Perform sequence alignment and comparison', 8, 'http://localhost/chemlab/Main.mp4'),
(4, 'Identify genetic variations and mutations', 9, 'http://localhost/chemlab/Main.mp4'),
(4, 'Draw conclusions about the DNA sequence', 10, 'http://localhost/chemlab/Main.mp4'),
(5, 'Set up a pendulum with a string and weight', 1, 'http://localhost/chemlab/Main.mp4'),
(5, 'Release the pendulum from a fixed angle', 2, 'http://localhost/chemlab/Main.mp4'),
(5, 'Measure the time period of the pendulum', 3, 'http://localhost/chemlab/Main.mp4'),
(5, 'Repeat the measurements for different lengths', 4, 'http://localhost/chemlab/Main.mp4'),
(6, 'Prepare the standard solutions of acid and base', 1, 'http://localhost/chemlab/Main.mp4'),
(6, 'Fill the burette with one of the solutions', 2, 'http://localhost/chemlab/Main.mp4'),
(6, 'Add the solution gradually to the flask', 3, 'http://localhost/chemlab/Main.mp4'),
(6, 'Record the volume at the equivalence point', 4, 'http://localhost/chemlab/Main.mp4'),
(6, 'Calculate the concentration of the unknown solution', 5, 'http://localhost/chemlab/Main.mp4'),
(6, 'Repeat the titration for accuracy', 6, 'http://localhost/chemlab/Main.mp4'),
(7, 'Plant the seeds in the pots with soil', 1, 'http://localhost/chemlab/Main.mp4'),
(7, 'Water the plants regularly', 2, 'http://localhost/chemlab/Main.mp4'),
(7, 'Observe and record the plant growth', 3, 'http://localhost/chemlab/Main.mp4'),
(8, 'Measure the mass of the substance', 1, 'http://localhost/chemlab/Main.mp4'),
(8, 'Fill the graduated cylinder with a known volume of water', 2, 'http://localhost/chemlab/Main.mp4'),
(8, 'Carefully add the substance to the cylinder', 3, 'http://localhost/chemlab/Main.mp4'),
(8, 'Record the new water volume', 4, 'http://localhost/chemlab/Main.mp4'),
(8, 'Calculate the density using the mass and volume', 5, 'http://localhost/chemlab/Main.mp4'),
(9, 'Place the compass near the magnetic field source', 1, 'http://localhost/chemlab/Main.mp4'),
(9, 'Note the direction of the compass needle', 2, 'http://localhost/chemlab/Main.mp4'),
(9, 'Move the compass to different locations', 3, 'http://localhost/chemlab/Main.mp4'),
(9, 'Plot the magnetic field lines on a map', 4, 'http://localhost/chemlab/Main.mp4'),
(9, 'Use magnetic probes to measure the field strength', 5, 'http://localhost/chemlab/Main.mp4'),
(9, 'Analyze and interpret the magnetic field data', 6, 'http://localhost/chemlab/Main.mp4'),
(10, 'Prepare the heat source', 1, 'http://localhost/chemlab/Main.mp4'),
(10, 'Connect the thermocouples to the objects', 2, 'http://localhost/chemlab/Main.mp4'),
(10, 'Measure and record the initial temperatures', 3, 'http://localhost/chemlab/Main.mp4'),
(10, 'Apply heat and monitor the temperature changes', 4, 'http://localhost/chemlab/Main.mp4'),
(10, 'Record the final temperatures', 5, 'http://localhost/chemlab/Main.mp4'),
(10, 'Calculate the rate of heat transfer', 6, 'http://localhost/chemlab/Main.mp4'),
(10, 'Analyze the results and draw conclusions', 7, 'http://localhost/chemlab/Main.mp4'),
(11, 'Set up the round-bottom flask and condenser', 1, 'http://localhost/chemlab/Main.mp4'),
(11, 'Add the reactants and catalyst to the flask', 2, 'http://localhost/chemlab/Main.mp4'),
(11, 'Heat the mixture and monitor the reaction', 3, 'http://localhost/chemlab/Main.mp4'),
(11, 'Cool the reaction and extract the product', 4, 'http://localhost/chemlab/Main.mp4'),
(12, 'Set up the solar cell in a controlled environment', 1, 'http://localhost/chemlab/Main.mp4'),
(12, 'Measure and record the incident light intensity', 2, 'http://localhost/chemlab/Main.mp4'),
(12, 'Measure and record the current-voltage characteristics', 3, 'http://localhost/chemlab/Main.mp4'),
(12, 'Calculate the efficiency of the solar cell', 4, 'http://localhost/chemlab/Main.mp4'),
(12, 'Repeat the measurements for different conditions', 5, 'http://localhost/chemlab/Main.mp4'),
(13, 'Prepare the reaction vessel and reagents', 1, 'http://localhost/chemlab/Main.mp4'),
(13, 'Initiate the reaction and start the timer', 2, 'http://localhost/chemlab/Main.mp4'),
(13, 'Measure the absorbance at regular intervals', 3, 'http://localhost/chemlab/Main.mp4'),
(13, 'Plot a graph of absorbance versus time', 4, 'http://localhost/chemlab/Main.mp4'),
(13, 'Determine the reaction rate from the graph', 5, 'http://localhost/chemlab/Main.mp4'),
(13, 'Analyze factors affecting the reaction rate', 6, 'http://localhost/chemlab/Main.mp4'),
(14, 'Prepare the bacterial smear on a slide', 1, 'http://localhost/chemlab/Main.mp4'),
(14, 'Stain the bacteria with crystal violet', 2, 'http://localhost/chemlab/Main.mp4'),
(14, 'Wash and decolorize the slide', 3, 'http://localhost/chemlab/Main.mp4'),
(14, 'Counterstain the bacteria with safranin', 4, 'http://localhost/chemlab/Main.mp4'),
(15, 'Prepare the electrolyte solution', 1, 'http://localhost/chemlab/Main.mp4'),
(15, 'Connect the object to be electroplated', 2, 'http://localhost/chemlab/Main.mp4'),
(15, 'Immerse the object and apply current', 3, 'http://localhost/chemlab/Main.mp4'),
(15, 'Monitor the electroplating process', 4, 'http://localhost/chemlab/Main.mp4'),
(16, 'Set up the optical transmitter', 1, 'http://localhost/chemlab/Main.mp4'),
(16, 'Connect the optical fibers', 2, 'http://localhost/chemlab/Main.mp4'),
(16, 'Transmit data through the fibers', 3, 'http://localhost/chemlab/Main.mp4'),
(16, 'Receive and decode the transmitted data', 4, 'http://localhost/chemlab/Main.mp4'),
(16, 'Analyze the data transmission quality', 5, 'http://localhost/chemlab/Main.mp4'),
(16, 'Optimize the system for better performance', 6, 'http://localhost/chemlab/Main.mp4'),
(16, 'Summarize the findings and conclusions', 7, 'http://localhost/chemlab/Main.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` char(7) NOT NULL,
  `name` varchar(45) NOT NULL,
  `designation` varchar(45) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `designation`, `password`) VALUES
('LAB001', 'Meena Sundaram', 'Lab Assistant', 'lab123'),
('LAB002', 'Suresh Raman', 'Junior Lab Assistant', 'lab456'),
('LAB003', 'Priya Nair', 'Senior Lab Assistant', 'lab789'),
('LAB004', 'Karthik Rajendran', 'Lab Technician', 'lab012'),
('LAB005', 'Nithya Balaji', 'Lab Supervisor', 'lab345'),
('STU001', 'Arjun Sharma', 'Student', 'student123'),
('STU002', 'Divya Menon', 'Student', 'student456'),
('STU003', 'Rahul Kapoor', 'Student', 'student789'),
('STU004', 'Ananya Nair', 'Student', 'student012'),
('STU005', 'Kiran Rajendran', 'Student', 'student345'),
('TCH001', 'Rajesh Kumar', 'Professor', 'teacher123'),
('TCH002', 'Deepika Sharma', 'Assistant Professor', 'teacher456'),
('TCH003', 'Sanjay Verma', 'Lecturer', 'teacher789'),
('TCH004', 'Sneha Rajan', 'Associate Professor', 'teacher012'),
('TCH005', 'Aruna Menon', 'Senior Lecturer', 'teacher345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experiments`
--
ALTER TABLE `experiments`
  ADD PRIMARY KEY (`experimentId`);

--
-- Indexes for table `experiment_steps`
--
ALTER TABLE `experiment_steps`
  ADD KEY `exptId` (`exptId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `experiment_steps`
--
ALTER TABLE `experiment_steps`
  ADD CONSTRAINT `experiment_steps_ibfk_1` FOREIGN KEY (`exptId`) REFERENCES `experiments` (`experimentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
