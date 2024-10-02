/*Add script to add value in table without dashboard*/
INSERT INTO `habitat` (`id`, `habitat_nom`, `habitat_description`, `habitat_image`) VALUES
(16, 'Savane Africaine', 'Explorez la savane africaine : girafes, lions, zèbres et éléphants évoluent librement. Une immersion authentique dans un écosystème fascinant', '/uploads/images/Habitats/Savane 1 1.png'),
(17, 'Forêt Tropicale', 'Bienvenue dans la forêt tropicale, où la vie foisonne. Des singes aux perroquets colorés, découvrez un écosystème dense et vibrant. Une expérience immersive au cœur de la biodiversité', '/uploads/images/Habitats/tropicale.png'),
(18, 'Aquarium Marin', 'Plongez dans notre aquarium marin et découvrez un monde sous-marin captivant. Des coraux colorés aux poissons exotiques, explorez la diversité des océans. Une aventure fascinante pour tous les amoureux de la vie marine', '/uploads/images/Habitats/fondmarin.webp'),
(19, 'Toundra Arctique', "Explorez la toundra arctique, un paysage de vastes étendues gelées où vivent l\'ours polaire, le renard arctique et le caribou. Découvrez la beauté sauvage de ce biome unique, où la nature défie les éléments", '/uploads/images/Habitats/toundra 1.png');

