drop database carros;

create database carros;

use carros;

CREATE TABLE `veiculos` (
  `codigovei` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `descricao` text NOT NULL,
  `portas` int(2) NOT NULL,
  `ano_fab` char(4) NOT NULL,
  `ano_mod` char(4) NOT NULL,
  `cor` varchar(40) NOT NULL,
  `km` double NOT NULL,
  `placa` text NOT NULL,
  `valor` double NOT NULL,
  `obs` text NOT NULL,
  `dtinclu` date NOT NULL,
  `ativo` text NOT NULL,
  `fotonome1` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;