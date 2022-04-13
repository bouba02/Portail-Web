-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 22 juil. 2021 à 09:07
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `imperial_college`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `ID_ANNONCE` bigint(20) NOT NULL,
  `TITRE_ANNONCE` text,
  `DATE_ANNONCE` datetime DEFAULT CURRENT_TIMESTAMP,
  `ANNONCE` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`ID_ANNONCE`, `TITRE_ANNONCE`, `DATE_ANNONCE`, `ANNONCE`) VALUES
(8, 'Conférence 2021', '2017-06-23 03:57:09', 'Conférence sur le thème \"Energy and Smart Cities\" fffffff    '),
(9, 'Conférence 2020', '2017-06-23 04:00:06', 'Conférence sur le thème \"IA (Intelligence Artificielle)\"'),
(29, 'AVIS 2020', '2002-07-21 00:00:00', 'efeffhkfbe\r\n '),
(31, 'AVIS', '2002-07-21 00:00:00', 'Veuillez vous inscrire obligatoirement pour les candidatures du PFE.  OK '),
(33, 'Annonce 40', '2013-07-21 05:07:29', 'Bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `class_result`
--

CREATE TABLE `class_result` (
  `class_result_id` int(11) NOT NULL,
  `roll_no` int(30) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `total_marks` varchar(11) NOT NULL,
  `obtain_marks` varchar(11) NOT NULL,
  `result_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `class_result`
--

INSERT INTO `class_result` (`class_result_id`, `roll_no`, `course_code`, `subject_code`, `semester`, `total_marks`, `obtain_marks`, `result_date`) VALUES
(2, 18, 'SMI', 'TechWeb', '3', '20', '15', '03-07-21'),
(3, 16, 'SMI', 'AdminR', '6', '20', '15', '03-07-21'),
(4, 16, 'SMI', 'IHM', '6', '20', '0', '03-07-21'),
(15, 19, 'SMI', 'PHP', '6', '20', '16', '05-07-21'),
(17, 19, 'SMI', 'PT', '6', '20', '3', '05-07-21'),
(18, 16, 'SMI', 'PHP', '6', '20', '9', '05-07-21'),
(19, 16, 'SMI', 'PT', '6', '20', '10', '05-07-21'),
(20, 22, 'SMI', 'PHP', '6', '20', '10', '13-07-21'),
(21, 22, 'SMI', 'PT', '6', '20', '', '13-07-21');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `semester_or_year` varchar(10) NOT NULL,
  `no_of_year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `semester_or_year`, `no_of_year`) VALUES
('SMI', 'Science Mathématiques et Informatique Appliqué', 'Semester', 3);

-- --------------------------------------------------------

--
-- Structure de la table `course_subjects`
--

CREATE TABLE `course_subjects` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `credit_hours` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `course_subjects`
--

INSERT INTO `course_subjects` (`subject_code`, `subject_name`, `course_code`, `semester`, `credit_hours`) VALUES
('AdminR', 'Administration Des Réseaux Informatiques', 'SMI', 6, 3),
('ALG1', 'Algèbre 1: Généralité et Arithmétique dans Z', 'SMI', 1, 3),
('ALG2', 'Algèbre 2: Structure, Polynômes et Fractions Rationnelles', 'SMI', 1, 3),
('ALG3', 'Algèbre 3: Espace Vectoriels, Matrices et Déterminants', 'SMI', 2, 3),
('ALGO2', 'Algorithmique II', 'SMI', 3, 4),
('AN1', 'Analyse 1: Suites Numériques et Fonctions', 'SMI', 1, 3),
('AN2', 'Analyse 2: Intégration', 'SMI', 2, 4),
('AN3', 'Analyse 3: Formules de Taylor, Développement limité et Applications', 'SMI', 2, 3),
('ANumer', 'Analyse Numérique I', 'SMI', 4, 3),
('AO', 'Architecture Des Ordinateurs', 'SMI', 4, 3),
('BD', 'Base de Données', 'SMI', 5, 3),
('Comp', 'Compilation', 'SMI', 5, 3),
('COO', 'Conception Orienté Objet UML', 'SMI', 5, 3),
('Electro', 'Electronique', 'SMI', 3, 3),
('ElectroMa', 'ElectroMagnétisme', 'SMI', 4, 3),
('IHM', 'Interface Homme Machine', 'SMI', 6, 3),
('INFO1', 'Informatique 1: Introduction a l informatique', 'SMI', 1, 3),
('INFO2', 'Informatique 2: Algorithmique I', 'SMI', 2, 3),
('IR', 'Interconnexion De Réseaux', 'SMI', 6, 3),
('LT1', 'Langue Et Terminologie 1', 'SMI', 1, 3),
('LT2', 'Langue Et Terminologie 2', 'SMI', 2, 4),
('PHP', 'Base de Données et Programmation Web', 'SMI', 6, 3),
('PHY1', 'Mecanique1', 'SMI', 1, 4),
('PHY2', 'Physique 2: Thermodynamique', 'SMI', 1, 3),
('PHY3', 'Physique 3: Electrostatique et Electrocinétique ', 'SMI', 2, 4),
('PHY4', 'Physique 4:  Optique Géométrique', 'SMI', 2, 3),
('POO', 'Programmation Orienté Objet JAVA', 'SMI', 5, 3),
('ProbStat', 'Probabilité et  Statistique', 'SMI', 3, 3),
('PROG1', 'Programmation I: Langage C', 'SMI', 3, 3),
('PROG2', 'Programmation II: Langage C', 'SMI', 4, 3),
('PT', 'Projet Tutoré', 'SMI', 6, 6),
('RI', 'Reseaux Informatiques', 'SMI', 5, 3),
('RO', 'Recherche Opérationnelle', 'SMI', 5, 3),
('SE1', 'Système D Exploitation I', 'SMI', 3, 3),
('SE2', 'Système D Exploitation II', 'SMI', 4, 3),
('StructD', 'Structures De Données', 'SMI', 4, 3),
('TechWeb', 'Technologie Du Web', 'SMI', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `account` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`ID`, `user_id`, `Password`, `Role`, `account`) VALUES
(2, 'admin@gmail.com', 'admin123', 'Admin', ''),
(3, 'student@gmail.com', 'student123', 'Student', 'Activate'),
(5, 'staff1@gmail.com', 'teacher123', 'Teacher', 'Activate'),
(16, 'bouba@gmail.com', 'admin', 'Student', 'Activate'),
(17, 'bouba@gmail.com', 'admin', 'Student', 'Activate'),
(18, 'halima@gmail.com', 'halima', 'Student', 'Activate'),
(19, 'bouba@gmail.com', 'teacher123*', 'Teacher', ''),
(20, 'halima12@gmail.com', 'halima123', 'Student', 'Activate'),
(21, 'teacher1@gmail.com', 'teacher123*', 'Teacher', ''),
(22, 'teacher2@gmail.com', 'teacher123*', 'Teacher', ''),
(23, 'teacher3@gmail.com', 'teacher123*', 'Teacher', ''),
(24, 'abdel@gmail.com', 'admin', 'Student', 'Activate'),
(25, 'yassir@gmail.com', 'admin', 'Student', 'Activate');

-- --------------------------------------------------------

--
-- Structure de la table `mytable`
--

CREATE TABLE `mytable` (
  `id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mytable`
--

INSERT INTO `mytable` (`id`, `name`, `course_code`) VALUES
('B.Fashion-S19-1', 'husnain', 'B.Fashion'),
('B.Fashion-S19-2', 'razarai663@gmail.com', 'B.Fashion'),
('MCS-S19-1', 'Muhammad Husnain Raza', 'MCS'),
('MCS-S19-2', 'razarai663@gmail.com', 'MCS'),
('MIT-S19-1', 'Muhammad Husnain Raza', 'MIT');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `session` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session`, `created_date`) VALUES
(1, 'S19', '2020-03-11 20:20:44');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `code` int(20) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prenoms` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` blob,
  `adresse` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `semestre` int(20) DEFAULT NULL,
  `admission` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cni` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sexe` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`code`, `nom`, `prenoms`, `dateNaissance`, `email`, `telephone`, `password`, `photo`, `adresse`, `ville`, `semestre`, `admission`, `cni`, `admission_date`, `sexe`) VALUES
(16, 'Nikiema', 'Boubacar', '1993-02-13', 'bouba@gmail.com', '0676858493', 'admin', 0x494d475f303937392d4d6f6469666965722e6a7067, 'Agdal', 'Casablanca', 6, 'Accepté', 'A06558944C', '2021-07-02 02:23:29', 'Masculin'),
(18, 'HALIMA', 'Halima', '1998-05-12', 'halima@gmail.com', '065684932', 'halima', 0x4c756e65747465732d64652d7675652d35302e6a706567, 'Ocean,Place Russie,10005', 'Rabat', 3, 'Accepté', '', '2021-07-01 13:41:14', 'Feminin'),
(19, 'EL-ABBADI', 'HALIMA ', '1997-05-12', 'halima12@gmail.com', '0655879032', 'halima123', 0x696d616765732e6a706567, 'Ocean,Place Russie,10005', 'Rabat', 6, 'Accepté', '', '2021-07-04 23:18:03', 'Feminin'),
(20, 'Mohammed', 'Yassir', '1999-09-12', 'mohammed@gmail.com', '06758494', 'admin', 0x686f6d6d652e6a706567, 'Agdal Avenue de France ,10000', 'Rabat', 6, 'En attente', 'A0677869C', '2021-07-13 12:02:38', 'Masculin'),
(21, 'Abdel', 'Kader', '1998-09-12', 'abdel@gmail.com', '0787987632', 'admin', 0x6574756469616e742e706e67, 'Avenue Abtal, Agdal', 'Rabat', 3, 'Accepté', 'A056869C', '2021-07-13 12:08:14', 'Masculin'),
(22, 'Mohammed', 'yassir', '1999-05-20', 'yassir@gmail.com', '058959759754', 'admin', 0x6574756469616e74312e706e67, 'Rabat,Agdal12', 'Rabat', 6, 'Accepté', 'A0677869C', '2021-07-13 17:49:02', 'Masculin');

-- --------------------------------------------------------

--
-- Structure de la table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `attendance_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `attendance` int(11) NOT NULL,
  `attendance_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `course_code`, `subject_code`, `semester`, `student_id`, `attendance`, `attendance_date`) VALUES
(1, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(2, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(3, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(4, 'MCS', 'DBMS', 2, 'MCS-S19-1', 0, '15-03-20'),
(5, 'MCS', 'DLD', 2, 'MCS-S19-1', 1, '15-03-20'),
(6, 'MCS', 'OOP', 2, 'MCS-S19-1', 1, '15-03-20'),
(7, 'MCS', 'SE', 2, 'MCS-S19-1', 0, '15-03-20'),
(8, 'MCS', 'WEB', 2, 'MCS-S19-1', 1, '15-03-20');

-- --------------------------------------------------------

--
-- Structure de la table `student_courses`
--

CREATE TABLE `student_courses` (
  `student_course_id` int(11) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `semester` int(20) DEFAULT NULL,
  `roll_no` int(30) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `assign_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `student_courses`
--

INSERT INTO `student_courses` (`student_course_id`, `course_code`, `semester`, `roll_no`, `subject_code`, `assign_date`) VALUES
(18, 'SMI', 3, 18, 'ALGO2', '01-07-21'),
(19, 'SMI', 3, 18, 'Electro', '01-07-21'),
(20, 'SMI', 3, 18, 'ProbStat', '01-07-21'),
(21, 'SMI', 3, 18, 'PROG1', '01-07-21'),
(22, 'SMI', 3, 18, 'SE1', '01-07-21'),
(23, 'SMI', 3, 18, 'TechWeb', '01-07-21'),
(24, 'SMI', 6, 16, 'AdminR', '01-07-21'),
(25, 'SMI', 6, 16, 'IHM', '01-07-21'),
(26, 'SMI', 6, 16, 'IR', '01-07-21'),
(27, 'SMI', 6, 16, 'PHP', '01-07-21'),
(28, 'SMI', 6, 16, 'PT', '01-07-21'),
(29, 'SMI', 6, 19, 'AdminR', '04-07-21'),
(30, 'SMI', 6, 19, 'IHM', '04-07-21'),
(31, 'SMI', 6, 19, 'IR', '04-07-21'),
(32, 'SMI', 6, 19, 'PHP', '04-07-21'),
(33, 'SMI', 6, 19, 'PT', '04-07-21'),
(34, 'SMI', 3, 21, 'ALGO2', '13-07-21'),
(35, 'SMI', 3, 21, 'Electro', '13-07-21'),
(36, 'SMI', 3, 21, 'ProbStat', '13-07-21'),
(37, 'SMI', 3, 21, 'PROG1', '13-07-21'),
(38, 'SMI', 3, 21, 'SE1', '13-07-21'),
(39, 'SMI', 3, 21, 'TechWeb', '13-07-21'),
(40, 'SMI', 6, 22, 'AdminR', '13-07-21'),
(41, 'SMI', 6, 22, 'IHM', '13-07-21'),
(42, 'SMI', 6, 22, 'IR', '13-07-21'),
(43, 'SMI', 6, 22, 'PHP', '13-07-21'),
(44, 'SMI', 6, 22, 'PT', '13-07-21');

-- --------------------------------------------------------

--
-- Structure de la table `student_fee`
--

CREATE TABLE `student_fee` (
  `fee_voucher` int(11) NOT NULL,
  `roll_no` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `student_fee`
--

INSERT INTO `student_fee` (`fee_voucher`, `roll_no`, `amount`, `posting_date`, `status`) VALUES
(1, 'MCS-S19-1', 23455, '2020-03-29 11:24:36', 'Paid'),
(2, 'MCS-S19-1', 20093, '2020-03-30 12:35:39', 'Paid');

-- --------------------------------------------------------

--
-- Structure de la table `student_info`
--

CREATE TABLE `student_info` (
  `roll_no` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `session` varchar(10) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `prospectus_issued` varchar(10) NOT NULL,
  `prospectus_amount` varchar(10) NOT NULL,
  `form_b` varchar(20) NOT NULL,
  `applicant_status` varchar(20) NOT NULL,
  `application_status` varchar(20) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `other_phone` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `permanent_address` varchar(150) NOT NULL,
  `current_address` varchar(150) NOT NULL,
  `place_of_birth` varchar(150) NOT NULL,
  `matric_complition_date` varchar(10) NOT NULL,
  `matric_awarded_date` varchar(10) NOT NULL,
  `matric_certificate` varchar(100) NOT NULL,
  `fa_complition_date` varchar(10) NOT NULL,
  `fa_awarded_date` varchar(10) NOT NULL,
  `fa_certificate` varchar(100) NOT NULL,
  `ba_complition_date` varchar(10) NOT NULL,
  `ba_awarded_date` varchar(10) NOT NULL,
  `ba_certificate` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtain_marks` int(11) NOT NULL,
  `state` varchar(20) NOT NULL,
  `admission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `attendance_id` int(11) NOT NULL,
  `teacher_id` varchar(30) NOT NULL,
  `attendance` int(11) NOT NULL,
  `attendance_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`attendance_id`, `teacher_id`, `attendance`, `attendance_date`) VALUES
(1, '3', 1, '09-03-20'),
(2, '3', 1, '10-03-20'),
(3, '3', 1, '11-04-20'),
(4, '3', 1, '30-03-20'),
(5, '2', 0, '30-03-20');

-- --------------------------------------------------------

--
-- Structure de la table `teacher_courses`
--

CREATE TABLE `teacher_courses` (
  `teacher_courses_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `teacher_id` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `assign_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teacher_courses`
--

INSERT INTO `teacher_courses` (`teacher_courses_id`, `course_code`, `semester`, `teacher_id`, `subject_code`, `assign_date`) VALUES
(1, 'SMI', 1, '2', 'INFO1', '02-07-21'),
(2, 'SMI', 6, '3', 'PHP', '02-07-21'),
(3, 'SMI', 6, '2', 'PHP', '03-07-21'),
(4, 'SMI', 6, '2', 'PT', '03-07-21'),
(5, 'SMI', 6, '3', 'AdminR', '03-07-21'),
(6, 'SMI', 6, '3', 'AdminR', '03-07-21'),
(7, 'SMI', 6, '5', 'IR', '04-07-21'),
(8, 'SMI', 6, '6', 'AdminR', '04-07-21'),
(9, 'SMI', 6, '7', 'IR', '04-07-21');

-- --------------------------------------------------------

--
-- Structure de la table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `phone_no` varchar(30) CHARACTER SET utf8 NOT NULL,
  `profile_image` blob NOT NULL,
  `teacher_status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cnic` varchar(15) CHARACTER SET utf8 NOT NULL,
  `dob` varchar(15) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8 NOT NULL,
  `permanent_address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `place_of_birth` varchar(50) CHARACTER SET utf8 NOT NULL,
  `state` varchar(20) CHARACTER SET utf8 NOT NULL,
  `hire_date` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_id`, `first_name`, `last_name`, `email`, `phone_no`, `profile_image`, `teacher_status`, `cnic`, `dob`, `gender`, `permanent_address`, `place_of_birth`, `state`, `hire_date`) VALUES
(2, 'Teacher', 'Mohammed', 'staff1@gmail.com', '0655879613', 0x696d616765732e706e67, 'Permanent', 'A056869C', '1987-01-17', 'Masculin', 'Hay', 'Rabat', 'Rabat', '18-06-21'),
(5, 'Teacher', '1', 'teacher1@gmail.com', '0655898954', 0x686f6d6d65312e6a706567, 'Permanent', 'A0655894C', '1990-01-01', 'Masculin', 'Avenue Souissi', 'Rabat', 'Casablanca', '04-07-21'),
(6, 'Teacher', '2', 'teacher2@gmail.com', '0654653243', 0x686f6d6d652e6a706567, 'Permanent', 'A0677869G', '1087-01-02', 'Masculin', 'Agdal ,avenue ibn Sina', 'Rabat', 'Rabat', '04-07-21'),
(7, 'Teacher ', '3', 'teacher3@gmail.com', '0654675423', 0x66656d6d652e6a706567, 'Permanent', 'A654365F', '1990-12-12', 'Feminin', 'Avenue Abtal, Agdal', 'Rabat', 'Rabat', '04-07-21');

-- --------------------------------------------------------

--
-- Structure de la table `teacher_salary_allowances`
--

CREATE TABLE `teacher_salary_allowances` (
  `teacher_id` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `medical_allowance` int(11) NOT NULL,
  `hr_allowance` int(11) NOT NULL,
  `scale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teacher_salary_allowances`
--

INSERT INTO `teacher_salary_allowances` (`teacher_id`, `basic_salary`, `medical_allowance`, `hr_allowance`, `scale`) VALUES
(1, 40000, 5, 10, 15),
(2, 55000, 7, 15, 18),
(3, 43000, 5, 8, 14);

-- --------------------------------------------------------

--
-- Structure de la table `teacher_salary_report`
--

CREATE TABLE `teacher_salary_report` (
  `salary_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `paid_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teacher_salary_report`
--

INSERT INTO `teacher_salary_report` (`salary_id`, `teacher_id`, `total_amount`, `status`, `paid_date`) VALUES
(1, 1, 46000, 'Paid', '2020-03-27 11:28:57'),
(2, 2, 67100, 'Paid', '2020-03-27 11:50:13'),
(3, 3, 48590, 'Paid', '2020-03-27 11:55:58'),
(4, 1, 46000, 'Paid', '2020-03-27 12:33:39'),
(5, 3, 48590, 'Paid', '2020-03-28 08:26:59'),
(6, 2, 67100, 'Paid', '2020-03-28 08:30:46'),
(7, 2, 67100, 'Paid', '2020-03-28 08:32:06'),
(8, 2, 67100, 'Paid', '2020-03-28 08:32:46'),
(9, 2, 67100, 'Paid', '2020-03-28 08:33:59'),
(10, 2, 67100, 'Paid', '2020-03-28 08:35:54'),
(11, 2, 67100, 'Paid', '2020-03-28 08:38:17'),
(12, 2, 67100, 'Paid', '2020-03-28 08:39:22'),
(13, 2, 67100, 'Paid', '2020-03-28 08:40:44'),
(14, 2, 67100, 'Paid', '2020-03-28 08:41:26'),
(15, 2, 67100, 'Paid', '2020-03-28 08:42:25'),
(16, 2, 67100, 'Paid', '2020-03-28 08:43:32'),
(17, 2, 67100, 'Paid', '2020-03-28 08:44:03'),
(18, 2, 67100, 'Paid', '2020-03-28 08:44:39'),
(19, 2, 67100, 'Paid', '2020-03-28 08:45:09'),
(20, 2, 67100, 'Paid', '2020-03-28 08:45:22'),
(21, 2, 67100, 'Paid', '2020-03-28 08:45:36'),
(22, 2, 67100, 'Paid', '2020-03-28 08:45:45'),
(23, 2, 67100, 'Paid', '2020-03-28 08:45:59'),
(24, 2, 67100, 'Paid', '2020-03-28 08:47:42'),
(25, 2, 67100, 'Paid', '2020-03-28 08:48:11'),
(26, 3, 48590, 'Paid', '2020-03-28 08:48:22'),
(27, 3, 48590, 'Paid', '2020-03-28 08:48:40'),
(28, 3, 48590, 'Paid', '2020-03-28 10:48:28'),
(29, 3, 48590, 'Paid', '2020-03-28 10:49:47'),
(30, 3, 48590, 'Paid', '2020-03-30 12:37:11');

-- --------------------------------------------------------

--
-- Structure de la table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `timing_from` varchar(10) NOT NULL,
  `timing_to` varchar(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `time_table`
--

INSERT INTO `time_table` (`id`, `course_code`, `semester`, `timing_from`, `timing_to`, `day`, `subject_code`, `room_no`) VALUES
(7, 'SMI', 1, '08:30', '11:30', '1', 'AdminR', 3),
(8, 'SMI', 1, '08:30', '11:30', '1', 'AdminR', 3);

-- --------------------------------------------------------

--
-- Structure de la table `weekdays`
--

CREATE TABLE `weekdays` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `weekdays`
--

INSERT INTO `weekdays` (`day_id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`ID_ANNONCE`);

--
-- Index pour la table `class_result`
--
ALTER TABLE `class_result`
  ADD PRIMARY KEY (`class_result_id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Index pour la table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Index pour la table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`student_course_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Index pour la table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`fee_voucher`),
  ADD KEY `roll_no` (`roll_no`);

--
-- Index pour la table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`roll_no`);

--
-- Index pour la table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Index pour la table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  ADD PRIMARY KEY (`teacher_courses_id`);

--
-- Index pour la table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Index pour la table `teacher_salary_allowances`
--
ALTER TABLE `teacher_salary_allowances`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Index pour la table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Index pour la table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`day_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `ID_ANNONCE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `class_result`
--
ALTER TABLE `class_result`
  MODIFY `class_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `student_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `fee_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `teacher_courses`
--
ALTER TABLE `teacher_courses`
  MODIFY `teacher_courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  ADD CONSTRAINT `teacher_salary_report_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_salary_allowances` (`teacher_id`);
