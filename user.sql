-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`user_id`, `name`, `email`, `telephone`, `active`) VALUES
(1,	'John Doe',	'johndoe@gmail.com',	'+3614554365',	1),
(2,	'Spring Brekke',	'springbrekke@hotmail.com',	'45647894514',	1),
(3,	'Lakeshia Carl',	'lakecarl@vipmail.com',	'44654854',	1),
(4,	'Jewell Nye',	'jenye@gmail.com',	'+3614589235',	1),
(5,	'Julieta Waynick',	'julietawaynick@gmail.com',	'+3618717464',	1),
(6,	'Monnie Fenwick',	'monnie.fenwick@gmail.com',	'+3615165484',	1),
(7,	'Verda Youmans',	'vyoum@gmail.com',	'205843318',	1),
(8,	'Trinh Knarr',	'trikna@gmail.com',	'307891494',	1),
(9,	'Mohammed Quast',	'mohammedq@yahoo.com',	'44128423',	1),
(10,	'Lorelei Gildersleeve',	'lorelei_gildersleeve@xmail.com',	'308889164',	1);

-- 2021-04-19 13:25:42
