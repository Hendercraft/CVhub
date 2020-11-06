-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 nov. 2020 à 11:11
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbcv`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `intitule` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(11) NOT NULL,
  `nom` varchar(512) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `ville`) VALUES
(1, 'IPPON', 'Paris'),
(2, 'PSA', 'Sochaux'),
(3, 'Alstom', 'Belfort');

-- --------------------------------------------------------

--
-- Structure de la table `experience_pro`
--

CREATE TABLE `experience_pro` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `poste_id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `date_d` date NOT NULL,
  `date_f` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `niveau` int(11) NOT NULL,
  `spé` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `peridode_etude`
--

CREATE TABLE `peridode_etude` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `universite` int(11) NOT NULL,
  `date_d` date NOT NULL,
  `date_f` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id` int(11) NOT NULL,
  `intitule` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `universite`
--

CREATE TABLE `universite` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `linkdin` varchar(512) NOT NULL,
  `profile_pic` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `adresse`, `date_naissance`, `email`, `password`, `telephone`, `linkdin`, `profile_pic`) VALUES
(91, 'KIHAL', 'Driss', '4 rue jean mathieu Belfort 90000', '2002-02-20', 'driss.kihal@utbm.fr', '$2y$10$.Li2iBdSHMN3UmU4zQCBvuxT1FipiyGf4C.29qKFcnJomVSISkfnW', '123456789', 'linkdin', 0x89504e470d0a1a0a0000000d49484452000001010000006e08060000002739a6c600000b9b49444154789ced9d516854d919c70f89e85a57a5685d2b0ec8b6764377956dc3082975f44152d2a064ab0f4b2c8d4be88ab3948d8114c28635aed598b85a1323210f7d4849a0f830e042842cbb2c81940482b23019d882d6c426986c1c1321dda961e0ebc365d66432de73eebde7deefcebdff0bbf973073e69b93effce69eefde7b8e1042100020d4b0070000e0853d0000002fec01000078610f0000c00b7b0000005ed8030000f0c21e00008017f6000000bcb0070000e0853d0000002fec01000078610f0000c00b7b0000005ed8030000f0c21e00008017f600800db66d12d4fe3b415f34087a725510f58220f1e4aaf1bfbdfc8ea0edafba9e4ffc090dac7174bfa0f435fe4405de90be26a8e66d57738a3fa9813aa72af89312f070aac2b5bce24f6ca0c68ecd8232ddfcc90878f8ee86a09d5b20815073e1187f22025e2e1c830442cd37e7f99310f032710e120835ffc35420f42c5e8704420d7702027f00098418eee403fe00120831dcc907fc01241062b8930ff8034820c470271ff007904088e14e3ee00f208110c39d7cc01f400221863bf9803f08a504cacbcba9adad8d4647476976769696969628ff585a5aa2d9d9591a1d1da5b6b6362a2f2f678f1b12006e101a09442211eaeaeaa299999935035ef5989999a1f6f676f6efc22d81d7b79bb7db54c99fd8dcc8fafeefeff1c7182a09747575512693b13df8f38f67cf9e51737333fbf78204fc0b24e01362b1184d4d4d691bfcf9c7f0f030452211f6ef0909f80f48c0079c3973a6e05c5ff731353545656565ecdf1712f01790800f0490cd665d1740ee989e9e2eca330248001208a404eaebeb3d1540ee181b1b631fd490807f8004988846a396a600333333d4d9d949d5d5d5abdaa9aeaea6cece4ecb57125a5a5ad8073624e00f200126c6c6c69406ebfcfc3c9d3c7952a9cde6e66665b14c4e4eb20f6c48c01f40020c343434280dd464326979fe1e8bc5687a7a5aa9fdd6d656f6c10d09f0030930f0e0c103e9007552c08bc5624a6704c964927d704302fc40021e138fc7a5833393c9502c1673f4393d3d3dd2cfc966b3148d46d9073824e0ef81050968667878583a38070606b47cd6e2e2e29ab6979696e8debd7bd4d6d646478e1c611fdc7e94c0bf3e11143f2468cf3641ebd7bd78edfa75c6dfe28704fdfb22ff80e092c0f39b8206ea051ddc2b68cb2bab5fbb63b3a0dfbc29e8cbb3c6eb208102c86e09d6f9eb3c343444b3b3b374e7ce1d6a6c6c943e58545353e3aaa00607074ddb362b567a2181e4c782f6ee50ff3efb775b5f0abda9d2bccdd7b77bdf9eec7bae9440efef578bd18c1fac375e0f09ac40a520984aa53c8d299f6432691a5f3a9db6dd763a9d366dbbbbbbfba5ef755b021f1cb6f79d4a4b04fded0fc197c0dc154107f6d8eba3377719ef870484a0bebe3ea904fafafa3c8d299fd6d656698cf1785c7bbb994cc6b410ea9604ce1e1174f867cefb4d75de5c8c12b87ac2d809da49ff6cdda847042ee4bcb7034ce5de808686064f632a84ec177b7878d8729be3e3e3a66d8e8c8c98bedf2d099496e8e9b3ad1b053d55d82db91825a0b38f9c8ac0857cf77670a95cbff743b55e367797fd6ae7138d46a5b747cbce2edc92804ece1f0da6047452bd2fe412505927c0eb980aa15220ece8e8506e4f360d52b97bd10b09ac5f67d40626cebd78ffb79f1aa7c32ac5b01f6f0dbe044a4b04d555aceda34f8ea9170c3f8b875802b2e3f1e3c79ec66386ac4068e546a3c9c949d3b6cc0a82dff79dcb1278e335f353d56fce0bdab441dece545b7025b075a3f9d590b92b463fcada796b574825108d468b4a022a054295a98bece6a86c36ab34b5705302aa73d5f347e56dc97ee58a5502a5256a7df4fca67146246bef9f7f0ea104eaeaea8a4a0242c80b842af70c0c0d0d99b6212b08e67053022a7379ea357ee5656dc9ae1214ab046ebcab1ed36771797b76efd47421cfbd1b50c52881818101d3786573f9482422ad83a85e6e7453022a557dd524942577314a60d306eb77ffc9fafd171148a02824a03285311bc41d1d1d8e24b212b724f0c66b7adb0ba2046a0f58ef77595ca52521948010423aa01617173d8d47055981707070d0f67b550a82dff79d4b12b07ac92a8c12b03215c8a13225f8ba05122878781d930c953bfd0abd4f7699d1ea33126e49e0ec114840d6f7762ee9a5ceb9d3ae0b39eeed809a9b9b934aa0aaaacad398549015080b2d4e22ab27a8160473b82501ab05aa304ac0ce2fb64abb761e517621bfbd1d4ca9544a2a013faefd271bd0e3e3e36bde231387d5e70f200148201012b87dfbb65402b76eddd2f679555555f4f4e953eaefef77b43fa1ecb6dffc537bd9d39276d637840420814048e0d2a54b5209e87c94387f75a1478f1e517b7bbbad0d484646464ce35e59e493bdb6a7a7c7f2e743028579ffa0f3f6647d0f096844e5411a227d0f11bd6c2dc36c364ba9548a1a1b1b95db92fdbae76e2396dd1b6077d11448a030d5fbdc97c0578d9080566497cd8888128984e3cf5159cb9088a8aeae4eb94db3797e6e70b7b4b4987e9ed582600e48804f0256164dc9a1727765282f110aa1764f7e369b75bcd0a84a11d2eacd49b20261474787740d453b0b92080109bc8c5fffd4797bb2be7fffa0f57effaa51deae953b3503250121e4957322674b8ecbeed4cb1d56d70b944d67c6c7c74da7024e363c098b04366dd01b8f0e09d879ea4ff63d7fb4d9deffd385f1e8bd00ac0c523b9b8f34353529d51d32998cadb9b9ace8677638593a2d2c12b0f25d9f5e93b7a5eb01a2fb7fb1d64f6fed326fcfeee2222e8c476f07ff4a544ed789d4b7218b44229448249407a4ddba836aad21ff70ba8a72502470a946fe5dc79bd562b9f1aebc2d5d12a8fcb97a1fa94c057a6a21018ac5624a2b0de58e870f1f526767e7aabd02229108d5d6d6522291b0d4563a9d76b43db96c91904287dd82608ea048e01f7f947fd70f0ecbe398bb62ac83206b4be7a2222ad5fce737d5d675b4530f089c048430a6055e6f4d9ecd66a9bebede51dc2aab26e71f760b823982220195aa796989f9d9c07f2eabaffeab5302b2e5d5ff7b436d59723b4f2506560242a8d707741d56d6067c19aaf73be40e1d3b20074502d4abb6f24e69897146f0eda72fde3771ce58dfcfcaeabf6e2c34faab9facde6168e1afeacb92979658af2f045e024218970dbd3823d0b9a7819502a18e6dd5822401bb1b9d14423625702a01952987153efaadfdff65a0252084a013274ed0fcfcbc2b837f7979992e5ebca8355ed502a1ae6dd5822481b92b7ad6f2cf4d1bcc5ee35402d5fbd4ae68a8e074b9f1c04b40881715fee5e5656d02989898a0caca4a57e25529103a2d08e6089204a8d728b239e98fd212419f7f281f183a2440bdc63cde49bc07f6e8d9a0d4853c76a551c794959559aef8af3c969797e9eeddbb4a97169dd0dddd2d8dc569413047d02440bd6a970b0bb1fb87ab97fe367bad2e0950afb120ab9d3398da03fa762876218fdd1b20ba387efc38f5f7f7532a95a2858585356709d96c96161616e8fefdfb944824e8f4e9d38e2eff5941f6b0908e82608e204a807a8d9d90f76c53eb83f5eb8cf6f30794d97b744a2017effedd6af1eedc22e8ce9ff40cfe504b0018e84c243f72f72341f14382766c5efd6bbbe5154107f70a1aa8d7f76baa83e4c72fe25df97fdab159d0f15f1a570fdcf85c17728b3fb9811adc490ffc01241062b8930ff8034820c470271ff007904088e14e3ee00f208110c39d7cc01f400221863bf9803f8004420c77f2017f00098418eee403fe00120831dcc907fc01241062b8930ff8034820c42c5ee74f40c0cbe2754820d44c9ce34f42c0cb84c276e7904080b9708c3f09012f178e4102a166e71641dfdde04f44c043a67bed138b9040083955c19f8c80875315aee5157f62036bd4bc2d286d73cd7a507c3cb92ae8e87e57738a3fa98175b6bf2ae8f23b82be683092843b5181fe81fff987c6f26baafb2b38803fa10100acb0070000e0853d0000002fec01000078610f0000c00b7b0000005ed8030000f0c21e00008017f6000000bcb0070000e0853d0000002fec01000078610f0000c00b7b0000005ed8030000f0c21e00008017f60000008cfc1f1027f0d2e68fbd010000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Structure de la table `user_competences`
--

CREATE TABLE `user_competences` (
  `user_id` int(11) NOT NULL,
  `competences_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experience_pro`
--
ALTER TABLE `experience_pro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `poste_id` (`poste_id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `peridode_etude`
--
ALTER TABLE `peridode_etude`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `formation_id` (`formation_id`),
  ADD KEY `universite_id` (`universite`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `universite`
--
ALTER TABLE `universite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_competences`
--
ALTER TABLE `user_competences`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `competences_id` (`competences_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `experience_pro`
--
ALTER TABLE `experience_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `peridode_etude`
--
ALTER TABLE `peridode_etude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `universite`
--
ALTER TABLE `universite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `experience_pro`
--
ALTER TABLE `experience_pro`
  ADD CONSTRAINT `experience_pro_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `experience_pro_ibfk_2` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `experience_pro_ibfk_3` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `peridode_etude`
--
ALTER TABLE `peridode_etude`
  ADD CONSTRAINT `peridode_etude_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `peridode_etude_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `peridode_etude_ibfk_3` FOREIGN KEY (`universite`) REFERENCES `universite` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_competences`
--
ALTER TABLE `user_competences`
  ADD CONSTRAINT `user_competences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_competences_ibfk_2` FOREIGN KEY (`competences_id`) REFERENCES `competences` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
