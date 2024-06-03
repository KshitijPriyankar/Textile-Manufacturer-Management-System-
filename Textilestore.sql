
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";





CREATE TABLE `brands` (
  `serial` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `brands` (`serial`, `description`) VALUES
('1', '25% off Mufti'),
('2', '15% off Allen Solly'),
('3', '5% off all Monte Carlo'),
('4', '1 for 1 of Cantabil'),
('5', '5% off all Peter England'),
('6', '5% off all John Miller'),
('7', '5% off all Bare Denim'),
('8', '5% off all Van Heusen'),
('9', '5% off all John Players'),
('10', '5% off all U.S. Polo ASSN'),
('11', '5% off all Raymond'),
('12', '5% off all Giovani'),
('13', '5% off all Spykar'),
('14', '5% off all Arrow'),
('15', '5% off all LP Jeans');








CREATE TABLE `Textile` (
  `id` int(16) NOT NULL,
  `model` varchar(20) NOT NULL,
  `price` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `Textile` (`id`, `model`, `price`) VALUES
(1, 'Mufti', 450),
(2, 'Allen Solly', 300),
(3, 'Monte Carlo', 200),
(4, 'Cantabil', 420),
(5, 'Peter England', 520),
(6, 'John Miller', 620),
(7, 'Bare Denim', 720),
(8, 'Van Heusen', 820),
(9, 'John Players', 920),
(10, ' U.S. Polo ASSN', 1020),
(11, 'Raymond', 1120),
(12, 'Giovani', 1220),
(13, 'Spykar', 1320),
(14, 'Arrow', 1420),
(15, 'LP Jeans', 1520);





CREATE TABLE `store` (
  `id` int(16) NOT NULL,
  `store_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `store` (`id`, `store_name`) VALUES
(1, 'Mufti'),
(2, 'Allen Solly'),
(3, 'Monte Carlo'),
(4, 'Cantabil'),
(5, 'Peter England'),
(6, 'John Miller'),
(7, 'Bare Denim'),
(8, 'Van Heusen'),
(9, 'John Players'),
(10, ' U.S. Polo ASSN'),
(11, 'Raymond'),
(12, 'Giovani'),
(13, 'Spykar'),
(14, 'Arrow'),
(15, 'LP Jeans');




ALTER TABLE `Textile`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);
COMMIT;
