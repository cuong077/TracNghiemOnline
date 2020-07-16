-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 04:05 PM
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
-- Database: `tracnghiemonline`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Chapter_checkExistChapterByName` (IN `chapterNameToSearch` VARCHAR(255) CHARSET utf8, IN `gradeIdToSearch` INT, IN `subjectIdToSearch` INT)  NO SQL
BEGIN
	SELECT * FROM gradesubject gs JOIN subject s ON s.SubjectId = gs.SubjectId JOIN grade g ON g.GradeId = gs.GradeId JOIN chapter c ON c.GradeSubjectId = gs.GradeSubjectId WHERE c.Name=chapterNameToSearch AND g.GradeId=gradeIdToSearch AND s.SubjectId=subjectIdToSearch AND c.Hidden=0;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Chapter_CheckExistsChapter` (IN `chapterNameToSearch` VARCHAR(255) CHARSET utf8, IN `gradeSubjectIdToSearch` INT)  NO SQL
BEGIN
	SELECT ChapterId FROM chapter WHERE Name = chapterNameToSearch AND gradesubjectid=gradeSubjectIdToSearch AND Hidden=0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Chapter_GetChapterById` (IN `chapterIdToSearch` INT)  NO SQL
BEGIN
	SELECT * FROM chapter WHERE chapterId=chapterIdToSearch AND Hidden=0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Chapter_GetListChapterToShow` ()  NO SQL
BEGIN
SELECT c.ChapterId AS ChapterId, c.Name AS ChapterName, gs.GradeSubjectId, g.Name AS GradeName, s.Name AS SubjectName FROM chapter c JOIN gradesubject gs ON gs.GradeSubjectId = c.GradeSubjectId JOIN subject s ON s.SubjectId = gs.SubjectId JOIN grade g ON gs.GradeId = g.GradeId WHERE c.Hidden=0;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Chapter_GetListChapterWithGradeSubjectID` (IN `_GradeID` INT, IN `_SubjectID` INT)  NO SQL
BEGIN
	DECLARE _gradesubjectid INT;
 SELECT gradesubjectid INTO _gradesubjectid from gradesubject WHERE gradeid = _GradeID AND subjectid = _SubjectID limit 1;
    SELECT * FROM chapter WHERE gradesubjectid = _gradesubjectid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Chapter_hiddenChapter` (IN `chapterIdToSearch` INT)  NO SQL
BEGIN
	UPDATE Chapter
    	SET Hidden=1
        WHERE ChapterId=chapterIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Chapter_InsertChapter` (IN `chapterNameToInsert` VARCHAR(255), IN `gradeSubjectIdToInsert` INT, IN `chapterDescriptionToInsert` VARCHAR(255))  NO SQL
BEGIN
	INSERT chapter(Name, GradeSubjectId, Description)  VALUES( chapterNameToInsert, gradeSubjectIdToInsert, chapterDescriptionToInsert);
    SELECT LAST_INSERT_ID() AS ChapterId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Chapter_updateChapter` (IN `chapterIdToSearch` INT, IN `chapterNameToUpdate` VARCHAR(255) CHARSET utf8, IN `chapterDescriptionToUpdate` VARCHAR(255) CHARSET utf8)  NO SQL
BEGIN
	UPDATE chapter
    	SET Name=chapterNameToUpdate,
        Description=chapterDescriptionToUpdate
    WHERE ChapterId=chapterIdToSearch;
    SELECT LAST_INSERT_ID() AS ChapterId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Class_addClass` (IN `classNameToInsert` VARCHAR(255) CHARSET utf8, IN `classDescriptionToInsert` TEXT CHARSET utf8, IN `passwordToInsert` VARCHAR(255) CHARSET utf8, IN `userIdToInsert` INT, IN `gradeIdToInsert` INT)  NO SQL
BEGIN
	INSERT class(Name, Description, Password, UserId, GradeId) VALUES(classNameToInsert, classDescriptionToInsert, passwordToInsert, userIdToInsert, gradeIdToInsert);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Class_checkExistsClassByName` (IN `classNameToSearch` VARCHAR(255) CHARSET utf8, IN `gradeIdToSearch` INT)  NO SQL
