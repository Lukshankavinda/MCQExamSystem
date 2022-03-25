CREATE TABLE `db_test`.`user` (
 	`email` VARCHAR(100) NOT NULL ,
	`password` VARCHAR(10) NOT NULL , 
	`role` ENUM('Teacher','Student') NOT NULL ,
	PRIMARY KEY (`email`)) ENGINE = InnoDB;
	
	
INSERT INTO `user` (`email`, `password`, `role`) 
VALUES   ('teacher@testmail.com', 'abcd1', 'Teacher'), 
		 ('student1@testmail.com', 'abcd1', 'Student'),
		 ('student2@testmail.com', 'abcd1', 'Student'), 
		 ('student3@testmail.com', 'abcd1', 'Student');
​

CREATE TABLE `db_test`.`teacher` ( 
	`teacher_id` INT(5) NOT NULL AUTO_INCREMENT , 
	`teacher_name` VARCHAR(100) NOT NULL , 
	`teacher_email` VARCHAR(100) NOT NULL , 
	PRIMARY KEY (`teacher_id`)) ENGINE = InnoDB;
	
​ALTER TABLE `teacher` ADD FOREIGN KEY (`teacher_email`) REFERENCES `user`(`email`) ON DELETE CASCADE ON UPDATE CASCADE; 

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`) 
VALUES ('01001', 'lukshan kavinda ', 'teacher@testmail.com');

CREATE TABLE `db_test`.`student` ( 
	`student_id` INT(5) NOT NULL AUTO_INCREMENT , 
	`student_name` VARCHAR(100) NOT NULL , 
	`student_email` VARCHAR(100) NOT NULL , 
	PRIMARY KEY (`student_id`)) ENGINE = InnoDB;
	​
ALTER TABLE `student` ADD FOREIGN KEY (`student_email`) REFERENCES `user`(`email`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `student` (`student_id`, `student_name`, `student_email`) 
VALUES ('02001', 'p ajantha gamage', 'student1@testmail.com'), 
	   ('02002', 's vishva sasanka', 'student2@testmail.com'),
	   ('02003', 'w m avishka saumya', 'student3@testmail.com');
 
CREATE TABLE `db_test`.`exam` (
 	`exam_id` INT(5) NOT NULL AUTO_INCREMENT , 
	`exam_name` VARCHAR(100) NOT NULL , 
	`exam_start` DATETIME NOT NULL , 
	`exam_end` DATETIME NOT NULL , 
	`exam_duration` TIME NOT NULL , 
	PRIMARY KEY (`exam_id`)) ENGINE = InnoDB;
	
INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_start`, `exam_end`, `exam_duration`) 
VALUES ('3001', 'year End exam', '2022-03-26 09:00:00', '2022-03-26 11:00:00', '00:45:00'), 
	   ('3002', 'mid year exam', '2022-03-24 10:00:00', '2022-03-24 13:00:00', '00:30:00');	
​

CREATE TABLE `db_test`.`exam_status` ( 
	`exam_id` INT NOT NULL , 
	`teacher_id` INT NOT NULL , 
	`last_update` DATETIME NOT NULL , 
	`status` ENUM('Published','Draft') NOT NULL ,
	PRIMARY KEY(`exam_id`)) ENGINE = InnoDB;

