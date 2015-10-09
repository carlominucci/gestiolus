--
-- Struttura della tabella `guasti`
--

CREATE TABLE IF NOT EXISTS `guasti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nomepc` varchar(100) NOT NULL,
  `ubicazione` varchar(50) NOT NULL,
  `descrizione` text NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_apertura` date NOT NULL,
  `soluzione` text NOT NULL,
  `risolutore` varchar(50) NOT NULL,
  `data_chiusura` date NOT NULL,
  `stato` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;

--
-- Struttura della tabella `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;

--
-- Struttura della tabella `tecnici`
--

CREATE TABLE IF NOT EXISTS `tecnici` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `punteggio` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;
