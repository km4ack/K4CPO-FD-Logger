
CREATE DATABASE IF NOT EXISTS `fieldday` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fieldday`;


DROP TABLE IF EXISTS `band`;
CREATE TABLE IF NOT EXISTS `band` (
`id` int(10) NOT NULL,
  `band` varchar(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;



INSERT INTO `band` (`id`, `band`) VALUES
(1, '160M'),
(2, '80M'),
(3, '40M'),
(4, '20M'),
(5, '15M'),
(6, '10M'),
(7, '6M'),
(8, '2M'),
(9, '1.25M'),
(10, '70CM'),
(11, '33CM'),
(12, '23CM');


DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
`id` int(10) NOT NULL,
  `station` varchar(100) NOT NULL,
  `band` varchar(10) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `dt` datetime NOT NULL,
  `call` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `mode`;
CREATE TABLE IF NOT EXISTS `mode` (
`id` int(10) NOT NULL,
  `mode` varchar(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `mode` (`id`, `mode`) VALUES
(1, 'Digital'),
(2, 'Phone'),
(3, 'CW');


DROP TABLE IF EXISTS `sectabb`;
CREATE TABLE IF NOT EXISTS `sectabb` (
`id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `abb` varchar(5) NOT NULL,
  `section` varchar(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;


INSERT INTO `sectabb` (`id`, `name`, `abb`, `section`) VALUES
(1, 'Connecticut', 'CT', '1'),
(2, 'EasternÃ‚Â Ã‚Â Massachusetts', 'EMA', '1'),
(3, 'Maine', 'ME', '1'),
(4, 'New Hampshire', 'NH', '1'),
(5, 'Rhode Island', 'RI', '1'),
(6, 'Vermont', 'VT', '1'),
(7, 'Western Massachusetts', 'WMA', '1'),
(8, 'Eastern New York', 'ENY', '2'),
(9, 'New York City - Long Island', 'NLI', '2'),
(10, 'Northern New Jersey', 'NNJ', '2'),
(11, 'Northern New York', 'NNY', '2'),
(12, 'Southern New Jersey', 'SNJ', '2'),
(13, 'Western New York', 'WNY', '2'),
(14, 'Delaware', 'DE', '3'),
(15, 'Eastern Pennsylvania', 'EPA', '3'),
(16, 'Maryland-DC', 'MDC', '3'),
(17, 'Western Pennsylvania', 'WPA', '3'),
(18, 'Alabama', 'AL', '4'),
(19, 'Georgia', 'GA', '4'),
(20, 'Kentucky', 'KY', '4'),
(21, 'North Carolina', 'NC', '4'),
(22, 'Northern Florida', 'NFL', '4'),
(23, 'South Carolina', 'SC', '4'),
(24, 'Southern Florida', 'SFL', '4'),
(25, 'WestÃ‚Â Ã‚Â Central Florida', 'WCF', '4'),
(26, 'Tennessee', 'TN', '4'),
(27, 'Virginia', 'VA', '4'),
(28, 'Puerto Rico', 'PR', '4'),
(29, 'Virgin Islands', 'VI', '4'),
(30, 'Arkansas', 'AR', '5'),
(31, 'Louisiana', 'LA', '5'),
(32, 'Mississippi', 'MS', '5'),
(33, 'New Mexico', 'NM', '5'),
(34, 'North Texas', 'NTX', '5'),
(35, 'Oklahoma', 'OK', '5'),
(36, 'South Texas', 'STX', '5'),
(37, 'West Texas', 'WTX', '5'),
(38, 'East Bay', 'EB', '6'),
(39, 'Los Angeles', 'LAX', '6'),
(40, 'Orange', 'ORG', '6'),
(41, 'Santa Barbara', 'SB', '6'),
(42, 'Santa Clara Valley', 'SCV', '6'),
(43, 'San Diego', 'SDG', '6'),
(44, 'San Francisco', 'SF', '6'),
(45, 'San Joaquin Valley', 'SJV', '6'),
(46, 'Sacramento Valley', 'SV', '6'),
(47, 'Pacific', 'PAC', '6'),
(48, 'Arizona', 'AZ', '7'),
(49, 'Eastern Washington', 'EWA', '7'),
(50, 'Idaho', 'ID', '7'),
(51, 'Montana', 'MT', '7'),
(52, 'Nevada', 'NV', '7'),
(53, 'Oregon', 'OR', '7'),
(54, 'Utah', 'UT', '7'),
(55, 'Western Washington', 'WWA', '7'),
(56, 'Wyoming', 'WY', '7'),
(57, 'Alaska', 'AK', '7'),
(58, 'Michigan', 'MI', '8'),
(59, 'Ohio', 'OH', '8'),
(60, 'West Virginia', 'WV', '8'),
(62, 'Illinois', 'IL', '9'),
(63, 'Indiana', 'IN', '9'),
(64, 'Wisconsin', 'WI', '9'),
(65, 'Colorado', 'CO', '0'),
(66, 'Iowa', 'IA', '0'),
(67, 'Kansas', 'KS', '0'),
(68, 'Minnesota', 'MN', '0'),
(69, 'Missouri', 'MO', '0'),
(70, 'Nebraska', 'NE', '0'),
(71, 'North Dakota', 'ND', '0'),
(72, 'South Dakota', 'SD', '0'),
(73, 'Maritime', 'MAR', 'CN'),
(74, 'Newfoundland/Labrador', 'NL', 'CN'),
(75, 'Quebec', 'QC', 'CN'),
(76, 'Ontario East', 'ONE', 'CN'),
(77, 'Ontario North', 'ONN', 'CN'),
(78, 'Ontario South', 'ONS', 'CN'),
(79, 'Greater Toronto Area', 'GTA', 'CN'),
(80, 'Manitoba', 'MB', 'CN'),
(81, 'Saskatchewan', 'SK', 'CN'),
(82, 'Alberta', 'AB', 'CN'),
(83, 'British Columbia', 'BC', 'CN'),
(84, 'Northern Territories', 'NT', 'CN');


DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `year` int(4) NOT NULL,
  `sat` date NOT NULL,
  `sun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `settings` (`year`, `sat`, `sun`) VALUES
(2020, '2020-06-27', '2020-06-28');


DROP TABLE IF EXISTS `voice`;
CREATE TABLE IF NOT EXISTS `voice` (
  `fkey` varchar(5) NOT NULL,
  `text` varchar(20) NOT NULL,
  `voice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `voice` (`fkey`, `text`, `voice`) VALUES
('F1', 'CQCQCQ', 'toldyouitwaswrong.wav');

ALTER TABLE `band`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectabb`
--
ALTER TABLE `sectabb`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voice`
--
ALTER TABLE `voice`
 ADD PRIMARY KEY (`fkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sectabb`
--
ALTER TABLE `sectabb`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
