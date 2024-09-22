-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230302.b5e5e07f9a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 04:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcqexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`) VALUES
(2, 'random'),
(4, 'CCC'),
(5, 'CMHC');

-- --------------------------------------------------------

--
-- Table structure for table `exam_sessions`
--

CREATE TABLE `exam_sessions` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `score` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_sessions`
--

INSERT INTO `exam_sessions` (`id`, `exam_id`, `user_name`, `user_mobile`, `total_marks`, `score`, `date`) VALUES
(4, 4, 'Rushi Gokani', '000000000', 3, 67, '2024-09-14 11:53:05'),
(5, 4, 'svdf', 'asdv', 3, 67, '2024-09-14 12:04:38'),
(6, 5, 'Rushi Gokani', 'ASCAscascasasc', 2, 0, '2024-09-14 12:05:32'),
(7, 5, 'asdvasdv', 'asdvasdv', 2, 50, '2024-09-14 12:10:27'),
(8, 2, 'sdv', 'sdvasdvasdv', 20, 30, '2024-09-14 12:10:57'),
(9, 2, 'DEven', 'sdnvcasdkmn', 20, 15, '2024-09-14 12:11:46'),
(10, 4, 'Rushi Gokani', '000000000', 3, 67, '2024-09-14 12:34:40'),
(11, 5, 'asdc', 'ascas', 2, 0, '2024-09-14 12:47:25'),
(12, 5, 'asdc', 'ascas', 2, 50, '2024-09-14 12:47:35'),
(13, 5, '', '', 2, 0, '2024-09-14 12:48:05'),
(14, 2, '', '', 20, 15, '2024-09-14 12:48:34'),
(15, 5, 'Rushi Gokani', '000000000', 2, 0, '2024-09-14 12:50:29'),
(16, 2, 'Rushi Gokani', '000000000', 20, 0, '2024-09-22 02:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_option`) VALUES
(4, 2, 'question', 'option1', 'option2', 'option3', 'option4', 0),
(5, 2, 'Which element has the atomic number 1?', 'Helium', 'Hydrogen', 'Oxygen', 'Carbon', 2),
(6, 2, 'Which is the longest river in the world?', 'Nile', 'Amazon', 'Yangtze', 'Mississippi', 1),
(7, 2, 'Who painted the Mona Lisa?', 'Vincent van Gogh', 'Pablo Picasso', 'Leonardo da Vinci', 'Claude Monet', 3),
(8, 2, 'Which country hosted the 2016 Summer Olympics?', 'China', 'Brazil', 'USA', 'Germany', 2),
(9, 2, 'What is the largest ocean on Earth?', 'Atlantic', 'Indian', 'Pacific', 'Arctic', 3),
(10, 2, 'Which programming language is used for web development?', 'C++', 'Python', 'JavaScript', 'Java', 3),
(11, 2, 'Which planet is known as the Red Planet?', 'Earth', 'Mars', 'Jupiter', 'Venus', 2),
(12, 2, 'What is the capital of Japan?', 'Beijing', 'Seoul', 'Tokyo', 'Bangkok', 3),
(13, 2, 'What is the chemical symbol for Gold?', 'Ag', 'Au', 'Pb', 'Fe', 2),
(14, 2, 'What is the largest desert in the world?', 'Sahara', 'Gobi', 'Arctic', 'Kalahari', 1),
(15, 2, 'What is the chemical symbol for Water?', 'H2O', 'O2', 'CO2', 'HO', 1),
(16, 2, 'What is the speed of light?', '299,792,458 m/s', '150,000,000 m/s', '9,460,730,472,580.8 km/year', '500,000,000 m/s', 1),
(17, 2, 'Which is the largest mammal in the world?', 'Elephant', 'Blue Whale', 'Giraffe', 'Polar Bear', 2),
(18, 2, 'Which planet is closest to the Sun?', 'Venus', 'Mars', 'Mercury', 'Earth', 3),
(19, 2, 'Which continent has the largest population?', 'Asia', 'Africa', 'Europe', 'North America', 1),
(20, 2, 'question', 'option1', 'option2', 'option3', 'option4', 0),
(21, 2, 'Which element has the atomic number 1?', 'Helium', 'Hydrogen', 'Oxygen', 'Carbon', 2),
(22, 2, 'Which is the longest river in the world?', 'Nile', 'Amazon', 'Yangtze', 'Mississippi', 1),
(23, 2, 'Who painted the Mona Lisa?', 'Vincent van Gogh', 'Pablo Picasso', 'Leonardo da Vinci', 'Claude Monet', 3),
(24, 2, 'Which country hosted the 2016 Summer Olympics?', 'China', 'Brazil', 'USA', 'Germany', 2),
(25, 2, 'What is the largest ocean on Earth?', 'Atlantic', 'Indian', 'Pacific', 'Arctic', 3),
(26, 2, 'Which programming language is used for web development?', 'C++', 'Python', 'JavaScript', 'Java', 3),
(27, 2, 'Which planet is known as the Red Planet?', 'Earth', 'Mars', 'Jupiter', 'Venus', 2),
(28, 2, 'What is the capital of Japan?', 'Beijing', 'Seoul', 'Tokyo', 'Bangkok', 3),
(29, 2, 'What is the chemical symbol for Gold?', 'Ag', 'Au', 'Pb', 'Fe', 2),
(30, 2, 'What is the largest desert in the world?', 'Sahara', 'Gobi', 'Arctic', 'Kalahari', 1),
(31, 2, 'What is the chemical symbol for Water?', 'H2O', 'O2', 'CO2', 'HO', 1),
(32, 2, 'What is the speed of light?', '299,792,458 m/s', '150,000,000 m/s', '9,460,730,472,580.8 km/year', '500,000,000 m/s', 1),
(33, 2, 'Which is the largest mammal in the world?', 'Elephant', 'Blue Whale', 'Giraffe', 'Polar Bear', 2),
(34, 2, 'Which planet is closest to the Sun?', 'Venus', 'Mars', 'Mercury', 'Earth', 3),
(35, 2, 'Which continent has the largest population?', 'Asia', 'Africa', 'Europe', 'North America', 1),
(36, 2, 'Who wrote \'To Kill a Mockingbird\'?', 'Harper Lee', 'J.K. Rowling', 'Ernest Hemingway', 'Mark Twain', 1),
(37, 2, 'What is the capital of Canada?', 'Toronto', 'Vancouver', 'Ottawa', 'Montreal', 3),
(38, 2, 'Which country is famous for the Eiffel Tower?', 'Germany', 'Italy', 'France', 'Spain', 3),
(39, 2, 'Which gas is most abundant in the Earth?s atmosphere?', 'Oxygen', 'Nitrogen', 'Carbon Dioxide', 'Hydrogen', 2),
(40, 2, 'Who was the first president of the United States?', 'Abraham Lincoln', 'George Washington', 'Thomas Jefferson', 'John Adams', 2),
(41, 2, 'Which language is primarily spoken in Brazil?', 'Spanish', 'Portuguese', 'English', 'French', 2),
(42, 2, 'What is the hardest natural substance on Earth?', 'Gold', 'Iron', 'Diamond', 'Platinum', 3),
(43, 2, 'What is the largest planet in our solar system?', 'Earth', 'Mars', 'Jupiter', 'Saturn', 3),
(44, 2, 'What is 5 + 7?', '10', '12', '11', '13', 2),
(45, 2, 'Which country is known as the Land of the Rising Sun?', 'China', 'Thailand', 'Japan', 'South Korea', 3),
(46, 2, 'What is the national currency of Japan?', 'Yen', 'Won', 'Dollar', 'Peso', 1),
(47, 2, 'Which organ in the human body is primarily responsible for filtering blood?', 'Heart', 'Lungs', 'Kidneys', 'Liver', 3),
(48, 2, 'What is the capital of France?', 'Berlin', 'Madrid', 'Paris', 'Rome', 3),
(49, 2, 'Who is known as the father of computers?', 'Bill Gates', 'Charles Babbage', 'Steve Jobs', 'Alan Turing', 2),
(50, 2, 'Which is the smallest continent by land area?', 'Europe', 'Australia', 'Antarctica', 'South America', 2),
(51, 2, 'What is the freezing point of water?', '0?C', '32?C', '100?C', '273?C', 1),
(52, 2, 'Who developed the theory of relativity?', 'Isaac Newton', 'Albert Einstein', 'Galileo Galilei', 'Nikola Tesla', 2),
(53, 2, 'Who wrote \'Pride and Prejudice\'?', 'Charles Dickens', 'Jane Austen', 'Mark Twain', 'Emily Bronte', 2),
(54, 2, 'What is the capital of Italy?', 'Milan', 'Florence', 'Venice', 'Rome', 4),
(55, 2, 'Which city is known as the Big Apple?', 'Los Angeles', 'San Francisco', 'New York', 'Chicago', 3),
(56, 2, 'What is the square root of 64?', '6', '8', '10', '12', 2),
(58, 4, 'CCC stand for ?', '1', '3', '4', '2', 1),
(59, 4, '2', 'scvd', 'dcv', 'adcv', 'dvas', 4),
(60, 5, 'sdcv', 'sdcv', 'sdv', 'sdv', 'sdv', 1),
(61, 5, 'asdcv', 'asc', 'asc', 'asc', 'acs', 3),
(62, 4, 'asc', 'ascx', 'asc', 'asc', 'asc', 1),
(63, 5, 'question', 'option1', 'option2', 'option3', 'option4', 0),
(64, 5, 'Which element has the atomic number 1?', 'Helium', 'Hydrogen', 'Oxygen', 'Carbon', 2),
(65, 5, 'Which is the longest river in the world?', 'Nile', 'Amazon', 'Yangtze', 'Mississippi', 1),
(66, 5, 'Who painted the Mona Lisa?', 'Vincent van Gogh', 'Pablo Picasso', 'Leonardo da Vinci', 'Claude Monet', 3),
(67, 5, 'Which country hosted the 2016 Summer Olympics?', 'China', 'Brazil', 'USA', 'Germany', 2),
(68, 5, 'What is the largest ocean on Earth?', 'Atlantic', 'Indian', 'Pacific', 'Arctic', 3),
(69, 5, 'Which programming language is used for web development?', 'C++', 'Python', 'JavaScript', 'Java', 3),
(70, 5, 'Which planet is known as the Red Planet?', 'Earth', 'Mars', 'Jupiter', 'Venus', 2),
(71, 5, 'What is the capital of Japan?', 'Beijing', 'Seoul', 'Tokyo', 'Bangkok', 3),
(72, 5, 'What is the chemical symbol for Gold?', 'Ag', 'Au', 'Pb', 'Fe', 2),
(73, 5, 'What is the largest desert in the world?', 'Sahara', 'Gobi', 'Arctic', 'Kalahari', 1),
(74, 5, 'What is the chemical symbol for Water?', 'H2O', 'O2', 'CO2', 'HO', 1),
(75, 5, 'What is the speed of light?', '299,792,458 m/s', '150,000,000 m/s', '9,460,730,472,580.8 km/year', '500,000,000 m/s', 1),
(76, 5, 'Which is the largest mammal in the world?', 'Elephant', 'Blue Whale', 'Giraffe', 'Polar Bear', 2),
(77, 5, 'Which planet is closest to the Sun?', 'Venus', 'Mars', 'Mercury', 'Earth', 3),
(78, 5, 'Which continent has the largest population?', 'Asia', 'Africa', 'Europe', 'North America', 1),
(79, 5, 'Who wrote \'To Kill a Mockingbird\'?', 'Harper Lee', 'J.K. Rowling', 'Ernest Hemingway', 'Mark Twain', 1),
(80, 5, 'What is the capital of Canada?', 'Toronto', 'Vancouver', 'Ottawa', 'Montreal', 3),
(81, 5, 'Which country is famous for the Eiffel Tower?', 'Germany', 'Italy', 'France', 'Spain', 3),
(82, 5, 'Which gas is most abundant in the Earth?s atmosphere?', 'Oxygen', 'Nitrogen', 'Carbon Dioxide', 'Hydrogen', 2),
(83, 5, 'Who was the first president of the United States?', 'Abraham Lincoln', 'George Washington', 'Thomas Jefferson', 'John Adams', 2),
(84, 5, 'Which language is primarily spoken in Brazil?', 'Spanish', 'Portuguese', 'English', 'French', 2),
(85, 5, 'What is the hardest natural substance on Earth?', 'Gold', 'Iron', 'Diamond', 'Platinum', 3),
(86, 5, 'What is the largest planet in our solar system?', 'Earth', 'Mars', 'Jupiter', 'Saturn', 3),
(87, 5, 'What is 5 + 7?', '10', '12', '11', '13', 2),
(88, 5, 'Which country is known as the Land of the Rising Sun?', 'China', 'Thailand', 'Japan', 'South Korea', 3),
(89, 5, 'What is the national currency of Japan?', 'Yen', 'Won', 'Dollar', 'Peso', 1),
(90, 5, 'Which organ in the human body is primarily responsible for filtering blood?', 'Heart', 'Lungs', 'Kidneys', 'Liver', 3),
(91, 5, 'What is the capital of France?', 'Berlin', 'Madrid', 'Paris', 'Rome', 3),
(92, 5, 'Who is known as the father of computers?', 'Bill Gates', 'Charles Babbage', 'Steve Jobs', 'Alan Turing', 2),
(93, 5, 'Which is the smallest continent by land area?', 'Europe', 'Australia', 'Antarctica', 'South America', 2),
(94, 5, 'What is the freezing point of water?', '0?C', '32?C', '100?C', '273?C', 1),
(95, 5, 'Who developed the theory of relativity?', 'Isaac Newton', 'Albert Einstein', 'Galileo Galilei', 'Nikola Tesla', 2),
(96, 5, 'Who wrote \'Pride and Prejudice\'?', 'Charles Dickens', 'Jane Austen', 'Mark Twain', 'Emily Bronte', 2),
(97, 5, 'What is the capital of Italy?', 'Milan', 'Florence', 'Venice', 'Rome', 4),
(98, 5, 'Which city is known as the Big Apple?', 'Los Angeles', 'San Francisco', 'New York', 'Chicago', 3),
(99, 5, 'What is the square root of 64?', '6', '8', '10', '12', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_sessions`
--
ALTER TABLE `exam_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_sessions`
--
ALTER TABLE `exam_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_sessions`
--
ALTER TABLE `exam_sessions`
  ADD CONSTRAINT `exam_sessions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
