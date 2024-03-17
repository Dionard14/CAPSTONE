-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 06:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ui_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `fname`, `lname`, `email`, `password`) VALUES
(0, 'Ma. Leonora', 'Flame', 'ml_flame@phinmaed.com', 'Flame123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `checkin_time` datetime DEFAULT NULL,
  `checkout_time` datetime DEFAULT NULL,
  `student_id` int(255) NOT NULL,
  `teacher_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `id_number`, `fname`, `lname`, `course`, `year_level`, `checkin_time`, `checkout_time`, `student_id`, `teacher_id`) VALUES
(1, '123', 'd', 'd', 'CITE', '3', NULL, NULL, 0, 0),
(78, '123', 'd', 'd', 'CITE', '3', '2024-01-26 17:59:35', '2024-01-26 17:59:47', 0, 0),
(79, '123', 'd', 'd', 'CITE', '3', '2024-01-26 18:02:52', NULL, 0, 0),
(80, '123', 'd', 'd', 'CITE', '3', '2024-01-26 18:03:04', '2024-01-26 18:03:08', 0, 0),
(81, '04-1617-05234', 'Dionard', 'Antioquia', 'COE', '2', '2024-01-26 18:04:48', '2024-01-26 18:04:54', 0, 0),
(82, '123', 'd', 'd', 'CITE', '3', '2024-01-26 18:47:24', NULL, 0, 0),
(83, '123', 'd', 'd', 'CITE', '3', '2024-01-26 18:47:26', NULL, 0, 0),
(84, '123', 'd', 'd', 'CITE', '3', '2024-01-26 18:47:58', '2024-01-26 18:48:01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `barcode` varchar(255) NOT NULL,
  `call_no1` varchar(255) NOT NULL,
  `call_no2` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`barcode`, `call_no1`, `call_no2`, `copyright`, `title`, `author`, `location`) VALUES
('4000000260', 'TA351', 'B447', '2004', 'Vector mechanics for engineers : statics', 'Ferdinand P. Beer', 'EL'),
('4000000261', 'TA351', 'B447', '2004', 'Vector mechanics for engineers : statics', 'Ferdinand P. Beer', 'EL'),
('4000000285', 'QA154.2', 'B638', '2004', 'Algebra & trigonometry', 'Robert Blitzer', 'EL'),
('4000000286', 'QA154.2', 'B638', '2004', 'Algebra & trigonometry', 'Robert Blitzer', 'EL'),
('4000000334', 'TH7227', 'B786', '2004', 'Audel HVAC fundamentals', 'James Brumbaugh', 'EL'),
('4000000335', 'TH7227', 'B786', '2004', 'Audel HVAC fundamentals', 'James Brumbaugh', 'EL'),
('4000000336', 'TH7227', 'B786', '2004', 'Audel HVAC fundamentals', 'James Brumbaugh', 'EL'),
('4000000337', 'TR897.7', 'B835', '2004', 'Macromedia Flash MX 2004 : fast & easy web development', 'Lisa A. Bucki', 'EL'),
('4000000339', 'QA76.73', 'S67 B854', '2004', 'MySQL/PHP database applications', 'Brad Bulger', 'EL'),
('4000000347', 'T385', 'B873', '2004', 'Adobe Photoshop CS : photographer\'s guide', 'David M. Burton', 'EL'),
('6000000378', 'GN671', 'P5 J86', '2000', 'Raiding, trading, and feasting :the political economy of Philippine chiefdoms', 'Laura Lee Junker.', 'Fil'),
('6000000433', 'GN671', 'P5 I53', '2000', 'The Indigenous peoples of the Philippines', '', 'Fil'),
('6000000695', 'DS687.3', 'B47', '2000', 'A living constitution :the Cory Aquino presidency', 'Joaquin G. Bernas.', 'Fil'),
('6000000805', 'GT76', 'T43', '2000', 'Their customs and beliefs : some insights on a people who live as though in a garden of Eden', 'Julio F. Silverio.', 'Fil'),
('6000000806', 'GT76', 'T43', '2000', 'Their customs and beliefs : some insights on a people who live as though in a garden of Eden', 'Julio F. Silverio.', 'Fil'),
('6000000807', 'GT76', 'T43', '2000', 'Their customs and beliefs : some insights on a people who live as though in a garden of Eden', 'Julio F. Silverio.', 'Fil'),
('6000000808', 'GT76', 'T43', '2000', 'Their customs and beliefs : some insights on a people who live as though in a garden of Eden', 'Julio F. Silverio.', 'Fil'),
('6000000809', 'GT76', 'T43', '2000', 'Their customs and beliefs : some insights on a people who live as though in a garden of Eden', 'Julio F. Silverio.', 'Fil'),
('6000003192', 'DS687.2', 'S25', '2000', 'Presidential plunder :the quest for the Marcos ill-gotten wealth', 'Jovito R. Salonga.', 'Fil'),
('6000003205', 'DS687.52', 'I58', '2000', 'Investigating Estrada :millions, mansions and mistresses', 'Sheila S. Coronel.', 'Fil'),
('7000002158', 'HD30.3', 'M47', '2000', 'Self-made communication manager', 'Cesar M. Mercado', 'Cir'),
('7000002309', 'HD30.37', 'B74', '2000', 'Communities of commerce : building internet business communities to accelerate growth, minimize risk, and increase customer loyalty', 'Stacey E. Bressler', 'Cir'),
('7000003500', 'HD2901', 'C668', '2000', 'Corporate governance and finance in East Asia : a study of Indonesia, Republic of Korea, Malaysia', 'Juzhong Zhuang', 'Cir'),
('7000003581', 'HD2901', 'C668', '2000', 'Corporate governance and finance in East Asia : a study of Indonesia, Republic of Korea, Malaysia', 'Juzhong Zhuang', 'Cir'),
('7000010963', 'HD30.25', 'D34', '2000', 'Quantitative techniques for business management', 'Asuncion C. Mercado del Rosario', 'Cir'),
('7000010964', 'HD30.25', 'D34', '2000', 'Quantitative techniques for business management', 'Asuncion C. Mercado del Rosario', 'Cir'),
('7000010966', 'HD30.213', 'K55', '2000', 'Information quality assurance and internal control for management decision making', 'William R. Kinney Jr.', 'Cir'),
('7000011211', 'HD30.28', 'M26', '2000', 'Strategic management : process, content and implementation', 'Hugh Macmillan', 'Cir'),
('7000013433', 'HD2901', 'C668', '2000', 'Corporate governance and finance in East Asia : a study of Indonesia, Republic of Korea, Malaysia,', 'Juzhong Zhuang', 'Cir'),
('7000014476', 'HD30.4', 'S74', '2000', 'Executive coaching : lead, develop, retain motivated talented people', 'Peter Stephenson', 'Cir'),
('9000000022', 'H62', 'C34915', '2000', 'Conducting Research : A Practical Application', '', 'G.S. '),
('9000000023', 'H62', 'C34915', '2000', 'Conducting Research : A Practical Application', '', 'G.S. '),
('9000000024', 'H62', 'C34915', '2000', 'Conducting Research : A Practical Application', '', 'G.S. '),
('9000000025', 'H62', 'C34915', '2000', 'Conducting Research : A Practical Application', '', 'G.S. '),
('9000000026', 'H62', 'C34915', '2000', 'Conducting Research : A Practical Application', '', 'G.S. '),
('9000000116', 'BF176', 'D78', '2000', 'Appraisal Procedures for Counselors and Helping Professionals', 'Robert J. Drummond', 'G.S. '),
('9000000121', 'BF76.5', 'S46', '2000', 'Research Methods in Psychology', 'John J. Shaughnessy', 'G.S. '),
('9000000153', 'BF637', 'C6 F32', '2000', 'The Counselor Intern\'s Handbook', 'Christopher Faiver', 'G.S. '),
('9000000269', 'BF637', 'N4 H64', '2000', 'Thinking on Your Feet in Negotiations : Rapid Response Tactics', 'Jane Hodgson', 'G.S. '),
('9000000385', 'H62', 'H588', '2000', 'Doing Qualitative Research Differently : Free Association, Narrative and the Interview Method', '', 'G.S. '),
('9000001598', 'E119.2', 'C66', '2000', 'Managing Allegations Against Staff : Personnel and Child Protection Issues in Schools', 'Maureen Cooper', 'G.S. ');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluationID` int(11) NOT NULL,
  `titles` varchar(255) DEFAULT NULL,
  `course` varchar(255) NOT NULL,
  `feedbacks` text DEFAULT NULL,
  `recommendations` text DEFAULT NULL,
  `rating` float NOT NULL,
  `book_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`evaluationID`, `titles`, `course`, `feedbacks`, `recommendations`, `rating`, `book_date`) VALUES
(18, 'Vector mechanics for engineers : statics', 'COE', 'ok', 'ok', 4.6, NULL),
(19, 'Algebra & trigonometry', 'COED', 'ok', 'ok', 4.6, NULL),
(20, 'Quantitative techniques for business management', 'CITE', 'ok', 'ok', 4.7, NULL),
(21, 'Vector mechanics for engineers : statics', 'CITE', 'ok', 'ok', 3.9, NULL),
(22, 'MySQL/PHP database applications', 'CITE', 'ok', 'ok', 4.6, NULL),
(23, 'Vector mechanics for engineers : statics', 'CITE', 'ok', 'ok', 4.6, '2024-03-14 20:27:14'),
(24, 'Macromedia Flash MX 2004 : fast & easy web development', 'CITE', 'ok', 'ok', 3.6, '2024-03-14 20:28:28'),
(25, 'MySQL/PHP database applications', 'CCCJE', 'ok', 'ok', 4.6, '2024-03-14 20:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_likes`
--

CREATE TABLE `evaluation_likes` (
  `like_id` int(11) NOT NULL,
  `evaluationID` int(11) DEFAULT NULL,
  `action` enum('like','dislike') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluation_likes`
--

INSERT INTO `evaluation_likes` (`like_id`, `evaluationID`, `action`) VALUES
(1, 18, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_number`, `fname`, `lname`, `course`, `year_level`, `email`, `password`) VALUES
(16, '04-1617-05234', 'Dionard', 'Antioquia', 'COE', '2', 'dionard1@gmail.com', 'Dionard1'),
(1, '123', 'd', 'd', 'CITE', '3', 'dionard@gmail.com', 'Dionard123'),
(17, '123123', 'Davien', 'Siva', 'CMA-TMNHMBAIS,BSBA', '3', 'davien@gmail.com', 'Davien123'),
(18, '12345', 'John Carmelo', 'Flame', 'CAHS', '3', 'carmelo@gmail.com', 'Carmelo123');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `id_number`, `fname`, `lname`, `email`, `password`) VALUES
(4, '123123', 'Nicole', 'Lampa', 'nicole@gmail.com', 'Nicole123'),
(3, '123123123', 'Dionard123', 'Antioquia123', '123123123@gmail.com', 'Dionard123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`barcode`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluationID`);

--
-- Indexes for table `evaluation_likes`
--
ALTER TABLE `evaluation_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `evaluationID` (`evaluationID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `UNIQUE` (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `evaluation_likes`
--
ALTER TABLE `evaluation_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluation_likes`
--
ALTER TABLE `evaluation_likes`
  ADD CONSTRAINT `evaluation_likes_ibfk_1` FOREIGN KEY (`evaluationID`) REFERENCES `evaluation` (`evaluationID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
