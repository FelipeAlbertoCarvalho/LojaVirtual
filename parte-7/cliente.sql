SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf` decimal(11,0) NOT NULL,
  `telefone` decimal(11,0) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