ALTER TABLE `exam_status` ADD FOREIGN KEY (`exam_id`) REFERENCES `exam`(`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `exam_status` ADD FOREIGN KEY (`teacher_id`) REFERENCES `teacher`(`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `exam_status` (`exam_id`, `teacher_id`, `last_update`, `status`) 
VALUES ('3001', '1001', '2022-03-21 18:30:00', 'Draft'), 
	   ('3002', '1001', '2022-03-20 12:30:00', 'Published');


CREATE TABLE `db_test`.`exam_student_status` ( 
	`exam_id` INT(5) NOT NULL , 
	`student_id` INT(5) NOT NULL , 
	`status` ENUM('Pending','Attended') NOT NULL , 
	PRIMARY KEY (`exam_id`, `student_id`)) ENGINE = InnoDB;

ALTER TABLE `exam_student_status` ADD FOREIGN KEY (`exam_id`) REFERENCES `exam`(`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;
​ALTER TABLE `exam_student_status` ADD FOREIGN KEY (`student_id`) REFERENCES `student`(`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `exam_student_status` (`exam_id`, `student_id`, `status`) 
VALUES ('3002', '2001', 'Pending'), 
	   ('3001', '2001', 'Pending');



CREATE TABLE `db_test`.`exam_result` ( 
	`exam_id` INT(5) NOT NULL , 
	`student_id` INT(5) NOT NULL , 
	`result` INT(3) NOT NULL , 
	PRIMARY KEY (`exam_id`, `student_id`)) ENGINE = InnoDB;
	
ALTER TABLE `exam_result` ADD FOREIGN KEY (`student_id`) REFERENCES `student`(`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `exam_result` ADD FOREIGN KEY (`exam_id`) REFERENCES `exam`(`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `db_test`.`question` ( 
	`question_id` INT(5) NOT NULL , 
	`exam_id` INT(5) NOT NULL , 
	`question` VARCHAR(200) NOT NULL , 
	`answer_1` VARCHAR(50) NOT NULL , 
	`answer_2` VARCHAR(50) NOT NULL , 
	`answer_3` VARCHAR(50) NOT NULL , 
	`answer_4` VARCHAR(50) NOT NULL , 
	`right_answer` ENUM('01','02','03','04') NOT NULL , 
	`mark` INT(3) NOT NULL 
	PRIMARY KEY(`question_id`)) ENGINE = InnoDB;
​
ALTER TABLE `question` ADD FOREIGN KEY (`exam_id`) REFERENCES `exam`(`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `question` 
(`question_id`, `exam_id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `right_answer`, `mark`) 
VALUES 
('1', '3001', 'If 5X + 32 = 4 - 2X , what is the value of x ?', '-4', '-3', '4', '3', '01', '5'), 
('2', '3001', 'Which of the following numbers is farthest from the number 1 on the number line?', '10', '5', '-5', '-10', '04', '5')
('3', '3001', 'Which one of the following rivers flows between Vindhyan and Satpura ranges?', 'Narmada', 'Mahanadi', 'Son', 'Netravati', '01', '5'), 
('4', '3001', 'The Central Rice Research Station is situated in?', 'Chennai', ' Cuttack', 'Bangalore', 'Quilon', '02', '5'),
('5', '3001', 'Who among the following wrote Sanskrit grammar?', 'Kalidasa', 'Charak', 'Panini', ' Aryabhatt', '03', '5'), 
('6', '3001', ' Which among the following headstreams meets the Ganges in last?', 'Alaknanda', ' Pindar', 'Mandakini', ' Bhagirathi', '04', '5'),
('7', '3001', 'The metal whose salts are sensitive to light is?', 'Zinc', 'Silver', ' Copper', ' Aluminum', '02', '5'), 
('8', '3001', 'Patanjali is well known for the compilation of –', ' Yoga Sutra', 'Panchatantra', 'Brahma Sutra', ' Ayurveda', '01', '5'), 
('9', '3001', 'River Luni originates near Pushkar and drains into which one of the following?', ' Rann of Kachchh', 'Arabian Sea', 'Gulf of Cambay', ' Lake Sambhar', '01', '5'), 
('10', '3001', 'Which one of the following rivers originates in the Brahmagiri range of Western Ghats?', ' Pennar', 'Cauvery', ' Krishna', 'Tapti', '02', '5'),
('11', '3002', 'The country that has the highest in Barley Production?', 'China', 'India', 'Russia', ' France', '03', '5'), 
('12', '3002', 'Tsunamis are not caused by', 'Hurricanes', 'Earthquakes', ' Undersea landslides', ' Volcanic eruptions', '01', '5'), 
('13', '3002', 'Chambal river is a part of –', ' Sabarmati basin', 'Ganga basin', 'Narmada basin', ' Godavari basin', '03', '5'), 
('14', '3002', ' D.D.T. was invented by?', 'Mosley', ' Rudolf', 'Karl Benz', ' Dalton', '01', '5'), 
('15', '3002', 'Volcanic eruptions do not occur in the', 'Baltic sea', ' Black sea', 'Caribbean sea', 'Caspian sea', '01', '5');


CREATE TABLE `db_test`.`exam_result_save` ( 
	`id` INT(3) NOT NULL AUTO_INCREMENT , 
	`student_id` INT(5) NOT NULL , 
	`exam_id` INT(5) NOT NULL , 
	`question_id` INT(5) NOT NULL , 
	`input_answer` ENUM('01','02','03','04') NOT NULL , 
	PRIMARY KEY (`id`, `student_id`, `exam_id`, `question_id`)) ENGINE = InnoDB;
	

	