BEGIN
	SELECT * FROM class WHERE Name=classNameToSearch AND gradeid=gradeIdToSearch;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_DeleteGradeBySubjectId` (IN `subjectIdToSearch` INT)  BEGIN
  DELETE FROM GradeSubject
    WHERE SubjectId = subjectIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_findGradeSubjectIdByGradeIdAndSubjectId` (IN `gradeIdToSearch` INT, IN `subjectIdToSearch` INT)  NO SQL
BEGIN
 SELECT GradeSubjectId FROM gradesubject WHERE GradeId = gradeIdToSearch AND SubjectId = subjectIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_GetGradeIdWithSubjectId` (IN `subjectIdToSearch` INT)  BEGIN
  SELECT GradeId FROM GradeSubject WHERE SubjectId=subjectIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_getGradeSubjectById` (IN `gradeSubjectIdToSearch` INT)  NO SQL
BEGIN
	SELECT * FROM gradesubject WHERE GradeSubjectId=gradeSubjectIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_getListSubjectFilterByGrade` (IN `gradeIdToSearch` INT)  NO SQL
BEGIN
 SELECT gs.GradeId AS GradeId, gs.SubjectId as SubjectId, s.Name AS SubjectName  FROM gradesubject gs JOIN subject s ON s.SubjectId = gs.SubjectId WHERE gs.gradeId=gradeIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_GetListSubjectsByGradeId` (IN `gradeIdToSearch` VARCHAR(255))  NO SQL
SELECT * FROM gradesubject WHERE GradeId=gradeIdToSearch$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_GetSubjectsWithGradeID` (IN `GradeID` INT)  NO SQL
BEGIN
	SELECT gs.GradeId as grade_id, s.SubjectId as subject_id, s.Name as subject_name from gradesubject gs JOIN subject s on gs.SubjectId = s.SubjectId WHERE gs.GradeId = GradeID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_InsertGradeSubject` (IN `gradeIdToInsert` INT, IN `subjectIdToInsert` INT)  BEGIN
  INSERT GradeSubject(GradeId, SubjectId
	)VALUES(
      gradeIdToInsert,
      subjectIdToInsert
    ) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_UpdateGradeIdBySubjectId` (IN `subjectIdToSearch` INT, IN `gradeIdToUpdate` INT)  BEGIN
  Update GradeSubject 
    SET GradeId = gradeIdToUpdate
    WHERE SubjectId = subjectIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GradeSubject_updateGradeSubjectById` (IN `gradeSubjectIdToSearch` INT, IN `gradeIdToUpdate` INT, IN `subjectIdToUpdate` INT)  NO SQL
