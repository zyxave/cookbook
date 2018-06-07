-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 08:17 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'other'),
(2, 'appetizer'),
(3, 'main course'),
(4, 'dessert');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id_recipe` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `bought` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id_recipe`, `id_material`, `bought`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(1, 8, 0),
(2, 9, 0),
(2, 10, 0),
(2, 11, 0),
(2, 12, 0),
(2, 13, 0),
(2, 14, 0),
(2, 15, 0),
(2, 16, 0),
(2, 17, 0),
(3, 18, 0),
(3, 19, 0),
(3, 20, 0),
(3, 21, 0),
(3, 22, 0),
(3, 23, 0),
(3, 24, 0),
(3, 25, 0),
(3, 26, 0),
(3, 27, 0),
(3, 28, 0),
(3, 29, 0),
(3, 30, 0),
(3, 31, 0),
(4, 32, 0),
(4, 33, 0),
(4, 34, 0),
(4, 35, 0),
(4, 36, 0),
(4, 37, 0),
(4, 38, 0),
(4, 39, 0),
(4, 40, 0),
(4, 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `material` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id_material`, `material`) VALUES
(1, '3/4 cup melted butter'),
(2, '1 1/2 tablespoons Dijon mustard'),
(3, '1 1/2 teaspoons Worcestershire sauce'),
(4, '1 1/2 tablespoons poppy seeds'),
(5, '1 tablespoon dried minced onion'),
(6, '24 mini sandwich rolls'),
(7, '1 pound thinly sliced cooked deli ham'),
(8, '1 pound thinly sliced Swiss cheese'),
(9, '6 hard-cooked eggs'),
(10, '2 tablespoons mayonnaise'),
(11, '1 teaspoon white sugar'),
(12, '1 teaspoon white vinegar'),
(13, '1 teaspoon prepared mustard'),
(14, '1/2 teaspoon salt'),
(15, '1 tablespoon finely chopped onion'),
(16, '1 tablespoon finely chopped celery'),
(17, '1 pinch paprika, or to taste'),
(18, '1 (16 ounce) package linguine pasta'),
(19, '2 tablespoons butter'),
(20, '2 tablespoons extra-virgin olive oil'),
(21, '2 shallots, finely diced'),
(22, '2 cloves garlic, minced'),
(23, '1 pinch red pepper flakes (optional)'),
(24, '1 pound shrimp, peeled and deveined'),
(25, '1 pinch kosher salt and freshly ground pepper'),
(26, '1/2 cup dry white wine'),
(27, '1 lemon, juiced'),
(28, '2 tablespoons butter'),
(29, '2 tablespoons extra-virgin olive oil'),
(30, '1/4 cup finely chopped fresh parsley leaves'),
(31, '1 teaspoon extra-virgin olive oil, or to taste'),
(32, '3/4 cup butter, softened'),
(33, '1-1/2 cups packed brown sugar'),
(34, '2 large eggs'),
(35, '2 cups all-purpose flour'),
(36, '1-1/2 teaspoons baking powder'),
(37, '1/2 teaspoon baking soda'),
(38, '1/4 teaspoon salt'),
(39, '1/2 cup buttermilk'),
(40, '1/4 cup amaretto'),
(41, '1/3 cup slivered almonds');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id_recipe` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `desc` varchar(1000) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `bookmark` tinyint(1) DEFAULT NULL,
  `listed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id_recipe`, `name`, `time`, `desc`, `id_category`, `image`, `bookmark`, `listed`) VALUES
(1, 'Baked Ham and Cheese Party Sandwiches', '35', 'These small, delicious sandwiches are perfect for any party. They are so good that even the pickiest of eaters will eat these.', 1, 'https://images.media-allrecipes.com/userphotos/600x600/1081745.jpg', 1, 0),
(2, 'Simple Deviled Eggs', '15', 'The eggs are delicious, and it\'s easy to make more for larger gatherings. I\'ve added onion and celery for a little more flavor and texture.', 2, 'https://images.media-allrecipes.com/userphotos/600x600/999534.jpg', 0, 0),
(3, 'Shrimp Scampi with Pasta', '40', 'Well-rounded seafood and pasta dish. Good with any pasta; angel hair is less filling.', 3, 'https://images.media-allrecipes.com/userphotos/600x600/2606852.jpg', 0, 0),
(4, 'Amaretto Dream Cupcakes', '35', 'Treat yourself to these indulgent little cupcakes laced with the irresistible flavor of Amaretto and slivered almonds.', 4, 'https://cdn3.tmbi.com/secure/RMS/attachments/37/300x300/exps3_BSF2679079C06_15_5b_RMS.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `tag`) VALUES
(1, 'pasta'),
(2, 'vegetarian'),
(3, 'sweet'),
(4, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id_recipe` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id_recipe`, `id_tag`) VALUES
(1, 4),
(3, 1),
(3, 4),
(4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id_recipe`,`id_material`),
  ADD KEY `fk_recipe_has_material_material1_idx` (`id_material`),
  ADD KEY `fk_recipe_has_material_recipe1_idx` (`id_recipe`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id_recipe`),
  ADD KEY `fk_recipe_category1_idx` (`id_category`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_recipe`,`id_tag`),
  ADD KEY `fk_recipe_has_tag_tag1_idx` (`id_tag`),
  ADD KEY `fk_recipe_has_tag_recipe1_idx` (`id_recipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id_recipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `fk_recipe_has_material_material1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recipe_has_material_recipe1` FOREIGN KEY (`id_recipe`) REFERENCES `recipe` (`id_recipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_recipe_category1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `fk_recipe_has_tag_recipe1` FOREIGN KEY (`id_recipe`) REFERENCES `recipe` (`id_recipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recipe_has_tag_tag1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