INSERT INTO `animal` (`id`, `name`, `race`, `image`, `etat_animal`, `nourriture_type`, `nourriture_quantite`, `date_passage`, `details_commentaire`, `habitat_de_lanimal_id`, `animal_counter_id`) VALUES
(12, 'Simba', 'Lion', 'Lion_waiting_in_Namibia.jpg', 'Bon', 'Viande', 4000, '2024-05-01 11:15:00', "Simba est en bonne forme, en cour d'adaptation dans son nouvel habitat</div>", 16, NULL),
(13, 'Kiwi', 'Perroquet', 'perroquet.jpg', 'Moyen', 'Graine de sésame', 100, '2024-04-30 11:18:00', "RAS mange peu&nbsp;</div>", 17, NULL),
(14, 'Nemo', 'Poisson clown', 'clown-fish.jpg', 'correct', 'plancton', 10, '2024-05-01 11:20:00', "ras bon état général</div>", 18, NULL),
(15, 'Neige', 'Renard blanc', 'renard.webp', 'Très bon', 'Viande', 1500, '2024-04-29 11:21:00', "Bon état s'est bien adapté à l'environnement</div>", 19, NULL),
(16, 'Tembo', "Éléphant d'Afrique", 'pexels-hsapir-1054655.jpg', 'Très bonne santé', 'Feuilles et écorces', 10000, '2024-05-13 22:27:00', "Le plus grand mammifère terrestre, reconnaissable à ses immenses défenses et à sa silhouette imposante.</div><br></div>", 16, NULL),
(17, 'Kiko', 'Girafe', 'cinq-choses-que-vous-ne-saviez-pas-sur-la-girafe.jpg', 'Très bon', "Acacias et feuilles d'autres arbres", 1000, '2024-05-12 22:30:00', "Dotée d'un long cou et de taches distinctives, la girafe est le plus grand animal terrestre et se nourrit des cimes des arbres.</div>", 16, NULL),
(18, 'Zara', 'Zèbre', '652061ea5a026.1712152059.jpg', 'Bon', 'Herbes et graminés', 10000, '2024-05-14 22:40:00', "Reconnaissable à ses rayures distinctives, le zèbre vit en troupeaux et se déplace souvent en migrations impressionnantes.</div>", 16, NULL),
(19, 'Gigi', 'Gnou à queue blanche', 'gnou-queue-blanche-01.jpg', 'Bon', 'Herbes, graminées', 3000, '2024-05-14 22:55:00', "Partie intégrante des grandes migrations, le gnou est reconnaissable à sa silhouette et à sa queue en forme de fouet.</div>", 16, NULL),
(20, 'coco', 'Singe Capucin', 'capucin-063621.jpg', 'Bon', 'Fruits, insectes, petits animaux', 50, '2024-05-13 23:08:00', "Agile et curieux, le singe capucin se déplace dans les arbres à la recherche de nourriture, souvent en petits groupes familiaux.</div>", 17, NULL),
(21, 'diego', 'Jaguar', 'jaguar-3370498_1280.jpg', 'Parfait', 'Gros mammifères, reptiles, poissons', 3000, '2024-05-11 23:09:00', "Le plus grand félin d'Amérique, le jaguar est un prédateur solitaire et puissant, capable de nager et de grimper avec agilité.</div>", 17, NULL),
(22, 'Ticco', 'Toucan', 'animals_hero_toucan.jpg', 'Correct', 'Fruits, insectes, œufs', 150, '2024-05-12 23:10:00', "Reconnaissable à son bec énorme et coloré, le toucan est un oiseau bruyant et territorial, se nourrissant principalement dans les arbres.</div>", 17, NULL),
(23, 'Slinky', 'Serpent Boa Constrictor', '1444x920_le-boa-constrictor.webp', 'Bon', 'Petits mammifères, oiseaux', 600, '2024-05-11 23:11:00', "Un serpent non venimeux, mais puissant, le boa constrictor chasse en embuscade et tue ses proies en les étouffant.</div>", 17, NULL),
(24, 'Splash', 'Grenouille Arlequin', 'grenouille-arlequin.jpg', 'Très bon', 'Insectes, vers', 20, '2024-05-12 23:13:00', "Reconnaissable à ses couleurs vives et à sa peau granuleuse, la grenouille arlequin est souvent utilisée comme indicateur de la santé de l'écosystème.</div>", 17, NULL),
(25, 'Blue', 'Requin-baleine', '8ebca-plongee-requin-baleine.jpg', 'Bon en adaptation', 'Plancton, petits poissons', 80000, '2024-05-10 23:18:00', "Le plus grand poisson du monde, le requin-baleine est un pacifique géant filtreur, se nourrissant principalement de plancton.</div>", 18, NULL),
(26, 'Luna', 'Méduse Lune', 'aurelia-aurita-2.jpg', 'Bon', 'Plancton, petits poissons', 100, '2024-05-13 23:19:00', "Reconnaissable à sa forme en forme de disque transparent, la méduse lune dérive dans les courants marins, se nourrissant de petits organismes.</div>", 18, NULL),
(27, 'Grace', 'Raie Manta', 'RAIE-MANTA_AK1A9388_FGUERIN.jpg', 'Correct', 'Plancton, petits poissons', 3000, '2024-05-09 23:20:00', "Majestueuse et gracieuse, la raie manta se déplace avec élégance dans les eaux chaudes, utilisant ses nageoires pour se propulser.</div>", 18, NULL),
(28, 'Neptune', 'Hippocampe', 'cover-r4x3w1200-5911c3cd3a9ac-hippocampe.jpg', 'Bon', 'Petits crustacés, plancton', 15, '2024-05-13 23:21:00', "Élégant et étrange, l'hippocampe utilise sa queue préhensile pour s'accrocher aux plantes marines, se déplaçant lentement à la recherche de nourriture.</div>", 18, NULL),
(29, 'Ziggy', 'Murène', 'murene_leopard-ile_Maurice-©-Marie-Ange_Ostre.webp', 'Parfait', 'Petits poissons, crustacés', 100, '2024-05-09 23:24:00', "Avec son corps serpentiforme et ses mâchoires impressionnantes, la murène est un prédateur redoutable qui se cache dans les crevasses des récifs.</div>", 18, NULL),
(30, 'Nanuq', 'Ours blanc', 'Medium_WW225900-min.jpg', 'Très bon', 'Phoques, poissons', 4000, '2024-05-12 23:26:00', "Adapté à la vie dans les régions polaires, l'ours blanc est un prédateur puissant qui chasse sur la banquise et dans les eaux glacées.</div>", 19, NULL),
(31, 'Blizzard', 'Harfang des neiges', 'harfang-des-neiges-1140x594.jpg', 'Bon', 'Petits mammifères, oiseaux', 50, '2024-05-14 23:27:00', "Symbole de l'Arctique, le harfang des neiges est un rapace majestueux qui chasse de jour comme de nuit grâce à sa vue perçante.</div>", 19, NULL),
(32, 'Aurora', 'Caribou', 'caribou-walking-snow_square.avif', 'Bon', 'Lichens, herbes, mousses', 4000, '2024-05-09 23:28:00', "Mammifère emblématique des régions nordiques, le caribou effectue de longues migrations à travers la toundra, formant parfois des troupeaux massifs.</div>", 19, NULL),
(33, 'Yukon', 'Loup arctique', 'fiche-animale-monde-animal-loup-arctique.jpg', 'Très bon', 'Caribous, lièvres, petits rongeurs', 1000, '2024-05-13 23:29:00', "Habitant des régions les plus froides de la planète, le loup arctique chasse en meute pour capturer ses proies dans la neige.</div>", 19, NULL),
(34, 'Frosty', 'Phoque annelé', 'RingedSeal_FeaturedImage.jpg', 'Bon', 'Poissons, crustacés', 800, '2024-05-12 23:30:00', "Bien adapté à la vie dans les eaux glacées, le phoque annelé passe une grande partie de sa vie à nager et à chasser sous la glace.</div>", 19, NULL);