BEGIN
	UPDATE gradesubject
    SET GradeId=gradeIdToUpdate,
    	SubjectId=subjectIdToUpdate
    WHERE GradeSubjectId=gradeSubjectIdToSearch;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Grade_CheckExistsGradeByName` (IN `gradeName` VARCHAR(255))  NO SQL
SELECT Name,gradeId FROM grade WHERE Name=gradeName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Grade_GetAllGrades` ()  BEGIN
	SELECT GradeId, Name, Description FROM Grade WHERE Hidden!=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Grade_GetGrade` (IN `gradeIdToSearch` INT)  BEGIN
	SELECT Name, Description FROM Grade WHERE GradeId=gradeIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Grade_HiddenGrade` (IN `gradeIdToUpdate` INT)  BEGIN
 	UPDATE Grade
    SET Hidden = True
    WHERE GradeId = gradeIdToUpdate;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Grade_InsertGrade` (IN `gradeNameToInsert` VARCHAR(255), IN `descriptionToInsert` VARCHAR(255))  BEGIN
  Insert Grade(Name, Description) VALUES(gradeNameToInsert, descriptionToInsert);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Grade_UpdateGrade` (IN `gradeIdToUpdate` INT, IN `nameToUpdate` VARCHAR(255), IN `descriptionToUpdate` VARCHAR(255))  BEGIN
  Update Grade
 	SET Name = nameToUpdate, 
    	description = descriptionToUpdate
    WHERE GradeId = gradeIdToUpdate;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Lesson_GetListLessonWithChapterID` (IN `_ChapterID` INT)  NO SQL
BEGIN
	SELECT * FROM lesson WHERE ChapterID = _ChapterID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Role_GetListRole` ()  BEGIN
 	SELECT RoleId, Name, Description FROM Role;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Subject_CheckExistsSubjectWithSubjectName` (IN `subjectNameToSearch` VARCHAR(255), IN `gradeIdToSearch` INT)  NO SQL
BEGIN
	SELECT s.SubjectId FROM gradesubject gs JOIN subject s ON s.SubjectId = gs.SubjectId WHERE gs.GradeId = gradeIdToSearch AND s.Name = subjectNameToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Subject_DeleteSubject` (IN `subjectIdToSearch` INT)  BEGIN
  DELETE FROM Subject
    WHERE SubjectId=subjectIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Subject_GetListSubjects` ()  BEGIN
 	SELECT SubjectId, Name, Description FROM Subject WHERE Hidden!=true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Subject_GetSubject` (IN `subjectIdToSearch` INT)  BEGIN
  SELECT SubjectId, Name, Description, Hidden 
    FROM Subject
    WHERE SubjectId=subjectIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Subject_HiddenSubjectById` (IN `subjectIdToUpdate` INT)  BEGIN
 	UPDATE Subject 
    SET Hidden = True
    WHERE SubjectId = subjectIdToUpdate;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Subject_InsertSubject` (IN `subjectNameToInsert` VARCHAR(255), IN `subjectDescriptionToInsert` VARCHAR(255))  BEGIN
 	INSERT Subject(Name, Description) 
    VALUES(
      subjectNameToInsert,
      subjectDescriptionToInsert
    );
	SELECT LAST_INSERT_ID() AS SubjectId;    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Subject_updateSubject` (IN `subjectIdToSearch` INT, IN `subjectNameToUpdate` VARCHAR(255), IN `subjectDescriptionToUpdate` VARCHAR(255))  NO SQL
BEGIN
	UPDATE subject
    	SET Name=subjectNameToUpdate,
        	Description=subjectDescriptionToUpdate
        WHERE subjectId=subjectIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_CheckUsernameAndPasswordIsCorrect` (IN `emailToCheck` VARCHAR(255) CHARSET utf8, IN `passwordToCheck` VARCHAR(255) CHARSET utf8)  BEGIN
 	SELECT UserId, FullName, Email, Username, Birthday, Phone, RoleId FROM User WHERE Email=emailToCheck AND Password=passwordToCheck;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_GetUser` (IN `emailToSearch` VARCHAR(255) CHARSET utf8)  BEGIN
 	SELECT UserId, FullName, Email, Username, Birthday, Phone, RoleId Description FROM User WHERE Email=emailToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_GetUserById` (IN `userIdToSearch` INT)  BEGIN
 	SELECT UserId, FullName, Email, Username, Birthday, Phone, RoleId FROM User WHERE UserId=userIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_GetUserWithoutCurrentUser` (IN `userIdToSearch` INT)  BEGIN
 	SELECT UserId, FullName, Email, Username, Birthday, Phone, u.RoleId, r.Name AS RoleName, Active 
    FROM User u JOIN Role r ON u.RoleId = r.RoleId
    WHERE UserId != userIdToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_InsertUser` (IN `usernameToInsert` VARCHAR(255) CHARSET utf8, IN `passwordToInsert` VARCHAR(255) CHARSET utf8, IN `emailToInsert` VARCHAR(255) CHARSET utf8, IN `fullnameToInsert` VARCHAR(255) CHARSET utf8, IN `roleIdToInsert` INT)  BEGIN
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
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_IsBlock` (IN `emailToSearch` VARCHAR(255) CHARSET utf8)  BEGIN
 	SELECT Active FROM User WHERE Email=emailToSearch;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `User_UpdateActive` (IN `activeToUpdate` BOOLEAN, IN `userIdToUpdate` INT)  BEGIN
 	UPDATE User
    SET Active=activeToUpdate
    WHERE UserId=userIdToUpdate;
END$$

DELIMITER ;

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
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GradeSubjectId` int(11) NOT NULL,
  `Hidden` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`ChapterId`, `Name`, `Description`, `GradeSubjectId`, `Hidden`) VALUES
