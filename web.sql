-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 mars 2021 à 11:24
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `ID` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID`, `ID_Utilisateur`) VALUES
(1, 7),
(8, 21);

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `ID_Offre_de_stage` int(11) NOT NULL,
  `ID_Etudiant` int(11) NOT NULL,
  `etape` int(11) DEFAULT NULL,
  `CV` text DEFAULT NULL,
  `lettre_de_motivation` text DEFAULT NULL,
  `Fiche_de_validation` text DEFAULT NULL,
  `Convention_de_stage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`ID_Offre_de_stage`, `ID_Etudiant`, `etape`, `CV`, `lettre_de_motivation`, `Fiche_de_validation`, `Convention_de_stage`) VALUES
(7, 19, 1, '../fichierutilisateur/offredestage/19_7_CVCV.pdf', '../fichierutilisateur/offredestage/19_7_LMlettre de motivation.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `delegue`
--

CREATE TABLE `delegue` (
  `ID` int(11) NOT NULL,
  `Droits` varchar(255) DEFAULT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `delegue`
--

INSERT INTO `delegue` (`ID`, `Droits`, `ID_Utilisateur`) VALUES
(1, '11111111111110001000010000000001100', 18),
(2, '00000000000000001111000000000000000', 19),
(3, '10000000000001000000000000000000000', 22),
(4, '10000000000001000000000000000000000', 23),
(5, '10000000000000000000001101000000000', 24),
(8, '11111111111111111111011111000001100', 25);

-- --------------------------------------------------------

--
-- Structure de la table `dirige_d`
--

CREATE TABLE `dirige_d` (
  `ID_Promotion` int(11) NOT NULL,
  `ID_Delegue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Secteur_d_activite` varchar(50) DEFAULT NULL,
  `Note` decimal(15,2) DEFAULT NULL,
  `Stagiaire_CESI_acceptes` int(11) DEFAULT NULL,
  `Confiance_du_pilote` int(11) DEFAULT NULL,
  `Localite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID`, `Nom`, `Secteur_d_activite`, `Note`, `Stagiaire_CESI_acceptes`, `Confiance_du_pilote`, `Localite`) VALUES
(1, 'CESI', 'Enseignement', NULL, 12, 15, 'Ecully'),
(2, 'SAFRAN', 'aéronautique', '0.00', 6, 17, 'Courcouronnes'),
(3, 'Piraterie Française', 'Piraterie', '0.00', 1, 0, 'eaux internationales');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID` int(11) NOT NULL,
  `ID_Promotion` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID`, `ID_Promotion`, `ID_Utilisateur`) VALUES
(2, 1, 16),
(3, 1, 17),
(4, 1, 19),
(5, 1, 23),
(6, 1, 24);

-- --------------------------------------------------------

--
-- Structure de la table `offre_de_stage`
--

CREATE TABLE `offre_de_stage` (
  `ID` int(11) NOT NULL,
  `Duree` int(11) DEFAULT NULL,
  `Date_de_creation` date DEFAULT NULL,
  `Competence` varchar(128) DEFAULT NULL,
  `types_de_promotions_concernees` varchar(50) DEFAULT NULL,
  `base_de_remuneration` varchar(50) DEFAULT NULL,
  `nombre_de_places` varchar(50) DEFAULT NULL,
  `ID_Entreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offre_de_stage`
--

INSERT INTO `offre_de_stage` (`ID`, `Duree`, `Date_de_creation`, `Competence`, `types_de_promotions_concernees`, `base_de_remuneration`, `nombre_de_places`, `ID_Entreprise`) VALUES
(1, 2, '2021-03-25', 'dynamique des fluides et equations quantiques', 'BAC + 5', '0', '1', 1),
(2, 6, '2021-03-23', 'dynamisé les rollers', 'BAC + 3', '600€ / mois', '5', 1),
(7, 6, '2021-03-30', 'natation ,sang froid ,aucune morale ,combat à l\'ép', 'BAC-4', 'basée sur les gains des differentes missions', '2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `ID` int(11) NOT NULL,
  `ID_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`ID`, `ID_Utilisateur`) VALUES
(2, 15),
(3, 18),
(4, 22),
(5, 25);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `ID` int(11) NOT NULL,
  `Centre` varchar(50) DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `ID_Pilote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`ID`, `Centre`, `Nom`, `ID_Pilote`) VALUES
(1, 'Lyon', 'A2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `MDP` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `Nom`, `Prenom`, `Username`, `MDP`) VALUES
(2, 'test', 'test', 'test', '5797448d5c775085bc82b808b9d01bb4ef795dfd05ea377d9b537d5e3495179f0b0c03f372518209db3dfbdae47c8529412ce9154dd1c5b99932cdf3b079c125'),
(3, 'Bismuth', 'Gandalf', 'Gandalf', '0ee8893ae7749dba0bbe06c18f9ff92b1ccc0feeaa56a74c11f7b6cf88099e242c7634c593d4412ec2bd99482a1a292d7d1bc9b06107721b6b849b1f4d2f9ccd'),
(4, '?', '?', '?', '?'),
(5, NULL, NULL, NULL, '857b47cfadee1b62e6057c23d3cb880e7d5c5c19edcd95c71d3a0b4a0164c21445d3afa8acecc86099d54c9696db0e5a953634b44b1652fbdf5838bff97f3d4b'),
(6, 'Saclier', 'Victor', 'admin', '20ba25789829f0b0d95f51db61508a9370f796f982ddc9d4ad46f9f547644cca48fcd00e5f5e2799a3189012a8dcaec4d001768ed50d17aabde4b97a633ccbd8'),
(7, 'guy', '2', 'test5', 'c5ad8815c00811f7fc481e1f303154ee0462bea0f20bcdbed688cf46a865d3b6e3c06f12a93f771811f6fe65a44e1a0671be60d3866d1a2460722776a45609d4'),
(12, 'Tom', 'Etiienne', 'Georgeiny', '4c41f05d4b2385ddb2ba85dc5cb99bf2a4ee4b8becd37fd937cc1c0cad05ae49e39e09bea7d53ea9fef03b01f5f648d05b241094fe741beb6a76b8dbbd0d7a99'),
(15, 'Deschamps', 'Giles', 'jilou', 'd1a33114b69000571a0532ccc20d5378dce63ac26af10106bff2516929bb07dbafa1cfb2df9213b1a850e1998f71a2148cd60152c4688ba263d6da1f04a8441f'),
(16, 'clansy', 'jim', 'jim', '9172ac09fb27261cd2d618a6cd43842b228b28da3da0018d93ff7bb2741656720ba1ebc3212f93100666b20f22f77db688429d204689ca4b723005bebfe8611c'),
(17, 'Saclier', 'Victor', 'tortupizza', '78e91164be4eab27f92b589094150d2502d6c0c7adf9013357642d8ff52f608c22fe0fe5828f9e1c9528b23d9ad3e24c97bdc71ea1ca059bd83c5b75abdd3750'),
(18, 'Tim', 'Burton', 'Délégué', '4c8328fb58a8f5ffe71962d4cedf0105a01213edd5d074d29ed27ce5d851ba191471781398289b408c948850f364163aa849d7855ba135e79e4305312135b54b'),
(19, 'DifridName', 'Lounes', 'Difrid', '887f16d870d6b3710656e3ae491bbf2bba609714e01c6fb5df9e9ee575d38f5dee994d12a197b88d7513557d5d846b9a1ff6003b32c1e6163218cd7ef14c426c'),
(20, 'teza', 'ezatrze', 'teaz', '72582f2576432ae45a967c5701a03b67e643685fb253157203e525adfff319d76480fddebe8c227aa4dc847393a2a29fb33b86d65c0e2548fc39dc75dae9dfe7'),
(21, 'admin', 'adminn', 'admin', '857b47cfadee1b62e6057c23d3cb880e7d5c5c19edcd95c71d3a0b4a0164c21445d3afa8acecc86099d54c9696db0e5a953634b44b1652fbdf5838bff97f3d4b'),
(22, 'RH', 'RH', 'RH', '4390d96d5f0a7cc5527d431eb8e43f06232768fcf6ff1bf70b1a6382fda5dc2fdfff1814dfdcde88343813718369ce0689f922fe52e95df5d1256fd3bc4ff6e7'),
(23, 'tom', 'Clansy', 'super', '8eaa80963a7544ba738860bbf932b901ff404d1bd7b0a39b46d0a10a51344c2836fe4a41f2fd559cd5e06095a732406fd638a275d9add8731469046c65419878'),
(24, 'jim', 'tibbers', 'Parain', 'b3cfdaf73d22909dfed1cb9aa3d8d45f255244309c1a5a05f8f23c6c2950f19029181820d4f5510f4d2a22b6ff89c817a575f30e244388e4ab22f4bd651cfa02'),
(25, 'Moriarty', 'James', 'Professeur', 'c00b013d3abdf0817c989bc2f94c855a8131428124c09513797f8cbf896b0b91f1056c6bd8b665ba619364333c9f1e634d9da08a50c9566da71718be27881514'),
(26, NULL, NULL, NULL, '8fb29448faee18b656030e8f5a8b9e9a695900f36a3b7d7ebb0d9d51e06c8569d81a55e39b481cf50546d697e7bde1715aa6badede8ddc801c739777be77f166'),
(27, NULL, NULL, NULL, '8fb29448faee18b656030e8f5a8b9e9a695900f36a3b7d7ebb0d9d51e06c8569d81a55e39b481cf50546d697e7bde1715aa6badede8ddc801c739777be77f166'),
(29, 'suppr', 'suppr', 'supprimer', 'f32c21bd1759975b1dea7562e666f6c6273757950a97d41acb4f0f90b68c71eda916efaef96cf0331fb487fcc980de188c2ec66c706430e0f79fc161d66d6384');

-- --------------------------------------------------------

--
-- Structure de la table `wish`
--

CREATE TABLE `wish` (
  `ID_Offre_de_stage` int(11) NOT NULL,
  `ID_Etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_Utilisateur` (`ID_Utilisateur`);

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`ID_Offre_de_stage`,`ID_Etudiant`),
  ADD KEY `candidature_ibfk_2` (`ID_Etudiant`);

--
-- Index pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_Utilisateur` (`ID_Utilisateur`);

--
-- Index pour la table `dirige_d`
--
ALTER TABLE `dirige_d`
  ADD PRIMARY KEY (`ID_Promotion`,`ID_Delegue`),
  ADD KEY `dirige_d_ibfk_2` (`ID_Delegue`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_Utilisateur` (`ID_Utilisateur`),
  ADD KEY `etudiant_ibfk_1` (`ID_Promotion`);

--
-- Index pour la table `offre_de_stage`
--
ALTER TABLE `offre_de_stage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `offre_de_stage_ibfk_1` (`ID_Entreprise`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_Utilisateur` (`ID_Utilisateur`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `promotion_ibfk_1` (`ID_Pilote`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`ID_Offre_de_stage`,`ID_Etudiant`),
  ADD KEY `wish_ibfk_2` (`ID_Etudiant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `delegue`
--
ALTER TABLE `delegue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `offre_de_stage`
--
ALTER TABLE `offre_de_stage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `pilote`
--
ALTER TABLE `pilote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`ID_Offre_de_stage`) REFERENCES `offre_de_stage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidature_ibfk_2` FOREIGN KEY (`ID_Etudiant`) REFERENCES `utilisateur` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `delegue`
--
ALTER TABLE `delegue`
  ADD CONSTRAINT `delegue_ibfk_1` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `dirige_d`
--
ALTER TABLE `dirige_d`
  ADD CONSTRAINT `dirige_d_ibfk_1` FOREIGN KEY (`ID_Promotion`) REFERENCES `promotion` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dirige_d_ibfk_2` FOREIGN KEY (`ID_Delegue`) REFERENCES `delegue` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`ID_Promotion`) REFERENCES `promotion` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre_de_stage`
--
ALTER TABLE `offre_de_stage`
  ADD CONSTRAINT `offre_de_stage_ibfk_1` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD CONSTRAINT `pilote_ibfk_1` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `utilisateur` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `wish_ibfk_1` FOREIGN KEY (`ID_Offre_de_stage`) REFERENCES `offre_de_stage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wish_ibfk_2` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
