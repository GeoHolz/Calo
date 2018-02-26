-- Adminer 4.5.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';

CREATE DATABASE `Calo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Calo`;

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(40) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_signup` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Data1`;
CREATE TABLE `Data1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `office` varchar(50) NOT NULL,
  `age` int(4) NOT NULL,
  `startdate` varchar(12) NOT NULL,
  `salary` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Data1` (`ID`, `name`, `position`, `office`, `age`, `startdate`, `salary`) VALUES
(1,     'Airi Satou',   'Accountant',   'Tokyo',        33,     '28/11/2008',   '$162,700'),
(2,     'Angelica Ramos',       'Chief Executive Officer (CEO)',        'London',       47,     '09/10/2009',   '$1,200,000'),
(3,     'Ashton Cox',   'Junior Technical Author',      'San Francisco',        66,     '12/01/2009',   '$86,000'),
(4,     'Bradley Greer',        'Software Engineer',    'London',       41,     '13/10/2012',   '$132,000'),
(5,     'Brenden Wagner',       'Software Engineer',    'San Francisco',        28,     '07/06/2011',   '$206,850'),
(6,     'Brielle Williamson',   'Integration Specialist',       'New York',     61,     '02/12/2012',   '$372,000'),
(7,     'Bruno Nash',   'Software Engineer',    'London',       38,     '03/05/2011',   '$163,500'),
(8,     'Caesar Vance', 'Pre-Sales Support',    'New York',     21,     '12/12/2011',   '$106,450'),
(9,     'Cara Stevens', 'Sales Assistant',      'New York',     46,     '06/12/2011',   '$145,600'),
(10,    'Cedric Kelly', 'Senior Javascript Developer',  'Edinburgh',    22,     '29/03/2012',   '$433,060'),
(11,    'Charde Marshall',      'Regional Director',    'San Francisco',        36,     '16/10/2008',   '$470,600'),
(12,    'Colleen Hurst',        'Javascript Developer', 'San Francisco',        39,     '15/09/2009',   '$205,500'),
(13,    'Dai Rios',     'Personnel Lead',       'Edinburgh',    35,     '26/09/2012',   '$217,500'),
(14,    'Donna Snider', 'Customer Support',     'New York',     27,     '25/01/2011',   '$112,000'),
(15,    'Doris Wilder', 'Sales Assistant',      'Sidney',       23,     '20/09/2010',   '$85,600'),
(16,    'Finn Camacho', 'Support Engineer',     'San Francisco',        47,     '07/07/2009',   '$87,500'),
(17,    'Fiona Green',  'Chief Operating Officer (COO)',        'San Francisco',        48,     '11/03/2010',   '$850,000'),
(18,    'Garrett Winters',      'Accountant',   'Tokyo',        63,     '25/07/2011',   '$170,750'),
(19,    'Gavin Cortez', 'Team Leader',  'San Francisco',        22,     '26/10/2008',   '$235,500'),
(20,    'Gavin Joyce',  'Developer',    'Edinburgh',    42,     '22/12/2010',   '$92,575'),
(21,    'Gloria Little',        'Systems Administrator',        'New York',     59,     '10/04/2009',   '$237,500'),
(22,    'Haley Kennedy',        'Senior Marketing Designer',    'London',       43,     '18/12/2012',   '$313,500'),
(23,    'Hermione Butler',      'Regional Director',    'London',       47,     '21/03/2011',   '$356,250'),
(24,    'Herrod Chandler',      'Sales Assistant',      'San Francisco',        59,     '06/08/2012',   '$137,500'),
(25,    'Hope Fuentes', 'Secretary',    'San Francisco',        41,     '12/02/2010',   '$109,850'),
(26,    'Howard Hatfield',      'Office Manager',       'San Francisco',        51,     '16/12/2008',   '$164,500'),
(27,    'Jackson Bradshaw',     'Director',     'New York',     65,     '26/09/2008',   '$645,750'),
(28,    'Jena Gaines',  'Office Manager',       'London',       30,     '19/12/2008',   '$90,560'),
(29,    'Jenette Caldwell',     'Development Lead',     'New York',     30,     '03/09/2011',   '$345,000'),
(30,    'Jennifer Acosta',      'Junior Javascript Developer',  'Edinburgh',    43,     '01/02/2013',   '$75,650'),
(31,    'Jennifer Chang',       'Regional Director',    'Singapore',    28,     '14/11/2010',   '$357,650'),
(32,    'Jonas Alexander',      'Developer',    'San Francisco',        30,     '14/07/2010',   '$86,500'),
(33,    'Lael Greer',   'Systems Administrator',        'London',       21,     '27/02/2009',   '$103,500'),
(34,    'Martena Mccray',       'Post-Sales support',   'Edinburgh',    46,     '09/03/2011',   '$324,050'),
(35,    'Michael Bruce',        'Javascript Developer', 'Singapore',    29,     '27/06/2011',   '$183,000'),
(36,    'Michael Silva',        'Marketing Designer',   'London',       66,     '27/11/2012',   '$198,500'),
(37,    'Michelle House',       'Integration Specialist',       'Sidney',       37,     '02/06/2011',   '$95,400'),
(38,    'Olivia Liang', 'Support Engineer',     'Singapore',    64,     '03/02/2011',   '$234,500'),
(39,    'Paul Byrd',    'Chief Financial Officer (CFO)',        'New York',     64,     '09/06/2010',   '$725,000'),
(40,    'Prescott Bartlett',    'Technical Author',     'London',       27,     '07/05/2011',   '$145,000'),
(41,    'Quinn Flynn',  'Support Lead', 'Edinburgh',    22,     '03/03/2013',   '$342,000'),
(42,    'Rhona Davidson',       'Integration Specialist',       'Tokyo',        55,     '14/10/2010',   '$327,900'),
(43,    'Sakura Yamamoto',      'Support Engineer',     'Tokyo',        37,     '19/08/2009',   '$139,575'),
(44,    'Serge Baldwin',        'Data Coordinator',     'Singapore',    64,     '09/04/2012',   '$138,575'),
(45,    'Shad Decker',  'Regional Director',    'Edinburgh',    51,     '13/11/2008',   '$183,000'),
(46,    'Shou Itou',    'Regional Marketing',   'Tokyo',        20,     '14/08/2011',   '$163,000'),
(47,    'Sonya Frost',  'Software Engineer',    'Edinburgh',    23,     '13/12/2008',   '$103,600'),
(48,    'Suki Burks',   'Developer',    'London',       53,     '22/10/2009',   '$114,500'),
(49,    'Tatyana Fitzpatrick',  'Regional Director',    'London',       19,     '17/03/2010',   '$385,750'),
(50,    'Thor Walton',  'Developer',    'New York',     61,     '11/08/2013',   '$98,540'),
(51,    'Tiger Nixon',  'System Architect',     'Edinburgh',    61,     '25/04/2011',   '$320,800'),
(52,    'Timothy Mooney',       'Office Manager',       'London',       37,     '11/12/2008',   '$136,200'),
(53,    'Unity Butler', 'Marketing Designer',   'San Francisco',        47,     '09/12/2009',   '$85,675'),
(54,    'Vivian Harrell',       'Financial Controller', 'San Francisco',        62,     '14/02/2009',   '$452,500'),
(55,    'Yuri Berry',   'Chief Marketing Officer (CMO)',        'New York',     40,     '25/06/2009',   '$675,000'),
(56,    'Zenaida Frank',        'Software Engineer',    'New York',     63,     '04/01/2010',   '$125,250'),
(57,    'Zorita Serrano',       'Software Engineer',    'San Francisco',        56,     '01/06/2012',   '$115,000');
-- 2018-02-23 14:04:44