(10, 'Chương 1:', '', 35, 0),
(11, 'Chương 2:', 'Test', 35, 0),
(12, 'Văn học Việt Nam', 'Văn học Việt Nam', 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserId` int(11) NOT NULL,
  `GradeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `Name`, `Description`, `Password`, `UserId`, `GradeId`) VALUES
(1, 'Lớp 10a1', '456', '123', 3, 12),
(2, 'Lớp 11a1', '123', '123', 3, 13),
(3, 'Lớp 11a2', '123\r\n', '123', 3, 12);

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

--
-- Dumping data for table `examtime`
--

INSERT INTO `examtime` (`ExamTimeId`, `Time`, `Name`) VALUES
(1, 15, '15 phút'),
(2, 45, '1 tiết'),
(3, 60, '60 phút');

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
  `Description` varchar(255) DEFAULT NULL,
  `Hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`GradeId`, `Name`, `Description`, `Hidden`) VALUES
(12, 'Khối 10', 'Năm đầu tiên của cấp 3', 0),
(13, 'Khối 11', 'Năm thứ hai cấp 3', 0),
(14, 'Khối 12', 'Năm cuối cấp 3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gradesubject`
--

CREATE TABLE `gradesubject` (
  `GradeSubjectId` int(11) NOT NULL,
  `GradeId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gradesubject`
--

INSERT INTO `gradesubject` (`GradeSubjectId`, `GradeId`, `SubjectId`) VALUES
(35, 12, 73),
(37, 12, 74);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `LessonId` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `Content` text NOT NULL,
  `UserId` int(11) NOT NULL
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

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `Name`, `Description`) VALUES
(1, 'admin', ''),
(2, 'teacher', ''),
(3, 'student', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectId`, `Name`, `Description`, `Hidden`) VALUES
(73, 'Môn toán', 'Toán học', 0),
(74, 'Văn', 'Văn học', 0);

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
  `RoleId` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `FullName`, `Email`, `Username`, `Birthday`, `Phone`, `Password`, `RoleId`, `Active`) VALUES
(2, '', 'testemail@gmail.com', 'test', '0000-00-00 00:00:00', NULL, '098f6bcd4621d373cade4e832627b4f6', 2, 0),
(3, 'quocha', 'quocha@gmail.com', 'quocha', '0000-00-00 00:00:00', NULL, 'a97afdb8a3eebaf49c033c75d25220c4', 2, 1),
(4, 'dinh', 'thanhdinh@gmail.com', 'tesst', '0000-00-00 00:00:00', NULL, '45eea262ec1d46cc5ee3817bc821e757', 2, 0),
(5, 'Duy', 'buiduy@gmail.com', 'duy', '0000-00-00 00:00:00', NULL, '5dc6da3adfe8ccf1287a98c0a8f74496', 2, 0),
(6, 'Bùi Đức Duy', 'ducduy23089@gmail.com', 'duy12', '0000-00-00 00:00:00', NULL, '202cb962ac59075b964b07152d234b70', 2, 1),
(7, 'ha', 'ducduy23089@gmail.com', 'hatest', '0000-00-00 00:00:00', NULL, '6c14da109e294d1e8155be8aa4b1ce8e', 2, 1),
(8, 'ha', 'ducduy23089@gmail.com', 'hatest', '0000-00-00 00:00:00', NULL, '5dc6da3adfe8ccf1287a98c0a8f74496', 2, 1),
(9, 'nguyen van cuong', 'cuong0776565@gmail.com', 'cuong077', '0000-00-00 00:00:00', NULL, 'f36e6b7eb1f91a47889a100466bf1d3c', 2, 1);

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
  ADD PRIMARY KEY (`AnswerId`),
  ADD KEY `FK_Answer_Question_QuestionId` (`QuestionId`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`ChapterId`),
  ADD KEY `FK_Chapter_GradeSubject_GradeSubjectId` (`GradeSubjectId`);

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
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`LessonId`),
  ADD KEY `FK_Lession_Chapter_ChapterId` (`ChapterId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionId`),
  ADD KEY `FK_Question_Lession_LessionId` (`LessionId`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ResultId`),
  ADD KEY `FK_Result_Exam_ExamId` (`ExamId`),
  ADD KEY `FK_Result_User_UserId` (`UserId`);

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
  ADD PRIMARY KEY (`UserAnswerQuestionId`),
  ADD KEY `FK_UserAnswerQuestion_Result_ResultId` (`ResultId`),
  ADD KEY `FK_UserAnswerQuestion_Question_QuestionId` (`QuestionId`),
  ADD KEY `FK_UserAnswerQuestion_Answer_AnswerId` (`AnswerId`);

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
  MODIFY `ChapterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ExamTimeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `examtype`
--
ALTER TABLE `examtype`
  MODIFY `ExamTypeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `GradeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gradesubject`
