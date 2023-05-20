-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 août 2022 à 04:09
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `batela`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions_systemes`
--

CREATE TABLE `actions_systemes` (
  `id_ac` int(11) NOT NULL,
  `id_profil` int(1) DEFAULT NULL,
  `ajouter` int(1) DEFAULT 0,
  `consulter` int(1) DEFAULT 0,
  `modifier` int(1) DEFAULT 0,
  `supprimer` int(1) DEFAULT 0,
  `activer` int(1) DEFAULT 0,
  `desactiver` int(1) DEFAULT 0,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actions_systemes`
--

INSERT INTO `actions_systemes` (`id_ac`, `id_profil`, `ajouter`, `consulter`, `modifier`, `supprimer`, `activer`, `desactiver`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, '2022-06-25 17:36:09', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `affectations`
--

CREATE TABLE `affectations` (
  `id_af` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectations`
--

INSERT INTO `affectations` (`id_af`, `user_id`, `id_profil`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-06-25 17:34:59', '2022-06-25 17:34:39');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `montant` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statut` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_ent` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `sigle` varchar(50) DEFAULT NULL,
  `nif` varchar(255) DEFAULT NULL,
  `rccm` varchar(255) DEFAULT NULL,
  `capital_social` varchar(255) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `bp` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `site_web` varchar(255) DEFAULT NULL,
  `mots` text DEFAULT '',
  `logo` varchar(255) DEFAULT NULL,
  `cachet` varchar(255) DEFAULT NULL,
  `chiffre_affaire` int(11) NOT NULL,
  `type_chiffre_affaire` int(11) NOT NULL DEFAULT 1,
  `type_activite` int(11) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_ent`, `designation`, `sigle`, `nif`, `rccm`, `capital_social`, `localisation`, `bp`, `telephone`, `email`, `site_web`, `mots`, `logo`, `cachet`, `chiffre_affaire`, `type_chiffre_affaire`, `type_activite`, `created_at`, `updated_at`) VALUES
(1, 'DONESIA GROUP', 'ITECH', '', '', '', 'BRAZZAVILLE', '', '', 'admin@gmail.com', 'donesia.com', 'Entreprise de developpement des logiciels, applications web et mobiles', 'batela.png', 'cachet.png', 0, 1, 0, '2022-07-30 05:08:20', '2022-07-30 03:08:20');

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalites`
--

CREATE TABLE `fonctionnalites` (
  `id_fonc` int(11) NOT NULL,
  `id_profil` int(11) DEFAULT NULL,
  `bib` int(1) DEFAULT 0,
  `info_ent` int(1) DEFAULT 0,
  `users` int(1) DEFAULT 0,
  `gestions_users` int(1) DEFAULT 0,
  `gestions_chauffeurs` int(1) NOT NULL DEFAULT 0,
  `gestions_pro` int(1) DEFAULT 0,
  `droits` int(1) DEFAULT 0,
  `ap` int(1) DEFAULT 0,
  `gestions_conduites` int(1) DEFAULT 0,
  `gestions_dialogues` int(1) DEFAULT 0,
  `gestions_conditions` int(1) DEFAULT 0,
  `gestions_vitesses` int(1) DEFAULT 0,
  `sp` int(1) DEFAULT 0,
  `gestions_signals` int(1) DEFAULT 0,
  `gestions_problemes` int(1) DEFAULT 0,
  `noti` int(1) DEFAULT 0,
  `tb` int(1) DEFAULT 0,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fonctionnalites`
--

INSERT INTO `fonctionnalites` (`id_fonc`, `id_profil`, `bib`, `info_ent`, `users`, `gestions_users`, `gestions_chauffeurs`, `gestions_pro`, `droits`, `ap`, `gestions_conduites`, `gestions_dialogues`, `gestions_conditions`, `gestions_vitesses`, `sp`, `gestions_signals`, `gestions_problemes`, `noti`, `tb`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2022-07-29 12:13:41');

-- --------------------------------------------------------

--
-- Structure de la table `gestions_appreciations`
--

CREATE TABLE `gestions_appreciations` (
  `id_gap` int(11) NOT NULL,
  `id_chauffeur` int(11) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `id_type_conduite` int(11) DEFAULT NULL,
  `id_type_di` int(11) DEFAULT NULL,
  `id_type_condition` int(11) DEFAULT NULL,
  `id_type_vi` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `gestions_vitesses`
--

CREATE TABLE `gestions_vitesses` (
  `id_gv` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `id_type_vi` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_note` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `note` int(1) DEFAULT 1,
  `matricule` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE `objets` (
  `id_obj` int(11) NOT NULL,
  `libelle_obj` varchar(255) NOT NULL,
  `description_obj` varchar(255) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `libelle_profil` varchar(255) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_user`, `libelle_profil`, `created_at`, `updated_at`) VALUES
(1, 1, 'Amdin', '2022-06-25 19:33:58', '2022-07-29 12:15:22'),
(2, 1, 'Chauffeur', '2022-06-25 19:34:09', '2022-07-29 12:15:22');

-- --------------------------------------------------------

--
-- Structure de la table `signaler_probleme`
--

CREATE TABLE `signaler_probleme` (
  `id_sp` int(11) NOT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `type_signal` int(1) DEFAULT NULL,
  `type_probleme` int(2) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `statut_vue` int(1) NOT NULL DEFAULT 0,
  `statut_no` int(1) NOT NULL DEFAULT 0,
  `statut` int(1) NOT NULL DEFAULT 1,
  `created_at` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_conditions`
--

CREATE TABLE `types_conditions` (
  `id_type_condition` int(11) NOT NULL,
  `libelle_condition` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types_conditions`
--

INSERT INTO `types_conditions` (`id_type_condition`, `libelle_condition`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'mauvaise etat', 1, '2022-07-07 15:41:56', '2022-07-29 12:48:56'),
(2, 'etat critique', 1, '2022-07-07 15:42:04', '2022-07-29 12:48:56');

-- --------------------------------------------------------

--
-- Structure de la table `types_conduites`
--

CREATE TABLE `types_conduites` (
  `id_type_conduite` int(11) NOT NULL,
  `libelle_conduite` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types_conduites`
--

INSERT INTO `types_conduites` (`id_type_conduite`, `libelle_conduite`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'stable', 1, '2022-07-07 15:40:04', '2022-07-29 12:45:15'),
(2, 'enervé', 1, '2022-07-07 15:40:15', '2022-07-29 12:45:15'),
(3, 'moqueur', 1, '2022-07-07 15:40:27', '2022-07-29 12:45:15'),
(4, 'concentré', 1, '2022-07-07 15:40:46', '2022-07-29 12:45:15'),
(5, 'ivre', 1, '2022-07-07 15:40:57', '2022-07-29 12:45:15');

-- --------------------------------------------------------

--
-- Structure de la table `types_dialogues`
--

CREATE TABLE `types_dialogues` (
  `id_type_di` int(11) NOT NULL,
  `libelle_di` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types_dialogues`
--

INSERT INTO `types_dialogues` (`id_type_di`, `libelle_di`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'formidable', 1, '2022-07-20 19:58:00', '2022-07-29 12:47:03'),
(2, 'pacifique', 1, '2022-07-20 19:58:00', '2022-07-29 12:47:03');

-- --------------------------------------------------------

--
-- Structure de la table `types_problemes`
--

CREATE TABLE `types_problemes` (
  `id_type_pro` int(11) NOT NULL,
  `libelle_pro` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types_problemes`
--

INSERT INTO `types_problemes` (`id_type_pro`, `libelle_pro`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'viole', 1, '2022-07-07 15:44:36', '2022-07-29 13:08:03'),
(2, 'vole', 1, '2022-07-07 15:44:47', '2022-07-29 13:08:03'),
(3, 'braquage', 1, '2022-07-07 15:44:55', '2022-07-29 13:08:03'),
(4, 'accient', 1, '2022-07-07 15:45:05', '2022-07-29 13:08:03'),
(5, 'enlevement', 1, '2022-07-07 15:45:13', '2022-07-29 13:08:03');

-- --------------------------------------------------------

--
-- Structure de la table `types_signals`
--

CREATE TABLE `types_signals` (
  `id_type_si` int(11) NOT NULL,
  `libelle_si` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types_signals`
--

INSERT INTO `types_signals` (`id_type_si`, `libelle_si`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Appel normal', 1, '2022-07-07 15:43:29', '2022-07-29 13:07:10'),
(2, 'SMS', 1, '2022-07-22 16:13:08', '2022-07-29 13:07:10'),
(3, 'Whatsapp', 1, '2022-07-22 16:13:22', '2022-07-29 13:07:10'),
(4, 'Police', 1, '2022-07-22 16:15:03', '2022-07-29 13:07:10'),
(5, 'Gendarmerie', 4, '2022-07-22 16:15:26', '2022-07-29 13:07:10');

-- --------------------------------------------------------

--
-- Structure de la table `types_vitesses`
--

CREATE TABLE `types_vitesses` (
  `id_type_vi` int(11) NOT NULL,
  `libelle_vi` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types_vitesses`
--

INSERT INTO `types_vitesses` (`id_type_vi`, `libelle_vi`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'accelerée', 1, '2022-07-08 15:44:07', '2022-07-29 13:10:06'),
(2, 'moyenne', 1, '2022-07-08 15:44:15', '2022-07-29 13:10:06'),
(3, 'normale', 1, '2022-07-08 15:44:21', '2022-07-29 13:10:06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(10) NOT NULL,
  `marticule` varchar(255) DEFAULT NULL,
  `user_nom` varchar(30) NOT NULL,
  `user_prenom` varchar(30) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_adresse` varchar(255) DEFAULT NULL,
  `user_birthday` varchar(255) DEFAULT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `user_login` varchar(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_etat` int(1) DEFAULT 0,
  `user_datereg` varchar(255) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `fk_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_code`, `marticule`, `user_nom`, `user_prenom`, `user_phone`, `user_email`, `user_adresse`, `user_birthday`, `user_photo`, `sexe`, `type`, `user_login`, `user_password`, `user_etat`, `user_datereg`, `updated_at`, `fk_type`) VALUES
(1, 'code_admin', NULL, 'Admin', 'admin', '', 'admin@gmail.com', NULL, NULL, 'avatar.png', NULL, NULL, '', 'man', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id_ve` int(11) NOT NULL,
  `libelle_ve` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `nb_place` int(11) DEFAULT NULL,
  `couleur` varchar(10) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `id_chauffeur` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statut` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actions_systemes`
--
ALTER TABLE `actions_systemes`
  ADD PRIMARY KEY (`id_ac`);

--
-- Index pour la table `affectations`
--
ALTER TABLE `affectations`
  ADD PRIMARY KEY (`id_af`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_ent`);

--
-- Index pour la table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  ADD PRIMARY KEY (`id_fonc`);

--
-- Index pour la table `gestions_appreciations`
--
ALTER TABLE `gestions_appreciations`
  ADD PRIMARY KEY (`id_gap`);

--
-- Index pour la table `gestions_vitesses`
--
ALTER TABLE `gestions_vitesses`
  ADD PRIMARY KEY (`id_gv`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`);

--
-- Index pour la table `objets`
--
ALTER TABLE `objets`
  ADD PRIMARY KEY (`id_obj`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `signaler_probleme`
--
ALTER TABLE `signaler_probleme`
  ADD PRIMARY KEY (`id_sp`);

--
-- Index pour la table `types_conditions`
--
ALTER TABLE `types_conditions`
  ADD PRIMARY KEY (`id_type_condition`);

--
-- Index pour la table `types_conduites`
--
ALTER TABLE `types_conduites`
  ADD PRIMARY KEY (`id_type_conduite`);

--
-- Index pour la table `types_dialogues`
--
ALTER TABLE `types_dialogues`
  ADD PRIMARY KEY (`id_type_di`);

--
-- Index pour la table `types_problemes`
--
ALTER TABLE `types_problemes`
  ADD PRIMARY KEY (`id_type_pro`);

--
-- Index pour la table `types_signals`
--
ALTER TABLE `types_signals`
  ADD PRIMARY KEY (`id_type_si`);

--
-- Index pour la table `types_vitesses`
--
ALTER TABLE `types_vitesses`
  ADD PRIMARY KEY (`id_type_vi`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id_ve`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actions_systemes`
--
ALTER TABLE `actions_systemes`
  MODIFY `id_ac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `affectations`
--
ALTER TABLE `affectations`
  MODIFY `id_af` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_ent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  MODIFY `id_fonc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `gestions_appreciations`
--
ALTER TABLE `gestions_appreciations`
  MODIFY `id_gap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `gestions_vitesses`
--
ALTER TABLE `gestions_vitesses`
  MODIFY `id_gv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `objets`
--
ALTER TABLE `objets`
  MODIFY `id_obj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `signaler_probleme`
--
ALTER TABLE `signaler_probleme`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types_conditions`
--
ALTER TABLE `types_conditions`
  MODIFY `id_type_condition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `types_conduites`
--
ALTER TABLE `types_conduites`
  MODIFY `id_type_conduite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `types_dialogues`
--
ALTER TABLE `types_dialogues`
  MODIFY `id_type_di` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `types_problemes`
--
ALTER TABLE `types_problemes`
  MODIFY `id_type_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `types_signals`
--
ALTER TABLE `types_signals`
  MODIFY `id_type_si` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `types_vitesses`
--
ALTER TABLE `types_vitesses`
  MODIFY `id_type_vi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id_ve` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
