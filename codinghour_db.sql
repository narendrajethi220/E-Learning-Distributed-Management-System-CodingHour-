-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 05:39 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codinghour_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'example singh', 'example@gmail.com', 'asdf;lkjh');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8_bin NOT NULL,
  `course_desc` text COLLATE utf8_bin NOT NULL,
  `course_author` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_img` text COLLATE utf8_bin NOT NULL,
  `course_duration` text COLLATE utf8_bin NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_original_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES
(1, 'Machine Learning', 'This provides an introduction to the principles and practice of machine learning, covering topics such as supervised and unsupervised learning, deep learning, and model evaluation.                              ', 'Aman Adhikari', '../images/courseImg/Artificial Intelligence.svg', '15+ hour', 999, 1999),
(3, 'Front End Development', '            This course covers overall concept of HTML, CSS and JavaScript . It also contains 2 minor projects for better understanding.                                                                                                            ', 'Ishwar Singh Bhandari', '../images/courseImg/Front End Development.svg', '10+ hour', 799, 1499),
(4, 'Graphics Designing', 'It uses typography, imagery, and layout to visually communicate\r\n              ideas and information.', 'Aryan', '../images/courseImg/Graphic Designing.svg', '10+ hour', 699, 1499),
(5, 'Responsive UI Design', 'Responsive web design adapts layout to fit any device screen size for optimal user experience.                                                  ', 'Ishwar Singh Bhandari', '../images/courseImg/Responsive UI Design.svg', '8+hour', 499, 999),
(6, 'Full Stack Web Development', '                                    It involves designing, coding and maintaining both front-end and\r\n              back-end of website.                              ', 'Narendra Jethi', '../images/courseImg/Web Development.svg', '50+hours', 799, 1999),
(7, 'HTML,CSS Full Course', 'It involves skeleton, coding and maintaining both skeleton and\r\n              styling of website.', 'Ishwar Singh Bhandari', '../images/courseImg/HTML CSS.svg', '8+hour', 499, 999),
(8, 'Artificial Intelligence', 'In this you will get familiar with basics of Artificial\r\n              Intelligece/Artificial intelligence leverages computers and\r\n              machines to mimic the problem-solving and decision-making\r\n              capabilities of the human mind.', 'Kavya', '../images/courseImg/Artificial Intelligence.svg', '21 hour', 799, 1699),
(9, 'Database Development Course', 'Study of database design, management, and data storage. In this\r\n              you will get familiar with MySQL database.', 'Narendra Jethi', '../images/courseImg/Database Development.svg', '14+hour', 699, 1499),
(10, 'Javascript Framework', 'It includes all JS Frameworks. It cover topic from basics to\r\n              intermediate level to give you the best learning experience.', 'Aditi', '../images/courseImg/Javascript Framework.svg', '25+hour', 999, 1999),
(11, 'Data Science', 'Full Begineer to intermediate leve course. You will get familiar\r\n              with various technology concept related to Data science helps you\r\n              to Crack your dream job.It requires no Pre-requisite to enroll in\r\n              this course.', 'Aman Adhikari', '../images/courseImg/Data Science.svg', '20+hour', 799, 1599),
(12, 'Cloud Computing & Hosting', 'It involves Study of the delivery of computing resources over the\r\n              internet.', 'Narendra Jethi', '../images/courseImg/Cloud Hosting.svg', '15+hour', 899, 1999),
(13, 'Operating System ', 'It includes study of the software that controls the hardware of a\r\n              computer.This contain basic to intermediate knowledge of Operating\r\n              System.', 'Diya', '../images/courseImg/Operating System.svg', '15+hour', 799, 1499),
(14, 'Networking', 'Study of the design and management of computer networks', 'Rajesh', '../images/courseImg/Networking.svg', '10+hour', 699, 1499),
(15, 'React Library', 'No Pre-requisite requires. Begineer to Advance level course.', 'Narendra Jethi', '../images/courseImg/React Library.svg', '8+ hour', 899, 1999);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `respmsg` text COLLATE utf8_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(1, 'ORDS99994328', 'narendrajethi220@gmail.com', 1, 'Success', 'Done', 999, '2029-04-23'),
(2, 'ORDS65891556', 'narendrajethi220@gmail.com', 3, 'Success', 'Done', 799, '2029-04-23'),
(12, 'ORDS61900650', 'narendrajethi220@gmail.com', 9, 'Success', 'Done', 699, '2016-05-23'),
(13, 'ORDS63397588', 'binaykholiyaoo7@gmail.com', 1, 'Success', 'Done', 999, '2024-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text COLLATE utf8_bin NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text COLLATE utf8_bin NOT NULL,
  `lesson_desc` text COLLATE utf8_bin NOT NULL,
  `lesson_link` text COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(1, 'Introduction to Web Development', 'An introduction to web development video typically covers the basics of web development and the technologies involved in creating websites. The video may cover topics such as HTML, CSS, and JavaScript, and how these technologies work together to create web pages. It may also discuss web development tools such as text editors, web browsers, and version control systems. The video may provide a high-level overview of web development, including how websites are hosted and deployed on servers. Overall, an introduction to web development video is a great way for beginners to get a taste of what web development is all about and what they can expect to learn as they delve deeper into the field.        ', '../lessonVId/introductiontowebdevelopment.mp4', 3, 'Front End Development'),
(3, ' Machine Learning Basics', 'An introduction to machine learning basics video usually covers fundamental concepts of machine learning, such as data preparation, feature engineering, model training, and evaluation. The video may start with an explanation of supervised learning and unsupervised learning, and how these approaches can be used to solve different types of problems. The video may also provide an overview of different algorithms used in machine learning, such as linear regression, logistic regression, and k-means clustering. The video may explain how to use machine learning libraries such as scikit-learn, TensorFlow, or PyTorch to implement machine learning models. Overall, an introduction to machine learning basics video is a great way for beginners to get started with machine learning and understand the essential concepts and techniques used in this field.                                                                ', '../lessonVId/MachineLearningBasics.mp4', 1, 'Machine Learning'),
(4, 'Linear Regression', '   Understanding the concept of regression\r\nSimple linear regression     ', '../lessonVId/SimpleLinearRegressionforMachineLearning.mp4', 1, 'Machine Learning'),
(5, ' Classification Algorithms  ', '         Classification Algorithms Basics\r\n', '../lessonVId/ClassificationAlgorithms.mp4', 1, 'Machine Learning'),
(6, 'Introduction to Supervised Learning', 'Supervised learning is a fundamental concept in machine learning, where the model learns from labeled training data to make predictions or classify new, unseen data points. In supervised learning, we have a dataset consisting of input features and corresponding target variables or labels.\r\nThe goal of supervised learning is to build a predictive model that can generalize well to unseen data. The process involves training the model on the labeled data, where it learns the underlying patterns and relationships between the input features and the target variable.\r\nDuring the training phase, the model adjusts its internal parameters using various algorithms and optimization techniques to minimize the prediction errors or maximize the likelihood of correct classifications. Once the model is trained, it can be used to make predictions or classify new instances by inputting their features.\r\nSupervised learning encompasses two main types of tasks: regression and classification. In regression, the target variable is continuous, and the model aims to predict a numeric value. In contrast, classification deals with discrete target variables, where the model assigns input instances to predefined classes or categories.\r\nSupervised learning has numerous real-world applications, such as predicting housing prices based on features like location and size (regression), or classifying emails as spam or not spam based on their content (classification). It forms the foundation for many advanced machine learning techniques and plays a crucial role in solving a wide range of prediction and decision-making problems.    ', '../lessonVId/IntroductiontoSupervisedLearning.mp4', 1, 'Machine Learning');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_msg` text COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`user_id`, `user_name`, `user_email`, `user_msg`, `time`) VALUES
(1, 'Aman Adhikari', 'amanadhikariaps@gmail.com', 'Hello, I am Aman. Machine Learning Enthusiast', '2022-02-27 10:00:00'),
(3, 'Narendra Singh ', 'narendrajethi220@gmail.com', 'Hello I am Narendra Singh. I am learning Front End Development', '2023-02-26 13:13:04'),
(4, 'Ishwar Singh', 'ishwarbhandari@gmail.com', 'Hello I am Ishwar and I am still learning recurssion', '2023-02-26 13:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_occ` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(1, 'Narendra Singh Jethi', 'narendrajethi220@gmail.com', 'asdf;lkjh', 'Student', '../images/studentsImg/Narendra Singh Jethi.png'),
(11, 'Aman Adhikari', 'amanadhikariaps@gmail.com', '12345', '', ''),
(16, 'Binay Singh', 'binaykholiyaoo7@gmail.com', 'bondlegacy@20', 'Engineer', '../images/studentsImg/Binay Singh.jpg'),
(17, 'Ishwar Singh Bhandari', 'ishwarbhandari@gmail.com', 'bhandari123', '', ''),
(23, 'abc', 'abcd@gmail.com', '456123', '', ''),
(24, 'xyz', 'xyzabc@gmail.com', 'asdf;lkjh', '', ''),
(25, 'asdf', 'asdf@gmail.com', 'asdf', '', ''),
(26, 'asdf', 'asdf2@gmail.com', '789654', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userpost`
--

CREATE TABLE `userpost` (
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_msg` text COLLATE utf8_bin NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `userpost`
--
ALTER TABLE `userpost`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
