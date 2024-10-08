CREATE TABLE `animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `etat_animal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nourriture_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nourriture_quantite` int(11) DEFAULT NULL,
  `date_passage` datetime DEFAULT NULL,
  `details_commentaire` longtext COLLATE utf8mb4_unicode_ci,
  `habitat_de_lanimal_id` int(11) NOT NULL,
  `animal_counter_id` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6AAB231F6DF4885` (`habitat_de_lanimal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_etoile_avis` int(11) NOT NULL,
  `pseudo_avis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_avis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation_avis` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `formulaire_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_formulaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_formulaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_mail_formulaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet_formulaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_formulaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `habitat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `habitat_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `habitat_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `habitat_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `horaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lundi_start` time NOT NULL,
  `lundi_close` time NOT NULL,
  `mardi_start` time NOT NULL,
  `mardi_close` time NOT NULL,
  `mercredi_start` time NOT NULL,
  `mercredi_close` time NOT NULL,
  `jeudi_start` time NOT NULL,
  `jeudi_close` time NOT NULL,
  `vendredi_start` time NOT NULL,
  `vendredi_close` time NOT NULL,
  `samedi_start` time NOT NULL,
  `samedi_close` time NOT NULL,
  `dimanche_start` time NOT NULL,
  `dimanche_close` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `service_tab_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D6495126AC48` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes de clés étrangères
--
ALTER TABLE `animal`
  ADD CONSTRAINT `FK_6AAB231F6DF4885` FOREIGN KEY (`habitat_de_lanimal_id`) REFERENCES `habitat` (`id`);