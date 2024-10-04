-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jun-2024 às 23:45
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `14356-m7-tutorial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `albums`
--

CREATE TABLE `albums` (
  `id_album` int(255) NOT NULL,
  `artista` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `albums`
--

INSERT INTO `albums` (`id_album`, `artista`, `album`, `imagem`) VALUES
(1, 'Playboi Carti', 'Whole Lotta Red', '1.png'),
(2, 'Playboi Carti', 'Die Lit', '2.png'),
(3, 'Playboi Carti', 'Playboi Carti', '3.png'),
(4, 'Travis Scott', 'Utopia', '4.png'),
(5, 'Travis Scott', 'Astroworld', '5.png'),
(6, 'Travis Scott', 'Birds in the Trap Sing McKnight', '6.png'),
(7, 'Travis Scott', 'Rodeo', '7.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `musicas`
--

CREATE TABLE `musicas` (
  `id_musica` int(255) NOT NULL,
  `id_album` int(255) NOT NULL,
  `musica` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `musicas`
--

INSERT INTO `musicas` (`id_musica`, `id_album`, `musica`, `links`) VALUES
(1, 1, 'Rockstar Made', 'https://open.spotify.com/intl-pt/track/3cWmqvMwVQKDigWLSZ3w9h?si=2260ae551aef4950'),
(2, 1, 'Go2DaMoon', 'https://open.spotify.com/intl-pt/track/0F13K9dwYH2zpTWiR8d628?si=ae820e6f268641b1'),
(3, 2, 'Long Time', 'https://open.spotify.com/intl-pt/track/4IO2X2YoXoUMv0M2rwomLC?si=5e2cf2618da14368'),
(4, 2, 'R.I.P.', 'https://open.spotify.com/intl-pt/track/3L0IKstjUgDFVQAbQIRZRv?si=0a76d338721e4d8a'),
(5, 3, 'Location', 'https://open.spotify.com/intl-pt/track/3yk7PJnryiJ8mAPqsrujzf?si=ac27a070125e40ce'),
(6, 3, 'Magnolia', 'https://open.spotify.com/intl-pt/track/1e1JKLEDKP7hEQzJfNAgPl?si=10c4b34fe1f342eb'),
(7, 4, 'HYAENA', 'https://open.spotify.com/intl-pt/track/0hL9gOw6XBWsygEUcVjxEc?si=5a207e97f2bc4942'),
(8, 5, 'STARGAZING', 'https://open.spotify.com/intl-pt/track/7wBJfHzpfI3032CSD7CE2m?si=f918ffcfbe534773');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`);

--
-- Índices para tabela `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`id_musica`),
  ADD KEY `id_album` (`id_album`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `musicas`
--
ALTER TABLE `musicas`
  MODIFY `id_musica` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `musicas`
--
ALTER TABLE `musicas`
  ADD CONSTRAINT `musicas_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `albums` (`id_album`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
