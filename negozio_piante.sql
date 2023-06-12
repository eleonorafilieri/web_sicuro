-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 12, 2023 alle 12:39
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `negozio_piante`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `famiglia`
--

CREATE TABLE `famiglia` (
  `id_famiglia` int(20) NOT NULL,
  `nome` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `famiglia`
--

INSERT INTO `famiglia` (`id_famiglia`, `nome`) VALUES
(1, 'Ombrellifere'),
(2, 'Solonacee'),
(3, 'Crucifere'),
(4, 'Liliacee'),
(5, 'Fabacee'),
(6, 'Amarillidacee'),
(7, 'Apocinacee'),
(8, 'Borraginacee');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id_user` int(20) NOT NULL,
  `id_pianta` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `piante`
--

CREATE TABLE `piante` (
  `id_pianta` int(20) NOT NULL,
  `path_img` varchar(300) NOT NULL,
  `titolo` varchar(300) NOT NULL,
  `descrizione` varchar(500) NOT NULL,
  `id_famiglia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `piante`
--

INSERT INTO `piante` (`id_pianta`, `path_img`, `titolo`, `descrizione`, `id_famiglia`) VALUES
(0, './img/angelica.jpeg', 'Angelica sylvestris', 'Pianta perenne, provvista di una radice carnosa da cui si diparte un fusto robusto che può raggiungere un\'altezza di 2 m.; fusto cilindrico, ramoso, striato, suffuso di violetto, finemente pubescente nello scapo fiorale; guaine nodali (3–6 cm), avvolgono la base dei rami laterali; foglie basali con picciolo lungo 10–40 cm, 3 pennate, con segmenti elementari ovato-acuminati, dotati di una setola sottile ed appuntita posta nella parte apicale: ombrelle ampie, con 30-50 raggi pubescenti.', 1),
(1, './img/anethum.jpg', 'Anethum foeniculum', 'Pianta dall\'aroma dolce intenso (!). Rizoma orizzontale nodoso ed anulato, biancastro; fusto eretto, verde-scuro, cilindrico, ramoso. Foglie 3-4 pennatosette, completamente divise in lacinie capillari, per lo più giallastre. Ombrelle senza involucro; petali gialli; frutti 4-7 mm.', 1),
(2, './img/morella.jpeg', 'Solanum nigrum', 'Fusto eretto, ascendente, con 2 strie longitudinali. Foglie con picciolo parzialmente alato (1-3 cm) e lamina asimmetrica, lanceolata a ovata (3-5 X 5-8 cm). Fiori in cime (3-)5-10flore; calice conico 2.5 mm; corolla bianca lunga 6 mm, diam. 7 mm; bacca sferica (6-7 mm) verde e poi nera-lucida.Variabilità - Le inflorescenze sono irregolarmente ombrelliformi oppure allungate e più o meno racemiformi (S. moschatum Presl.);', 2),
(3, './img/datura_stramonium.jpg', 'Datura stramonium', 'Fusto prostrato o ascendente-dicotomo, pubescente. Foglie alterne con picciolo di 2-4 cm e lamina largamente ovata 6-13 X 10-15 cm, con grossi denti acuti; base troncata. Fiori solitari ascellari su peduncoli di 3-10 mm, alla fruttificazione lignificati; calice tubuloso 6-8 X 25-30 mm, con denti acuti di 5-7 mm; corolla candida o più o meno purpurea, tubulosa, lunga 6-8 cm, con lobi lesiniformi divergenti; capsula grande come una noce (3-5 cm), irta di aculei; semi neri 3 mm.', 2),
(4, './img/solanum.jpg', 'Solanum dulcamara', 'Fusto in basso legnoso e ramosissimo, in alto erbaceo, scandente; rami con pubescenza appressata. Foglie triangolari con picciolo alato di 2-3 cm e lamina triangolare di 3-6 X 5-10 cm, le superiori composte, con 1 In tutto il territorio : C.scun lato del picciolo. Cime più o meno ombrelliformi 10-20flore; calice 3 mm; corolla violetta con lacinie di 6 mm.', 2),
(5, './img/barbarea.jpg', 'Barbarea Vulgaris', 'La Barbarea vulgaris è una specie bienne o perenne. Tutta la panta emana un odore nauseabondo ed è glabra (o al massimo scarsamente pelosa). L\'altezza varia da 30 a 60 cm (minimo 20 cm; massimo 90 cm). La forma biologica è emicriptofita scaposa (H scap), ossia è una pianta erbacea con gemme svernanti al livello del suolo e protette dalla lettiera o dalla neve, dotata di un asse fiorale più o meno eretto e con poche foglie.', 3),
(6, './img/cheirantus.jpeg', 'Cheirantus cheiri', 'Pianta dal profumo inebriante molto fiorifera, perenne ma spesso coltivata come biennale. I fiori in mix di colori giallo, arancio, rossi, sbocciano numerosissimi in primavera o estate, secondo l\'epoca di semina. Ottima come coprisuolo, e nei muretti a secco.', 3),
(7, './img/lilium.jpg', 'Lilium bulbiferum', 'Il Lilium bulbiferum raggiunge in media 20–90 centimetri (7,9–35,4 pollici) di altezza, con un massimo di 120 centimetri (47 pollici). I bulbi sono ovoidali, con squame biancastre grandi e appuntite e possono raggiungere circa 1,5 centimetri (0,59 pollici) di diametro. Il fusto è eretto, le foglie sono lanceolate, lunghe fino a 10 centimetri. L\'infiorescenza ha da uno a cinque fiori a pelo corto. ', 4),
(8, './img/erythronium.jpg', 'Erythronium dens-canis', 'Si tratta di una pianta perenne e glabra. L\'altezza varia da 10 a 20 cm. La forma biologica è geofita bulbosa (G bulb): ossia sono piante perenni erbacee che portano le gemme in posizione sotterranea. Durante la stagione avversa non presentano organi aerei e le gemme si trovano in un organo sotterraneo chiamato bulbo, un organo di riserva dal quale, ogni anno, si dipartono radici e fusti aerei.', 4),
(9, './img/trifolium_pratense.jpg', 'Trifolium pratense', 'Il trifoglio rosso è una pianta erbacea perenne a vita breve (nonostante la denominazione, in Italia ha un ciclo di vita che rarissimamente supera i due anni). Varia in dimensioni, andando da 20 a 80 cm di altezza. Ha un fittone molto ramificato che gli permette di sopportare la siccità e gli dà un buon effetto di sostegno sul terreno.[2]', 5),
(10, './img/spartium_junceum.jpg', 'Spartium Junceum', 'È una pianta perenne a portamento arbustivo (alto sino a 1,5 m).\r\nI fusti sono verdi, cilindrici, compressibili ma resistenti (abbastanza da essere difficile strapparli a mani nude), eretti, ramosissimi e sono detti vermene.\r\n\r\nLe foglie sono lanceolate, i fiori sono portati in racemi terminali di colore giallo intenso. Fiorisce nel periodo fra maggio e giugno.\r\n\r\nI frutti sono dei legumi; i semi vengono lasciati cadere per gravità a poca distanza dalla pianta madre.', 5),
(11, './img/Securigera_varia.jpg', 'Securigera Varia', 'La securigera varia o coronilla rosa (dal nome spagnolo) è una pianta spontanea perenne, della famiglia delle leguminose, fabacee, alta fino a 70 cm.. I fiori sono bianco rosati su fusti dapprima inclinati, poi al momento della fioritura e della fruttificazione eretti.', 5),
(12, './img/allium_carinatum.jpeg', 'Allium carinatum', 'L\'aglio delle streghe è una specie a distribuzione submediterraneo-subatlantica presente nelle regioni dell\'Italia nord-orientale, in Lombardia, Liguria, nelle Marche e in Umbria (non stata ritrovata in tempi recenti in Abruzzo). Nel territorio euganeo si trova un po\' ovunque sui maggiori rilievi ma non è abbondante. Cresce in incolti e pascoli aridi, a volte lungo i greti dei torrenti, dal livello del mare alla fascia montana. ', 6),
(13, './img/pancratium.jpg', 'Pancratium maritimum', 'Pancratium maritimum è una pianta perenne bulbosa, con fusto alto sino a 40 cm e ampie foglie lineari.\r\n\r\nI fiori, da 3 a 15, bianchi e lunghi fino a 15 cm, sono riuniti in infiorescenze ad ombrella; si aprono tra luglio e ottobre. I fiori hanno un profumo intenso e persistente di giglio, che diventa percepibile principalmente durante le notti d\'estate senza vento.\r\n\r\nIl frutto è una capsula contenente semi neri lucidi di forma irregolare.', 6),
(14, './img/vinca_minor.jpg', 'Vinca minor', 'Fusti tenaci, lungamente (1 m e più) striscianti sulla superficie del suolo. Foglie sempreverdi con picciolo di 2-4 mm e lamina lanceolata (10-16 X 22-35 mm), intera, ottusa all\'apice, di sotto con nervature reticolate sporgenti. Fiori isolati ascellari; peduncoli 9-15 mm; calice 3 mm diviso su ⅔ in lacinie triangolari (1 X 2.2 mm ca.)', 7),
(15, './img/pervinca.jpg', 'Vinca Major', 'Di origini europee, è un genere di 7 specie di piante erbacee e suffruticose, perenni, di dimensioni ridotte. Le più diffuse sono V. minor e Vinca major, piante perenni striscianti, utilizzate anche nei giardini rocciosi. Si tratta di piante perenni sempreverdi. Sono diffuse in tutta Europa, soprattutto nel sottobosco, in zone ombrose, dove si espandono agevolate dal portamento strisciante.', 7),
(16, './img/echium_vulgare.jpeg', 'Echium vulgare', 'L’erba viperina è una pianta erbacea biennale della famiglia delle Boraginaceae, ha attitudine all’auto-propagazione ed è un’ottima pianta per una coltivazione in zone incolte e asciutte.\r\n\r\nI suoi fusti raggiungono un’altezza che varia tra i 30-90 centimetri e sono ricoperti da una sottile peluria. I fiori dell’erba viperina sono di colore blu e sbocciano in estate.', 8),
(17, './img/myosotis_scorpioides.jpg', 'Myosotis Scorpioides', 'Pianta annerente alla disseccazione. Rizoma strisciante stolonifero; fusti ascendenti a eretti, un po\' carnosi, glabri o in alto con peli patenti. Fg. oblanceolato-lineari (1-1.5 X 5-8 cm), acute, glabrescenti o con peli appressati rivolti verso l\'apice (raramente le inferiori con peli riflessi). Inflor. breve e densa, con asse a peli appressati; peduncoli alla frutt. 6-10 mm; calice 2.5-4 mm, frutt. fino a 6 mm, diviso su ⅖; corolla blu-violetta, rosea al centro, con lembo piano diametro 8 mm.', 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id_user` int(30) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `admin`) VALUES
(0, 'eleonora', 'eleonora', 0),
(1, 'giorgia', 'giorgia', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `famiglia`
--
ALTER TABLE `famiglia`
  ADD PRIMARY KEY (`id_famiglia`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id_user`,`id_pianta`),
  ADD KEY `id_pianta` (`id_pianta`);

--
-- Indici per le tabelle `piante`
--
ALTER TABLE `piante`
  ADD PRIMARY KEY (`id_pianta`),
  ADD KEY `id_famiglia` (`id_famiglia`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`id_pianta`) REFERENCES `piante` (`id_pianta`),
  ADD CONSTRAINT `ordini_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Limiti per la tabella `piante`
--
ALTER TABLE `piante`
  ADD CONSTRAINT `piante_ibfk_1` FOREIGN KEY (`id_famiglia`) REFERENCES `famiglia` (`id_famiglia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