INSERT INTO `horaires` (`id`, `lundi_start`, `lundi_close`, `mardi_start`, `mardi_close`, `mercredi_start`, `mercredi_close`, `jeudi_start`, `jeudi_close`, `vendredi_start`, `vendredi_close`, `samedi_start`, `samedi_close`, `dimanche_start`, `dimanche_close`) VALUES
(2, '09:00:00', '17:30:00', '09:00:00', '17:30:00', '08:30:00', '18:00:00', '09:00:00', '17:30:00', '09:00:00', '18:00:00', '08:30:00', '19:30:00', '09:00:00', '17:30:00');

INSERT INTO `avis` (`id`, `nombre_etoile_avis`, `pseudo_avis`, `description_avis`, `validation_avis`) VALUES
(1, 5, 'NatureLover42', 'Super expérience ! Les animaux sont bien traités et le personnel est accueillant.', 1),
(2, 4, 'FamilleAventuriere', 'Les enfants ont adoré, surtout la section des félins. Un peu d’attente à l’entrée.', 1),
(3, 3, 'VoyageurSolo', 'Zoo intéressant mais certaines zones étaient fermées pour travaux.', 1),
(4, 5, 'Explorateur123', 'Magnifique zoo, très propre et bien organisé. Les animaux semblent en bonne santé.', 1),
(5, 2, 'CritiquePassionné', 'Décu par la taille des enclos, les animaux n’ont pas assez d’espace.', 1);

INSERT INTO `service_tab_entity` (`id`, `service_nom`, `service_titre`, `service_description`, `service_image`) VALUES
(15, 'Restauration', 'Restauration', "Découvrez notre restaurant au cœur du zoo, où la fraîcheur et la proximité rencontrent la biodiversité. Chacun de nos plats raconte l'histoire d'une cuisine respectueuse de l'environnement, élaborée avec des ingrédients bio provenant d'agriculteurs locaux passionnés. Notre menu célèbre les saveurs authentiques des saisons, créant une expérience culinaire unique pour les amateurs de cuisine responsable. Bienvenue à notre table, où la gastronomie devient une célébration de la nature, unissant les plaisirs du palais et la préservation de notre planète. Bon appétit !</div>", '/uploads/images/Services/restocartedumonde.jpg'),
(16, 'Visite guidée', 'Visite guidée', "Plongez dans une aventure captivante au cœur de la nature! Notre visite guidée vous emmène à la découverte des merveilles du zoo. Rencontrez des créatures fascinantes, des lions majestueux aux singes espiègles. Nos guides passionnés vous révèleront les secrets de chaque habitat, tandis que vous apprendrez l'importance de la préservation de la biodiversité. Joignez-vous à nous pour une expérience inoubliable au plus près de la faune sauvage!</div>", '/uploads/images/Services/Visite.png'),
(17, 'Le petit train', 'Le petit train', "Embarquez pour un voyage enchanteur à bord de notre petit train! Parcourez les allées ombragées du zoo et laissez-vous émerveiller par la diversité de la faune. Notre guide vous contera les anecdotes sur les habitants des différentes régions du monde. Détendez-vous et appréciez la vue panoramique tout en découvrant les merveilles de la nature. Une excursion passionnante pour petits et grands, où l'émerveillement est au rendez-vous à chaque tournant!</div>", '/uploads/images/Services/Train.png');

INSERT INTO `user` (`id`, `user_name`, `password`, `mail`, `roles`) VALUES
(66, 'employe', '$2y$13$5SyfLfmc/wpvf3WN4QXZWOdrIAJ5kQvXXX4d7IIeJdiyfZClK.cee', 'employe@e.fr', '["ROLE_USER", "ROLE_EMPLOYE"]'),
(67, 'veterinaire', '$2y$13$78zxDZhJ.WWsXPGttxjpwOZDyPm.kmeW2JSc6NgHS1RfmHTN07WgS', 'veterinaire@v.fr', '["ROLE_USER", "ROLE_VETERINAIRE"]'),
(68, 'admin', '$2y$13$SfO9cO2V/zKzFMIRj9EEBum.VmHzqGW/vlGd9HqmWBeMef3Goefjy', 'admin@a.fr', '["ROLE_USER", "ROLE_ADMIN"]');