--
ALTER TABLE `gradesubject`
  MODIFY `GradeSubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `LessonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `FK_Answer_Question_QuestionId` FOREIGN KEY (`QuestionId`) REFERENCES `question` (`QuestionId`);

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `FK_Chapter_GradeSubject_GradeSubjectId` FOREIGN KEY (`GradeSubjectId`) REFERENCES `gradesubject` (`GradeSubjectId`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `FK_Class_User_UserId` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `FK_Document_Class_ClassId` FOREIGN KEY (`ClassId`) REFERENCES `class` (`ClassId`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `FK_Exam_Class_ClassId` FOREIGN KEY (`ClassId`) REFERENCES `class` (`ClassId`),
  ADD CONSTRAINT `FK_Exam_ExamTime_ExamTimeId` FOREIGN KEY (`ExamTimeId`) REFERENCES `examtime` (`ExamTimeId`),
  ADD CONSTRAINT `FK_Exam_ExamType_ExamTypeId` FOREIGN KEY (`ExamTypeId`) REFERENCES `examtype` (`ExamTypeId`),
  ADD CONSTRAINT `FK_Exam_User_UserId` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `gradesubject`
--
ALTER TABLE `gradesubject`
  ADD CONSTRAINT `FK_GradeSubject_Grade_GradeId` FOREIGN KEY (`GradeId`) REFERENCES `grade` (`GradeId`),
  ADD CONSTRAINT `FK_GradeSubject_Subject_SubjectId` FOREIGN KEY (`SubjectId`) REFERENCES `subject` (`SubjectId`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `FK_Lession_Chapter_ChapterId` FOREIGN KEY (`ChapterId`) REFERENCES `chapter` (`ChapterId`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_Question_Lession_LessionId` FOREIGN KEY (`LessionId`) REFERENCES `lesson` (`LessonId`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `FK_Result_Exam_ExamId` FOREIGN KEY (`ExamId`) REFERENCES `exam` (`ExamId`),
  ADD CONSTRAINT `FK_Result_User_UserId` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_User_Role_RoleId` FOREIGN KEY (`RoleId`) REFERENCES `role` (`RoleId`);

--
-- Constraints for table `useranswerquestion`
--
ALTER TABLE `useranswerquestion`
  ADD CONSTRAINT `FK_UserAnswerQuestion_Answer_AnswerId` FOREIGN KEY (`AnswerId`) REFERENCES `answer` (`AnswerId`),
  ADD CONSTRAINT `FK_UserAnswerQuestion_Question_QuestionId` FOREIGN KEY (`QuestionId`) REFERENCES `question` (`QuestionId`),
  ADD CONSTRAINT `FK_UserAnswerQuestion_Result_ResultId` FOREIGN KEY (`ResultId`) REFERENCES `result` (`ResultId`);

--
-- Constraints for table `userclass`
--
ALTER TABLE `userclass`
  ADD CONSTRAINT `FK_UserClass_Class_ClassId` FOREIGN KEY (`ClassId`) REFERENCES `class` (`ClassId`),
  ADD CONSTRAINT `FK_UserClass_User_UserId` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
