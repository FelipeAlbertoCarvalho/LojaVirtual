SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

INSERT INTO `produto` (`id`, `codigo`, `nome`, `quantidade`) VALUES
(1, 116150, 'General Motors', 668),
(2, 142887, 'Lexus', 502),
(3, 132307, 'Volvo', 557),
(4, 53479, 'JLR', 495),
(5, 12662, 'Nissan', 680),
(6, 184977, 'Acura', 31),
(7, 172719, 'Audi', 344),
(8, 73473, 'Smart', 72),
(9, 178144, 'FAW', 288),
(10, 4753, 'JLR', 699),
(11, 94946, 'Honda', 861),
(12, 41118, 'Jeep', 769),
(13, 174818, 'Ferrari', 218),
(14, 113777, 'Dongfeng Motor', 545),
(15, 164915, 'Acura', 108),
(16, 184615, 'Buick', 893),
(17, 106175, 'Peugeot', 168),
(18, 125264, 'Mercedes-Benz', 592),
(19, 37776, 'Lincoln', 152),
(20, 31040, 'Tata Motors', 335),
(21, 79813, 'Lincoln', 670),
(22, 92053, 'GMC', 296),
(23, 13974, 'Chevrolet', 836),
(24, 174123, 'Seat', 975),
(25, 67187, 'Infiniti', 811),
(26, 97755, 'Volkswagen', 857),
(27, 138321, 'Hyundai Motors', 404),
(28, 11701, 'Citroën', 578),
(29, 32197, 'Peugeot', 518),
(30, 197316, 'FAW', 539),
(106, 0, 'wwrw', 23),
(107, 0, 'wwrw', 23);
COMMIT;
