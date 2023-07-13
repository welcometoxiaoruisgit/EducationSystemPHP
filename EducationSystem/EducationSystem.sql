--
-- Database: `schsys`
--

-- --------------------------------------------------------

--
-- class table
CREATE TABLE `c` (
                     `cno` char(4) COLLATE utf8_bin NOT NULL COMMENT 'Class ID',
                     `cname` char(30) COLLATE utf8_bin NOT NULL COMMENT 'Class Name',
                     `credit` int(4) DEFAULT NULL COMMENT 'Credits',
                     `cmajor` char(20) COLLATE utf8_bin DEFAULT NULL COMMENT 'Major'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO `c` (`cno`, `cname`, `credit`, `cmajor`) VALUES
                                                         ('1000', 'Key Concepts in Computer Sci', 3, 'CS'),
                                                         ('1400', 'Intro: Algorithms & Prog', 3, 'CS'),
                                                         ('2120', 'OOP-JAVA', 3, 'CS'),
                                                         ('1111', 'Basketball', 3, 'PE'),
                                                         ('2222', 'Baseball', 3, 'PE'),
                                                         ('3000', 'Advanced Accounting', 3, 'Accounting'),
                                                         ('2000', 'Microeconomics', 3, 'Accounting');

-- class student
CREATE TABLE `s` (
                     `username` char(5) COLLATE utf8_bin NOT NULL,
                     `sno` char(9) COLLATE utf8_bin NOT NULL,
                     `name` char(20) COLLATE utf8_bin,
                     `sex` char(10) COLLATE utf8_bin,
                     `age` int(3) DEFAULT NULL,
                     `email` varchar(20),
                     `tel` char(11) COLLATE utf8_bin DEFAULT NULL,
                     `dept` char(10) COLLATE utf8_bin DEFAULT NULL,
                     `major` char(20) COLLATE utf8_bin NOT NULL,
                     `grade` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO `s` (`username`, `sno`, `name`, `sex`, `age`,`email`, `tel`, `dept`, `major`, `grade`) VALUES
                                                                                                       ('10001', '110078830', 'Mike', 'male', 19, 'Mike@uwindsor.ca','123456789', 'Computer', 'CS', 0),
                                                                                                       ('10002', '110067777', 'Judy', 'female', 20,'Judy@uwindsor.ca', '100000001', 'Computer', 'CS', 0),
                                                                                                       ('10003', '110012345', 'Jose', 'male', 21, 'Jose@uwindsor.ca','987654321', 'Accounting', 'Accounting', 0),
                                                                                                       ('10004', '110054321', 'Naci', 'female', 22, 'Naci@uwindsor.ca','823456700', 'PE', 'PE', 0);


-- student enrolls classes
CREATE TABLE `sc` (
                      `sno` char(9) COLLATE utf8_bin NOT NULL,
                      `cno` char(4) COLLATE utf8_bin NOT NULL,
                      `cgrade` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `sc` (`sno`, `cno`, `cgrade`) VALUES
                                              ('110078830', '1000', 0),
                                              ('110078830', '1400', 0),
                                              ('110078830', '2120', 0),
                                              ('110067777', '1000', 0),
                                              ('110067777', '1400', 0),
                                              ('110012345', '2000', 0),
                                              ('110012345', '3000', 0),
                                              ('110054321','1111',0),
                                              ('110054321','2222',0);

CREATE TABLE `t` (
                     `username` char(6) COLLATE utf8_bin NOT NULL,
                     `tno` char(9) COLLATE utf8_bin NOT NULL,
                     `name` char(20) COLLATE utf8_bin NOT NULL,
                     `sex` char(10) COLLATE utf8_bin NOT NULL,
                     `age` int(3) DEFAULT NULL,
                     `email` varchar(20),
                     `tel` char(9) COLLATE utf8_bin DEFAULT NULL,
                     `dept` char(10) COLLATE utf8_bin NOT NULL,
                     `class` char(30) COLLATE utf8_bin DEFAULT NULL,
                     `cno` char(4) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `t` (`username`, `tno`, `name`, `sex`, `age`, `email`,`tel`, `dept`, `class`, `cno`) VALUES
                                                                                                     ('20001', '200000000', 'Curtis', 'male', 42, 'Curtis@uwindsor.ca','888888888', 'CS', 'Key Concepts in Computer Sci', '1000'),
                                                                                                     ('20002', '200000001', 'Fani', 'male', 44, 'Fani@uwindsor.ca','888888889', 'CS', 'Intro: Algorithms & Prog', '1400'),
                                                                                                     ('20003', '200000002', 'Afshar', 'male', 43, 'Afshar@uwindsor.ca','888888890', 'CS', 'OOP-JAVA', '2120'),
                                                                                                     ('20004', '200000003', 'Sun', 'male', 38, 'Sun@uwindsor.ca','800000001', 'PE', 'Basketball', '1111'),
                                                                                                     ('20005', '200000004', 'Snow', 'female', 35, 'Flower@uwindsor.ca' ,'800000002', 'PE', 'Baseball', '2222'),
                                                                                                     ('20006', '200000005', 'Rain', 'female', 38, 'Rain@uwindsor.ca','880000001', 'Accounting', 'Advanced Accounting', '3000'),
                                                                                                     ('20007', '200000006', 'Fog', 'male', 38, 'Fog@uwindsor.ca','880000002', 'Accounting', 'Microeconomics', '2000');


CREATE TABLE `user` (
                        `username` char(6) COLLATE utf8_bin NOT NULL,
                        `password` char(6) COLLATE utf8_bin NOT NULL DEFAULT '123456',
                        `role` char(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `user` (`username`, `password`, `role`) VALUES
                                                        ('00000', '000000', 'Admin'),
                                                        ('10001', '123456', 'Student'),
                                                        ('10002', '123456', 'Student'),
                                                        ('10003', '123456', 'Student'),
                                                        ('10004', '123456', 'Student'),
                                                        ('20001', '123456', 'Teacher'),
                                                        ('20002', '123456', 'Teacher'),
                                                        ('20003', '123456', 'Teacher'),
                                                        ('20004', '123456', 'Teacher'),
                                                        ('20005', '123456', 'Teacher'),
                                                        ('20006', '123456', 'Teacher'),('20007', '123456', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c`
--
ALTER TABLE `c`
    ADD PRIMARY KEY (`cno`);

--
-- Indexes for table `s`
--
ALTER TABLE `s`
    ADD PRIMARY KEY (`username`);

--
-- Indexes for table `sc`
--
ALTER TABLE `sc`
    ADD PRIMARY KEY (`sno`,`cno`);

--
-- Indexes for table `t`
--
ALTER TABLE `t`
    ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`username`);
