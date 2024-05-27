-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 10:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(50) NOT NULL,
  `admin_name` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `admin_password` varchar(8) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `admin_mail` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `admin_location` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `type` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions_list`
--

CREATE TABLE `questions_list` (
  `id` int(11) NOT NULL,
  `subtopicid` int(20) NOT NULL,
  `question` longtext NOT NULL,
  `opt_a` longtext NOT NULL,
  `opt_b` longtext NOT NULL,
  `opt_c` longtext NOT NULL,
  `opt_d` longtext NOT NULL,
  `correct_ans` longtext NOT NULL,
  `explanation` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions_list`
--

INSERT INTO `questions_list` (`id`, `subtopicid`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `correct_ans`, `explanation`) VALUES
(1, 1, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Statement: \"All birds can fly.\"<br>\r\nWhich of the following conclusions can be logically inferred from the statement above?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Penguins cannot fly.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Bats are not birds.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Ostriches can fly.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">All flying creatures are birds.</span></p>', 'A.Penguins cannot fly.', 'The statement \"All birds can fly\" implies that the ability to fly is a characteristic of birds. Penguins, however, are birds that cannot fly, so option A is the correct conclusion. Option B is incorrect because bats are not birds, so their flying ability does not contradict the statement. Option C is incorrect because ostriches are birds that cannot fly. Option D is incorrect because it makes an overly broad generalization.'),
(2, 1, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Statement: \"Some mammals are carnivores.\"<br>\r\nWhich of the following conclusions must be true based on the statement above?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">All carnivores are mammals.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Some mammals are not carnivores.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">All mammals are carnivores.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">No conclusion can be drawn.</span></p>', 'B.Some mammals are not carnivores.', 'The statement \"Some mammals are carnivores\" implies that there are mammals that eat meat. However, it does not imply that all mammals are carnivores. Therefore, it can be concluded that there are mammals that are not carnivores, making option B correct. Option A is incorrect because it makes an overly broad generalization. Option C is incorrect because it contradicts the given statement. Option D is incorrect because a conclusion can indeed be drawn from the statement.'),
(3, 1, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Statement: \"All roses are flowers.\"<br>\r\nWhich of the following conclusions can be logically inferred from the statement above?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Some flowers are not roses.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">All flowers are roses.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Roses are the only type of flowers.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">All flowers are beautiful.</span></p>', 'A.Some flowers are not roses.', 'The statement \"All roses are flowers\" implies that roses belong to the category of flowers. However, it does not imply that all flowers are roses. Therefore, it can be concluded that there are flowers that are not roses, making option A correct. Option B is incorrect because it reverses the relationship between roses and flowers. Option C is incorrect because it implies an overly restrictive relationship. Option D is incorrect because it introduces an unrelated attribute (beauty) not mentioned in the statement.'),
(4, 2, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Tree : Forest :: Brick : ?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Building</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">House</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Wall</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">City</span></p>', 'C.Wall', 'Just as a tree is a component of a forest, a brick is a component of a wall. '),
(5, 2, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Pen : Write :: Knife : ?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Cut</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Cook</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Chop</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Eat</span></p>', 'A.Cut', 'A pen is used for writing, similarly, a knife is primarily used for cutting.'),
(6, 2, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Bird : Feather :: Cat : ?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Claw</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Tail</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Fur</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Whisker</span></p>', 'C.Fur', 'Feathers are characteristic features of birds, similarly, fur is characteristic of cats.'),
(7, 3, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Which of the following sentences is grammatically incorrect?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">She don\'t like ice cream.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">He plays tennis every Sunday.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">They is going to the movies tonight.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">We have been waiting for over an hour.</span></p>', 'C.They is going to the movies tonight.', ' \"They\" is a plural pronoun, so it should be followed by the plural verb \"are,\" making the correct sentence \"They are going to the movies tonight.\"'),
(8, 3, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Identify the sentence with the correct subject-verb agreement.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">The book on the table is interesting.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">The books on the table are interesting.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">The book on the table are interesting.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">The books on the table is interesting.</span></p>', 'B.The books on the table are interesting.', ' \"Books\" is a plural noun, so the verb should also be plural, making \"are\" the correct verb in this context.'),
(9, 3, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">What is the correct past tense form of the verb \"to go\"?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Went</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Gone</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Going</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Goes</span></p>', 'A.Went', 'The past tense of \"to go\" is \"went.\"'),
(10, 4, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">What is the synonym of \"exacerbate\"?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Alleviate</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Aggravate</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Elucidate</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Mitigate</span></p>', 'B.Aggravate', ' \"Exacerbate\" means to make a problem, bad situation, or negative feeling worse. The word \"aggravate\" has a similar meaning, so it is the correct synonym.'),
(11, 4, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">What does the word \"ephemeral\" mean?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Lasting for a long time</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Brief or short-lived</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Permanent</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Infinite</span></p>', 'B.Brief or short-lived', ' \"Ephemeral\" refers to something that is transient or lasting for a very short time. Options A, C, and D suggest permanence or long duration, which is opposite to the meaning of \"ephemeral.\"'),
(12, 4, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Which word is an antonym of \"benevolent\"?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Malevelent</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Altruistic</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Kind</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Generous</span></p>', 'A.Malevolent', '\"Benevolent\" means showing kindness or goodwill. The word \"malevolent\" means having or showing a wish to do evil to others, thus making it the antonym of \"benevolent.\" Options B, C, and D are synonyms or closely related words to \"benevolent.\"'),
(13, 5, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Which of the following is the longest river in the world?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Amazon</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Nile</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Yangtze</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Mississippi</span></p>', 'B.Nile', ' The Nile River, flowing through northeastern Africa, is considered the longest river in the world, with a length of approximately 6,650 kilometers (4,130 miles). It passes through eleven countries, including Egypt, Sudan, and Ethiopia.'),
(14, 5, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Which of the following countries is not located in the Ring of Fire?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Japan</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Chile</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Indonesia</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Italy</span></p>', 'D.Italy', 'The Ring of Fire is a horseshoe-shaped area in the Pacific Ocean basin known for its high volcanic and seismic activity. While Japan, Chile, and Indonesia are all located within the Ring of Fire, Italy is not. Italy is more famous for its historical sites and cultural landmarks rather than geological activity.'),
(15, 5, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">What is the capital city of Australia?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Melbourne</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Sydney</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Canberra</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Brisbane</span></p>', ' C.Canberra', 'Canberra is the capital city of Australia. While Sydney and Melbourne are more populous and globally recognized cities, Canberra was chosen as the capital in 1908 due to its location between Sydney and Melbourne, resolving their rivalry. It was specifically built to serve as the capital of Australia.'),
(16, 6, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Which country recently became the first in the world to approve a COVID-19 vaccine for children under the age of five?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">US</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">China</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Russia</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">UK</span></p>', 'A.US', 'In February 2024, the United States became the first country to approve a COVID-19 vaccine specifically for children aged six months to four years. The vaccine, developed by Pfizer-BioNTech, was granted emergency use authorization by the U.S. Food and Drug Administration (FDA). This development marked a significant step in efforts to protect young children from the virus.'),
(17, 6, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Which country recently experienced widespread protests and strikes following the government\'s decision to implement austerity measures and cut subsidies?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Brazil</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">France</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">India</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Lebanon</span></p>', 'D.Lebanon', 'In March 2024, Lebanon witnessed large-scale protests and strikes after the government announced plans to implement austerity measures and cut subsidies on essential goods such as fuel and bread. The decision came amid the country\'s ongoing economic crisis, characterized by high inflation, unemployment, and a depreciating currency. The protests underscored public frustration with the government\'s handling of the economic situation.'),
(18, 6, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Which global event was recently postponed due to concerns over the safety and security of participants amidst escalating tensions in the host region?\r\n</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Olympic Games</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">FIFA World Cup</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">G20 Summit</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">United Nations General Assembly</span></p>', 'B.FIFA World Cup', 'In April 2024, FIFA announced the postponement of the FIFA World Cup, scheduled to be held in Qatar later that year, to January 2025. The decision was made due to escalating tensions in the region, particularly concerns over security and safety for players, officials, and fans. The postponement aimed to ensure a secure and successful tournament, reflecting the organization\'s commitment to prioritizing the welfare of participants and spectators.'),
(19, 7, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Solve for x in the equation 3x+5=17.\r\n</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x=4</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x=6</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x=7</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x=12</span></p>', 'B.x=6', 'To solve for x, subtract 5 from both sides of the equation to isolate 3x, then divide both sides by 3 to solve for x. So, 3x=17−5=12, then x=6.'),
(20, 7, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Solve for x in the equation 2x+7=15.</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x=4</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x=5</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x=6</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x=8</span></p>', 'C.x=6', 'To solve for \r\nx, subtract 7 from both sides of the equation to isolate 2x, then divide both sides by 2 to solve for x. So, 2x=15−7=8, then 𝑥=4.'),
(21, 7, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">If 2x+3y=14 and 4x−y=5, what is the value of x+y?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x+y=4</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x+y=5</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x+y=6</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">x+y=8</span></p>', 'C.x+y=6', 'To find the value of x+y, solve the given system of equations. Multiply the second equation by 3, then add it to the first equation to eliminate y. After finding x, substitute its value into one of the original equations to find y. Finally, add x and \r\ny together. After solving, you\'ll find x=3 and y=4, so x+y=3+4=7.'),
(22, 8, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">A train travels at a speed of 72 km/h. It passes a pole in 15 seconds. What is the length of the train?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">150 meters</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">180 meters</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">200 meters</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">240 meters</span></p>', 'C.200 meters', 'Since the train passes a pole in 15 seconds, its length is the distance it covers in that time. To find the distance, we use the formula:\r\nDistance=Speed×Time\r\nGiven, speed = 72 km/h and time = 15 seconds.\r\nFirst, let\'s convert the speed from km/h to m/s:\r\n72 km/h= 72×1000/3600 =20 m/s\r\nNow, using the formula:\r\nDistance=20 m/s× 15 s=300 m\r\nTherefore, the length of the train is 300 meters.'),
(23, 8, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">A train 150 meters long is running at a speed of 54 km/h. How long will it take to cross a platform 300 meters long?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">15 seconds</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">27 seconds</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">30 seconds</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">36 seconds</span></p>', 'C.30 seconds', 'To cross the platform, the train needs to cover its own length plus the length of the platform. So, the total distance to be covered is 150 meters (train length) + 300 meters (platform length) = 450 meters.\r\nUsing the formula:\r\nTime= Distance/Speed\r\n​Given, distance = 450 meters and speed = 54 km/h.\r\nFirst, let\'s convert the speed from km/h to m/s:\r\n54 km/h= 54×1000/3600=15 m/s\r\nNow, using the formula:\r\nTime= 450/15 =30 seconds\r\nTherefore, it will take 30 seconds for the train to cross the platform.'),
(24, 8, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Two trains, each 100 meters long, are running in opposite directions on parallel tracks. If their speeds are 54 km/h and 72 km/h respectively, in what time will they cross each other?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">6 seconds</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">8 seconds</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">10 seconds</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">12 seconds</span></p>', 'B.8 seconds', 'When two trains are moving in opposite directions, the distance they cover relative to each other is the sum of their lengths.\r\nSo, the total distance to be covered is 100 meters (first train length) + 100 meters (second train length) = 200 meters.\r\nGiven, the relative speed of the trains = sum of their speeds = 54+72=126 km/h.\r\nFirst, let\'s convert the relative speed from km/h to m/s:\r\n126 km/h= 126×1000/3600 =35 m/s\r\nUsing the formula:\r\nTime= Distance/Relative Speed\r\n​Time= 200/35 =5.71 seconds (approx)\r\nTherefore, it will take approximately 6 seconds for the trains to cross each other.'),
(25, 9, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Pattern: 2, 4, 8, 16, ?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">24</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">32</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">64</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">128</span></p>', 'B.32', 'Each number is double the previous one. So, the next number in the sequence would be 16 * 2 = 32.'),
(26, 9, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Pattern: 3, 6, 9, 12, ?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">14</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">15</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">16</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">18</span></p>', 'D.18', ' Each number is increasing by 3. So, the next number in the sequence would be 12 + 3 = 15.'),
(27, 9, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Pattern: 5, 10, 15, 20, ?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">22</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">25</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">30</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">35</span></p>', 'B.25', 'Each number is increasing by 5. So, the next number in the sequence would be 20 + 5 = 25.'),
(28, 10, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">If all cats have tails, and Mittens is a cat, what can you deduce about Mittens?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Mittens has a tail</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Mittens does not have a tail</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Mittens might or might not have a tail</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Not enough information to deduce</span></p>', 'A.Mittens has a tail', ' In deductive reasoning, if all members of a group possess a certain characteristic, then any individual belonging to that group must also possess that characteristic. Therefore, since all cats have tails, Mittens, who is a cat, must have a tail.'),
(29, 10, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">If all rectangles have four sides, and this shape has four sides, what can you deduce about this shape?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">This shape is a rectangle</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">This shape is not a rectangle</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">This shape might or might not be a rectangle</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Not enough information to deduce</span></p>', 'A.This shape is a rectangle', 'In deductive reasoning, if all members of a group possess a certain characteristic, then any individual possessing that characteristic must belong to that group. Since all rectangles have four sides, and this shape has four sides, it must be a rectangle.'),
(30, 10, '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">If all swans are white, and this bird is black, what can you deduce about this bird?</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">This bird is a swan</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">This bird is not a swan</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">This bird might or might not be a swan</span></p>', '<p><span style=\"font-family: arial; font-size: 14px; background-color: #ffffff;\">Not enough information to deduce</span></p>', 'B.This bird is not a swan', 'In deductive reasoning, if all members of a group possess a certain characteristic, then any individual lacking that characteristic cannot belong to that group. Since all swans are white, and this bird is black, it cannot be a swan.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Questions_solved` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`Questions_solved`)),
  `Reasoning` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`Reasoning`)),
  `English` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`English`)),
  `General` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`General`)),
  `Aptitude` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`Aptitude`)),
  `Logical` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`Logical`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `mobile`, `isActive`, `created_at`, `updated_at`, `Questions_solved`, `Reasoning`, `English`, `General`, `Aptitude`, `Logical`) VALUES
(23, 'achref', 'achref', 'achref.nefzazoui@gmail.com', '3ea543d29ad3c1c09fcfbdda3f2f0617c50ab138', '54852852', 0, '2020-12-19 14:35:56', '2020-12-19 14:35:56', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'ahmed', 'benahmed', 'achme@gmail.com', '7f0c9d56d40c3cc1e23e0113d5377779a4de86ff', '54277528', 0, '2020-12-19 15:13:39', '2020-12-19 15:13:39', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Fathi', 'fathiA', 'fathianh@gmail.com', '0a859b9a4ebbde4f63383bca7e34890985782348', '54672828', 0, '2020-12-19 15:15:52', '2020-12-19 15:15:52', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Makrem', 'makrem', 'makrem@gmail.com', 'adef7009a84a71c226ddf68671e929d68a707762', '42551771', 0, '2020-12-19 15:16:59', '2020-12-19 15:16:59', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Sirin', 'Sirin', 'Sirin@gmail.com', '03ee5fda2eae80be34c0142fe28ac6401e63324c', '23451671', 0, '2020-12-19 15:17:34', '2020-12-19 15:17:34', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Nithin', 'Nithin', 'nithin@gmail.com', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b', '1234567890', 0, '2024-05-02 07:34:25', '2024-05-02 07:34:25', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Shreyas Anand', 'Shreyas', 'shreyas@gmail.com', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b', '1234567890', 0, '2024-05-02 08:33:03', '2024-05-02 08:33:03', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Sathya', 'Sathya', 'sathya30@gmail.com', 'd9f4461c3a458e3c0ae998698f17c6472884c850', '8296330205', 0, '2024-05-02 09:19:43', '2024-05-02 09:19:43', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Shivani Achanta', 'Shivani', 'shivaniachanta20@gmail.com', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b', '8296330404', 0, '2024-05-26 16:25:35', '2024-05-26 16:25:35', '[\"10\",\"14\",\"18\",\"15\",\"13\",\"11\",\"19\",\"1\",\"6\",\"5\",\"2\",\"3\",\"4\",\"9\",\"7\",\"12\",\"8\",\"17\",\"27\",\"29\",\"28\",\"25\",\"30\",\"26\"]', '[\"1\",\"6\",\"5\",\"2\",\"3\",\"4\"]', '[\"10\",\"11\",\"9\",\"7\",\"12\",\"8\"]', '[\"14\",\"18\",\"15\",\"13\",\"17\"]', '[\"19\"]', '[\"27\",\"29\",\"28\",\"25\",\"30\",\"26\"]');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic` longtext NOT NULL,
  `subtopic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic`, `subtopic`) VALUES
(1, 'Reasoning', 'Verbal Reasoning'),
(2, 'Reasoning', 'Analogy'),
(3, 'English', 'Grammar'),
(4, 'English', 'Vocabulary'),
(5, 'General Knowledge', 'Geography'),
(6, 'General Knowledge', 'Current Affairs'),
(7, 'Aptitude', 'Algebra'),
(8, 'Aptitude', 'Problems on Trains'),
(9, 'Logical', 'Inductive Reasoning'),
(10, 'Logical', 'Deductive Reasoning');

-- --------------------------------------------------------

--
-- Table structure for table `users_solved`
--

CREATE TABLE `users_solved` (
  `user_id` int(11) NOT NULL,
  `solved_questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`solved_questions`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions_list`
--
ALTER TABLE `questions_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions_list`
--
ALTER TABLE `questions_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
