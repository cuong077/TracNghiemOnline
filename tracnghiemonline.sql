-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 12:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `AnswerId` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Is_correct` tinyint(4) NOT NULL,
  `QuestionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `ChapterId` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GradeSubjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `DocumentId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ClassId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ExamId` int(11) NOT NULL,
  `Description` text NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `AmountOfQuestion` datetime NOT NULL,
  `TimeStart` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ExamTypeId` int(11) NOT NULL,
  `ExamTimeId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examtime`
--

CREATE TABLE `examtime` (
  `ExamTimeId` int(11) NOT NULL,
  `Time` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examtype`
--

CREATE TABLE `examtype` (
  `ExamTypeId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `GradeId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gradesubject`
--

CREATE TABLE `gradesubject` (
  `GradeSubjectId` int(11) NOT NULL,
  `GradeId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lession`
--

CREATE TABLE `lession` (
  `LessionId` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChapterId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionId` int(11) NOT NULL,
  `LessionId` int(11) NOT NULL,
  `Content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ResultId` int(11) NOT NULL,
  `TimeJoin` datetime NOT NULL,
  `UserId` int(11) NOT NULL,
  `ExamId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Birthday` datetime NOT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Password` varchar(32) NOT NULL,
  `RoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `useranswerquestion`
--

CREATE TABLE `useranswerquestion` (
  `UserAnswerQuestionId` int(11) NOT NULL,
  `ResultId` int(11) NOT NULL,
  `QuestionId` int(11) NOT NULL,
  `AnswerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userclass`
--

CREATE TABLE `userclass` (
  `UserClassId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `DateJoin` datetime NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`AnswerId`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`ChapterId`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassId`),
  ADD KEY `FK_Class_User_UserId` (`UserId`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`DocumentId`),
  ADD KEY `FK_Document_Class_ClassId` (`ClassId`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ExamId`),
  ADD KEY `FK_Exam_User_UserId` (`UserId`),
  ADD KEY `FK_Exam_ExamType_ExamTypeId` (`ExamTypeId`),
  ADD KEY `FK_Exam_ExamTime_ExamTimeId` (`ExamTimeId`),
  ADD KEY `FK_Exam_Class_ClassId` (`ClassId`);

--
-- Indexes for table `examtime`
--
ALTER TABLE `examtime`
  ADD PRIMARY KEY (`ExamTimeId`);

--
-- Indexes for table `examtype`
--
ALTER TABLE `examtype`
  ADD PRIMARY KEY (`ExamTypeId`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`GradeId`);

--
-- Indexes for table `gradesubject`
--
ALTER TABLE `gradesubject`
  ADD PRIMARY KEY (`GradeSubjectId`),
  ADD KEY `FK_GradeSubject_Grade_GradeId` (`GradeId`),
  ADD KEY `FK_GradeSubject_Subject_SubjectId` (`SubjectId`);

--
-- Indexes for table `lession`
--
ALTER TABLE `lession`
  ADD PRIMARY KEY (`LessionId`),
  ADD KEY `FK_Lession_Chapter_ChapterId` (`ChapterId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionId`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ResultId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `FK_User_Role_RoleId` (`RoleId`);

--
-- Indexes for table `useranswerquestion`
--
ALTER TABLE `useranswerquestion`
  ADD PRIMARY KEY (`UserAnswerQuestionId`);

--
-- Indexes for table `userclass`
--
ALTER TABLE `userclass`
  ADD PRIMARY KEY (`UserClassId`),
  ADD KEY `FK_UserClass_User_UserId` (`UserId`),
  ADD KEY `FK_UserClass_Class_ClassId` (`ClassId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `AnswerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `ChapterId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `DocumentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ExamId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examtime`
--
ALTER TABLE `examtime`
  MODIFY `ExamTimeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examtype`
--
ALTER TABLE `examtype`
  MODIFY `ExamTypeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `GradeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gradesubject`
--
ALTER TABLE `gradesubject`
  MODIFY `GradeSubjectId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lession`
--
ALTER TABLE `lession`
  MODIFY `LessionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `ResultId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useranswerquestion`
--
ALTER TABLE `useranswerquestion`
  MODIFY `UserAnswerQuestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userclass`
--
ALTER TABLE `userclass`
  MODIFY `UserClassId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--



--
-- Indexes for table `answers`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- GradeSubject
ALTER TABLE GradeSubject
  ADD CONSTRAINT FK_GradeSubject_Grade_GradeId
  FOREIGN KEY (GradeId) REFERENCES Grade(GradeId); 

ALTER TABLE GradeSubject
  ADD CONSTRAINT FK_GradeSubject_Subject_SubjectId
  FOREIGN KEY (SubjectId) REFERENCES Subject(SubjectId); 

-- Chapter
ALTER TABLE Chapter
  ADD CONSTRAINT FK_Chapter_GradeSubject_GradeSubjectId
  FOREIGN KEY (GradeSubjectId) REFERENCES GradeSubject(GradeSubjectId); 

-- Lession
ALTER TABLE Lession
  ADD CONSTRAINT FK_Lession_Chapter_ChapterId
  FOREIGN KEY (ChapterId) REFERENCES Chapter(ChapterId); 

-- User
ALTER TABLE User
  ADD CONSTRAINT FK_User_Role_RoleId
  FOREIGN KEY (RoleId) REFERENCES Role(RoleId); 

-- Class
ALTER TABLE Class
  ADD CONSTRAINT FK_Class_User_UserId
  FOREIGN KEY (UserId) REFERENCES User(UserId); 

-- UserClass
ALTER TABLE UserClass
  ADD CONSTRAINT FK_UserClass_User_UserId
  FOREIGN KEY (UserId) REFERENCES User(UserId); 

ALTER TABLE UserClass
  ADD CONSTRAINT FK_UserClass_Class_ClassId
  FOREIGN KEY (ClassId) REFERENCES Class(ClassId);

-- Document
ALTER TABLE Document
  ADD CONSTRAINT FK_Document_Class_ClassId
  FOREIGN KEY (ClassId) REFERENCES Class(ClassId);

-- Exam
ALTER TABLE Exam
  ADD CONSTRAINT FK_Exam_User_UserId
  FOREIGN KEY (UserId) REFERENCES User(UserId);

ALTER TABLE Exam
  ADD CONSTRAINT FK_Exam_ExamType_ExamTypeId
  FOREIGN KEY (ExamTypeId) REFERENCES ExamType(ExamTypeId);

ALTER TABLE Exam
  ADD CONSTRAINT FK_Exam_ExamTime_ExamTimeId
  FOREIGN KEY (ExamTimeId) REFERENCES ExamTime(ExamTimeId);

ALTER TABLE Exam
  ADD CONSTRAINT FK_Exam_Class_ClassId
  FOREIGN KEY (ClassId) REFERENCES Class(ClassId);

-- Question
ALTER TABLE Question
  ADD CONSTRAINT FK_Question_Lession_LessionId
  FOREIGN KEY (LessionId) REFERENCES Lession(LessionId);

-- Answer
ALTER TABLE Answer
  ADD CONSTRAINT FK_Answer_Question_QuestionId
  FOREIGN KEY (QuestionId) REFERENCES Question(QuestionId);

-- Result
ALTER TABLE Result
  ADD CONSTRAINT FK_Result_Exam_ExamId
  FOREIGN KEY (ExamId) REFERENCES Exam(ExamId);

ALTER TABLE Result
  ADD CONSTRAINT FK_Result_User_UserId
  FOREIGN KEY (UserId) REFERENCES User(UserId);

-- UserAnswerQuestion
ALTER TABLE UserAnswerQuestion
  ADD CONSTRAINT FK_UserAnswerQuestion_Result_ResultId
  FOREIGN KEY (ResultId) REFERENCES Result(ResultId);

ALTER TABLE UserAnswerQuestion
  ADD CONSTRAINT FK_UserAnswerQuestion_Question_QuestionId
  FOREIGN KEY (QuestionId) REFERENCES Question(QuestionId);

ALTER TABLE UserAnswerQuestion
  ADD CONSTRAINT FK_UserAnswerQuestion_Answer_AnswerId
  FOREIGN KEY (AnswerId) REFERENCES Answer(AnswerId);


-- GENERATE PROCEDURE
-- GRADE

-- 1. Get all grades
DELIMITER //

CREATE PROCEDURE Grade_GetAllGrades()
BEGIN
	SELECT GradeId, Name, Description FROM Grade;
END //

DELIMITER ;

-- 2. Get grades with id
DELIMITER //

CREATE PROCEDURE Grade_GetGrade(IN gradeIdToSearch INT)
BEGIN
	SELECT Name, Description FROM Grade WHERE GradeId=gradeIdToSearch;
END //

DELIMITER ;

-- 3. Insert grade
DELIMITER //

CREATE PROCEDURE Grade_InsertGrade(IN gradeNameToInsert varchar(255), IN descriptionToInsert varchar(255))
BEGIN
  Insert Grade(Name, Description) VALUES(gradeNameToInsert, descriptionToInsert);
END //

DELIMITER ;

-- 4. Update with gradeId 
DELIMITER //

CREATE PROCEDURE Grade_UpdateGrade(IN gradeIdToUpdate INT, IN nameToUpdate varchar(255), IN descriptionToUpdate varchar(255))
BEGIN
  Update Grade
 	SET Name = nameToUpdate, 
    	description = descriptionToUpdate
    WHERE GradeId = gradeIdToUpdate;
END //

DELIMITER ;


-- AnswerModel



-- USER
-- 1. GET USER WITH ID
DELIMITER //

CREATE PROCEDURE User_GetUser(IN emailToSearch varchar(255))
BEGIN
 	SELECT UserId, FullName, Email, Username, Birthday, Phone, RoleId Description FROM User WHERE Email=emailToSearch;
END //

DELIMITER ;

-- 2. Check password is correct

DELIMITER //

CREATE PROCEDURE User_CheckUsernameAndPasswordIsCorrect(IN emailToCheck varchar(255), IN passwordToCheck varchar(255))
BEGIN
 	SELECT UserId, FullName, Email, Username, Birthday, Phone, RoleId FROM User WHERE Email=emailToCheck AND Password=passwordToCheck;
END //

DELIMITER ;

-- 3. Get all user without current user.
DELIMITER //

CREATE PROCEDURE User_GetUserWithoutCurrentUser(IN userIdToSearch INT)
BEGIN
 	SELECT UserId, FullName, Email, Username, Birthday, Phone, u.RoleId, r.Name AS RoleName 
    FROM User u JOIN Role r ON u.RoleId = r.RoleId
    WHERE UserId != userIdToSearch;
END //

DELIMITER ;

-- 4. Insert user
DELIMITER //

CREATE PROCEDURE User_InsertUser(
  IN usernameToInsert varchar(255),
  IN passwordToInsert varchar(255), 
  IN emailToInsert varchar(255), 
  IN fullnameToInsert varchar(255), 
  roleIdToInsert INT)
BEGIN
  Insert User(Username,
              Password, 
              Email,
              Fullname,
              RoleId
      )VALUES(usernameToInsert,
              passwordToInsert,
              emailToInsert,
              fullnameToInsert,
              roleIdToInsert);
END //

DELIMITER ;