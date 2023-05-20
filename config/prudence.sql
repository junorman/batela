-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 25 juin 2022 à 19:51
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
-- Base de données : `prudence`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cleaned_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actions_systemes`
--

INSERT INTO `actions_systemes` (`id_ac`, `id_profil`, `ajouter`, `consulter`, `modifier`, `supprimer`, `activer`, `desactiver`, `created_at`, `cleaned_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, '2022-06-25 17:36:09', '2022-06-25 19:35:41');

-- --------------------------------------------------------

--
-- Structure de la table `affectations`
--

CREATE TABLE `affectations` (
  `id_af` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectations`
--

INSERT INTO `affectations` (`id_af`, `user_id`, `id_profil`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-06-25 17:34:59', '2022-06-25 19:34:39'),
(2, 1, 2, '2022-06-25 17:35:36', '2022-06-25 19:35:24');

-- --------------------------------------------------------

--
-- Structure de la table `apreciations`
--

CREATE TABLE `apreciations` (
  `id_ap` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `accueillant` int(11) NOT NULL DEFAULT 0,
  `conditions` int(11) NOT NULL DEFAULT 0,
  `vitesses` int(11) NOT NULL DEFAULT 0,
  `conduite` int(11) NOT NULL DEFAULT 0,
  `dialogue` int(11) NOT NULL DEFAULT 0,
  `matricule` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnalites`
--

CREATE TABLE `fonctionnalites` (
  `id_fonc` int(11) NOT NULL,
  `id_profil` int(11) DEFAULT NULL,
  `bib` int(1) DEFAULT 0,
  `users` int(1) DEFAULT 0,
  `compta` int(1) DEFAULT 0,
  `tb` int(1) DEFAULT 0,
  `info_ent` int(1) DEFAULT 0,
  `pco` int(1) DEFAULT 0,
  `pca` int(1) DEFAULT 0,
  `gestions_users` int(1) DEFAULT 0,
  `gestions_pro` int(1) DEFAULT 0,
  `droits` int(1) DEFAULT 0,
  `clients` int(1) DEFAULT 0,
  `fournisseurs` int(1) DEFAULT 0,
  `opera_co` int(1) DEFAULT 0,
  `opera_di` int(1) DEFAULT 0,
  `immob` int(1) DEFAULT 0,
  `treso` int(1) DEFAULT 0,
  `etat_compta` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fonctionnalites`
--

INSERT INTO `fonctionnalites` (`id_fonc`, `id_profil`, `bib`, `users`, `compta`, `tb`, `info_ent`, `pco`, `pca`, `gestions_users`, `gestions_pro`, `droits`, `clients`, `fournisseurs`, `opera_co`, `opera_di`, `immob`, `treso`, `etat_compta`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_note` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `note` int(1) DEFAULT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `libelle_profil` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_user`, `libelle_profil`, `created_at`) VALUES
(1, 1, 'Amdin', '2022-06-25 17:33:58'),
(2, 1, 'Chauffeur', '2022-06-25 17:34:09');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_conditions`
--

CREATE TABLE `types_conditions` (
  `id_type_condition` int(11) NOT NULL,
  `libelle_condition` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_conduites`
--

CREATE TABLE `types_conduites` (
  `id_type_conduite` int(11) NOT NULL,
  `libelle_conduite` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_dialogues`
--

CREATE TABLE `types_dialogues` (
  `id_type_di` int(11) NOT NULL,
  `libelle_di` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_problemes`
--

CREATE TABLE `types_problemes` (
  `id_type_pro` int(11) NOT NULL,
  `libelle_pro` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_signals`
--

CREATE TABLE `types_signals` (
  `id_type_si` int(11) NOT NULL,
  `libelle_si` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `types_vitesses`
--

CREATE TABLE `types_vitesses` (
  `id_type_vi` int(11) NOT NULL,
  `libelle_vi` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Index pour la table `apreciations`
--
ALTER TABLE `apreciations`
  ADD PRIMARY KEY (`id_ap`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Index pour la table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  ADD PRIMARY KEY (`id_fonc`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`);

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
  MODIFY `id_af` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `apreciations`
--
ALTER TABLE `apreciations`
  MODIFY `id_ap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  MODIFY `id_fonc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_type_condition` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types_conduites`
--
ALTER TABLE `types_conduites`
  MODIFY `id_type_conduite` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types_dialogues`
--
ALTER TABLE `types_dialogues`
  MODIFY `id_type_di` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types_problemes`
--
ALTER TABLE `types_problemes`
  MODIFY `id_type_pro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types_signals`
--
ALTER TABLE `types_signals`
  MODIFY `id_type_si` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `types_vitesses`
--
ALTER TABLE `types_vitesses`
  MODIFY `id_type_vi` int(11) NOT NULL AUTO_INCREMENT;

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
