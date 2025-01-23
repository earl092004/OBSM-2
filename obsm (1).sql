-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 09:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text NOT NULL,
  `rating` decimal(2,1) NOT NULL DEFAULT 0.0,
  `genre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `year`, `cover_image`, `created_at`, `updated_at`, `description`, `rating`, `genre_id`, `price`, `quantity`) VALUES
(308, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowlings', 'non fiction', 2025, 'http://covers.openlibrary.org/b/id/8221251-L.jpg', '2021-07-13 09:37:29', '2025-01-22 08:21:12', 'A magical journey.', 4.9, 1, 19.99, 50),
(309, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 'Fantasy', 2000, 'http://covers.openlibrary.org/b/id/8224171-L.jpg', '2018-02-20 21:09:40', '2016-08-02 17:59:55', 'A magical journey.', 4.9, 1, 19.99, 50),
(310, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', 'Fantasy', 2000, 'http://covers.openlibrary.org/b/id/8221252-L.jpg', '2002-09-02 18:55:43', '2015-07-08 18:48:29', 'A magical journey.', 4.9, 1, 19.99, 50),
(311, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 'Fantasy', 2000, 'http://covers.openlibrary.org/b/id/8224172-L.jpg', '2022-07-13 09:51:29', '2015-07-25 02:12:34', 'A magical journey.', 4.9, 1, 19.99, 50),
(312, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling', 'Fantasy', 2000, 'http://covers.openlibrary.org/b/id/8224173-L.jpg', '2008-05-18 13:42:33', '2011-12-09 06:47:59', 'A magical journey.', 4.9, 1, 19.99, 50),
(313, 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling', 'Fantasy', 2000, 'http://covers.openlibrary.org/b/id/8224174-L.jpg', '2010-11-29 23:39:25', '2020-01-12 10:50:18', 'A magical journey.', 4.9, 1, 19.99, 50),
(314, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', 'Fantasy', 2000, 'http://covers.openlibrary.org/b/id/8224175-L.jpg', '2023-09-17 04:29:33', '2007-02-15 15:55:02', 'A magical journey.', 4.9, 1, 19.99, 50),
(315, 'ang panday', 'coco martini', 'Action', 1980, 'https://static.vecteezy.com/system/resources/previews/000/375/353/original/question-mark-vector-icon.jpg', '2025-01-15 10:50:10', '2025-01-15 10:50:10', 'asdasdad', 4.0, NULL, 1001.00, 131),
(316, 'bes123', 'earl', 'Action', 1928, 'https://img-s-msn-com.akamaized.net/tenant/amp/entityid/BB1oewfI.img?w=768&h=384&m=6', '2025-01-15 10:51:19', '2025-01-15 10:51:19', '123asdadasdas', 2.0, NULL, 10012.00, 1313),
(317, 'bes123', 'earl', 'Action', 1928, 'https://img-s-msn-com.akamaized.net/tenant/amp/entityid/BB1oewfI.img?w=768&h=384&m=6', '2025-01-15 12:13:11', '2025-01-15 12:13:11', '123asdasd', 2.0, NULL, 10012.00, 1313),
(318, 'ang pagong123124124', 'vicee', 'Action', 1980, 'https://static.vecteezy.com/system/resources/previews/000/375/353/original/question-mark-vector-icon.jpg', '2025-01-15 12:13:27', '2025-01-15 12:13:27', 'asdasdaddasdad', 4.0, NULL, 1001.00, 131),
(337, 'The Silent Woods', 'James Patterson', 'Mystery', 2005, 'https://picsum.photos/200/300?random=1', '2015-06-12 06:23:45', '2023-09-01 02:12:34', 'A thrilling mystery novel set in the heart of the woods.', 4.5, 3, 14.99, 50),
(338, 'Journey to the Stars', 'Amelia Richards', 'Science Fiction', 2012, 'https://picsum.photos/200/300?random=2', '2017-04-18 01:15:22', '2021-11-11 00:45:12', 'An adventurous story about exploring the cosmos.', 4.8, 4, 18.49, 35),
(339, 'Tides of Change', 'Sophia West', 'Romance', 2018, 'https://picsum.photos/200/300?random=3', '2020-08-24 03:17:09', '2022-05-05 08:45:33', 'A heartfelt tale of love and growth.', 4.6, 5, 12.99, 40),
(340, 'Legends of the Lost Kingdom', 'Arthur Doyle', 'Fantasy', 2000, 'https://picsum.photos/200/300?random=4', '2008-03-13 23:45:33', '2023-07-09 04:34:10', 'A captivating fantasy adventure in a mystical land.', 4.7, 1, 22.95, 60),
(341, 'The Final Horizon', 'Emily Carter', 'Science Fiction', 2020, 'https://picsum.photos/200/300?random=5', '2021-09-12 00:22:34', '2022-12-15 06:12:50', 'The ultimate mission to save humanity.', 4.9, 4, 19.99, 25),
(342, 'Through the Looking Glass', 'Lewis Carroll', 'Fantasy', 1871, 'https://picsum.photos/200/300?random=6', '2005-02-19 07:45:56', '2019-01-03 09:23:22', 'A timeless classic about curiosity and wonder.', 4.8, 1, 10.99, 80),
(343, 'Beyond the Veil', 'Catherine Moore', 'Horror', 2015, 'https://picsum.photos/200/300?random=7', '2018-06-30 02:00:00', '2020-09-20 04:45:12', 'A chilling tale of the supernatural.', 4.3, 6, 15.49, 45),
(344, 'Waves of Serenity', 'Michael Adams', 'Romance', 2010, 'https://picsum.photos/200/300?random=8', '2012-11-12 06:22:18', '2021-04-25 01:34:55', 'A story of love by the sea.', 4.7, 5, 13.75, 70),
(345, 'Chronicles of Valor', 'Henry Wilson', 'Dystopian', 2003, 'https://picsum.photos/200/300?random=9', '2006-04-15 08:12:44', '2018-12-20 05:23:01', 'A tale of rebellion in a dystopian world.', 4.5, 7, 16.95, 30),
(346, 'Echoes of Eternity', 'Brenda Miller', 'Historical', 1995, 'https://picsum.photos/200/300?random=10', '1998-07-21 01:50:22', '2023-02-01 03:15:33', 'A journey through time and history.', 4.4, 8, 20.49, 25),
(347, 'The Enchanted Castle', 'Edith Nesbit', 'Fantasy', 1907, 'https://picsum.photos/200/300?random=11', '2003-03-12 00:34:10', '2020-10-15 10:23:22', 'A magical tale of childhood adventure.', 4.6, 1, 9.99, 90),
(348, 'The Subtle Knife', 'Philip Pullman', 'Fantasy', 1997, 'https://picsum.photos/200/300?random=12', '2004-01-23 06:22:18', '2021-08-09 05:34:45', 'A gripping fantasy with twists and turns.', 4.8, 1, 19.95, 50),
(349, 'The Silent Forest', 'Katherine Lewis', 'Mystery', 2012, 'https://picsum.photos/200/300?random=13', '2015-05-14 04:45:09', '2023-06-05 09:12:34', 'A murder mystery set in the deep woods.', 4.2, 3, 14.25, 30),
(350, 'The Giver', 'Lois Lowry', 'Dystopian', 1993, 'https://picsum.photos/200/300?random=14', '1997-11-19 02:22:44', '2015-07-25 07:34:12', 'A thought-provoking story of a controlled society.', 4.8, 7, 12.99, 70),
(351, 'Animal Farm', 'George Orwell', 'Political Satire', 1945, 'https://picsum.photos/200/300?random=15', '0000-00-00 00:00:00', '2023-03-03 02:12:44', 'A satirical allegory of politics.', 4.9, 9, 15.49, 55),
(352, 'Reflections of Eternity', 'Mark Twain', 'Fiction', 1884, 'https://picsum.photos/200/300?random=16', '0000-00-00 00:00:00', '2019-11-22 06:33:10', 'An enduring tale of human spirit.', 4.7, 2, 18.50, 40),
(353, 'The Hunger Games', 'Suzanne Collins', 'Dystopian', 2008, 'https://picsum.photos/200/300?random=17', '2010-10-18 06:22:45', '2021-07-19 08:45:12', 'A story of survival and courage.', 4.8, 7, 20.95, 60),
(354, 'Matilda', 'Roald Dahl', 'Children\'s Literature', 1988, 'https://picsum.photos/200/300?random=18', '1990-03-12 04:34:10', '2018-02-01 00:23:55', 'A delightful tale of an extraordinary girl.', 4.9, 10, 10.99, 80),
(355, 'petrang kabayoo 222131', 'vicee', 'Action', 1980, 'https://static.vecteezy.com/system/resources/previews/000/375/353/original/question-mark-vector-icon.jpg', '2025-01-15 22:40:54', '2025-01-15 22:40:54', 'hghghjghjgjhghjgjhghjgjgihoihoiuyyyyuiyiuyiuyuyiuyiuiutguyrytvytdt', 5.0, NULL, 1001.00, 131),
(366, 'The Tragedy Unfolds', 'Sophia Bennett', 'Drama', 2012, 'https://picsum.photos/200/300?random=1', '2017-05-21 06:32:45', '2023-09-11 02:12:34', 'A heart-wrenching tale of human struggle.', 4.8, 1, 18.99, 30),
(367, 'The Broken Ties', 'James Carter', 'Drama', 2015, 'https://picsum.photos/200/300?random=2', '2018-03-12 01:12:18', '2021-12-05 03:34:10', 'A family drama that tests the bonds of love.', 4.7, 1, 15.49, 45),
(368, 'Shadows of the Past', 'Emily Brown', 'Drama', 2008, 'https://picsum.photos/200/300?random=3', '2010-11-22 00:22:34', '2019-01-15 08:45:12', 'A story of redemption and forgiveness.', 4.6, 1, 19.99, 25),
(369, 'The Silent Echo', 'Michael Adams', 'Drama', 2020, 'https://picsum.photos/200/300?random=4', '2021-09-17 23:12:44', '2022-11-12 10:22:09', 'A poignant exploration of loss.', 4.5, 1, 21.75, 50),
(370, 'Tears of the Moon', 'Catherine Moore', 'Drama', 2003, 'https://picsum.photos/200/300?random=5', '2008-01-10 04:00:00', '2018-07-29 01:00:00', 'An emotional journey of love and despair.', 4.9, 1, 22.49, 40),
(371, 'Beneath the Surface', 'Henry Wilson', 'Drama', 1999, 'https://picsum.photos/200/300?random=6', '2006-08-05 05:14:22', '2015-04-12 06:56:01', 'A gripping tale of secrets revealed.', 4.7, 1, 16.99, 55),
(372, 'The Final Curtain', 'Mark Johnson', 'Drama', 2016, 'https://picsum.photos/200/300?random=7', '2018-02-11 06:12:34', '2021-06-09 05:10:10', 'A compelling drama set in the theater.', 4.6, 1, 20.50, 35),
(373, 'The Price of Fame', 'Olivia Green', 'Drama', 2011, 'https://picsum.photos/200/300?random=8', '2014-12-01 00:34:55', '2019-03-22 07:23:12', 'The dark side of celebrity life.', 4.8, 1, 17.99, 20),
(374, 'A New Beginning', 'Liam Turner', 'Drama', 2007, 'https://picsum.photos/200/300?random=9', '2010-07-12 01:56:18', '2018-11-05 09:34:33', 'A hopeful tale of second chances.', 4.5, 1, 14.99, 50),
(375, 'The Forgotten Promise', 'Grace Williams', 'Drama', 2013, 'https://picsum.photos/200/300?random=10', '2015-09-21 02:45:00', '2020-12-18 00:34:21', 'A story of love lost and found.', 4.7, 1, 19.95, 25),
(386, 'Salomé', 'Oscar Wilde', 'Drama', 1893, 'http://covers.openlibrary.org/b/id/8246115-L.jpg', '2017-05-21 06:32:45', '2023-09-11 02:12:34', 'A heart-wrenching tale of betrayal and power.', 4.8, 1, 18.99, 30),
(387, 'Pygmalion', 'George Bernard Shaw', 'Drama', 1913, 'http://covers.openlibrary.org/b/id/9267223-L.jpg', '2018-03-12 01:12:18', '2021-12-05 03:34:10', 'A story of transformation and class struggle.', 4.7, 1, 15.49, 45),
(388, 'Sparkling Cyanide', 'Agatha Christie', 'Drama', 1945, 'http://covers.openlibrary.org/b/id/10249704-L.jpg', '2010-11-22 00:22:34', '2019-01-15 08:45:12', 'A gripping murder mystery.', 4.6, 1, 19.99, 25),
(389, 'A Doll\'s House', 'Henrik Ibsen', 'Drama', 1879, 'http://covers.openlibrary.org/b/id/879914-L.jpg', '2021-09-17 23:12:44', '2022-11-12 10:22:09', 'A story of independence and self-discovery.', 4.5, 1, 21.75, 50),
(390, 'The Secret Agent', 'Joseph Conrad', 'Drama', 1907, 'http://covers.openlibrary.org/b/id/8239401-L.jpg', '2008-01-10 04:00:00', '2018-07-29 01:00:00', 'A chilling tale of espionage.', 4.9, 1, 22.49, 40),
(391, 'Murder in Three Acts', 'Agatha Christie', 'Drama', 1934, 'http://covers.openlibrary.org/b/id/6874620-L.jpg', '2006-08-05 05:14:22', '2015-04-12 06:56:01', 'A classic whodunit mystery.', 4.7, 1, 16.99, 55),
(392, 'Peril at End House', 'Agatha Christie', 'Drama', 1932, 'http://covers.openlibrary.org/b/id/12996556-L.jpg', '2018-02-11 06:12:34', '2021-06-09 05:10:10', 'An intriguing mystery novel.', 4.6, 1, 20.50, 35),
(393, 'Οἰδίπους Τύραννος (Oidípous Týrannos)', 'Sophocles', 'Drama', -429, 'http://covers.openlibrary.org/b/id/764695-L.jpg', '2014-12-01 00:34:55', '2019-03-22 07:23:12', 'A timeless Greek tragedy.', 4.8, 1, 17.99, 20),
(394, 'Hercule Poirot\'s Christmas', 'Agatha Christie', 'Drama', 1938, 'http://covers.openlibrary.org/b/id/12855074-L.jpg', '2010-07-12 01:56:18', '2018-11-05 09:34:33', 'A holiday-themed mystery.', 4.5, 1, 14.99, 50),
(395, 'Elephants Can Remember', 'Agatha Christie', 'Drama', 1972, 'http://covers.openlibrary.org/b/id/11165070-L.jpg', '2015-09-21 02:45:00', '2020-12-18 00:34:21', 'A classic Hercule Poirot tale.', 4.7, 1, 19.95, 25),
(396, 'Pocket Gde to Sketching Lb', 'Non-Fiction', 'Non-fiction', 2020, 'http://covers.openlibrary.org/b/id/10970390-L.jpg', '2016-05-21 06:32:45', '2023-09-11 02:12:34', 'A guide to sketching for beginners.', 4.4, 2, 18.99, 30),
(397, 'We\'re All Puppets', 'Non Fiction', 'Non-fiction', 2020, 'http://covers.openlibrary.org/b/id/13559199-L.jpg', '2018-03-12 01:12:18', '2021-12-05 03:34:10', 'An exploration of human behavior.', 4.7, 2, 15.49, 45),
(398, 'Gem Guide to London', 'Non-Fiction', 'Non-fiction', 1995, 'N/A', '2010-11-22 00:22:34', '2019-01-15 08:45:12', 'A practical guide to the city.', 4.3, 2, 12.99, 20),
(399, 'Dracula', 'Bram Stoker', 'Non-fiction', 1897, 'http://covers.openlibrary.org/b/id/12216503-L.jpg', '2010-11-22 00:22:34', '2019-01-15 08:45:12', 'A fascinating Gothic novel.', 4.8, 2, 19.99, 25),
(400, 'Salomé', 'Oscar Wilde', 'Drama', 1893, 'http://covers.openlibrary.org/b/id/8246115-L.jpg', '2017-05-21 06:32:45', '2023-09-11 02:12:34', 'A heart-wrenching tale of betrayal and power.', 4.8, 1, 18.99, 30),
(401, 'Pygmalion', 'George Bernard Shaw', 'Drama', 1913, 'http://covers.openlibrary.org/b/id/9267223-L.jpg', '2018-03-12 01:12:18', '2021-12-05 03:34:10', 'A story of transformation and class struggle.', 4.7, 1, 15.49, 45),
(402, 'Sparkling Cyanide', 'Agatha Christie', 'Drama', 1945, 'http://covers.openlibrary.org/b/id/10249704-L.jpg', '2010-11-22 00:22:34', '2019-01-15 08:45:12', 'A gripping murder mystery.', 4.6, 1, 19.99, 25),
(403, 'A Doll\'s House', 'Henrik Ibsen', 'Drama', 1879, 'http://covers.openlibrary.org/b/id/879914-L.jpg', '2021-09-17 23:12:44', '2022-11-12 10:22:09', 'A story of independence and self-discovery.', 4.5, 1, 21.75, 50),
(404, 'The Secret Agent', 'Joseph Conrad', 'Drama', 1907, 'http://covers.openlibrary.org/b/id/8239401-L.jpg', '2008-01-10 04:00:00', '2018-07-29 01:00:00', 'A chilling tale of espionage.', 4.9, 1, 22.49, 40),
(405, 'Murder in Three Acts', 'Agatha Christie', 'Drama', 1934, 'http://covers.openlibrary.org/b/id/6874620-L.jpg', '2006-08-05 05:14:22', '2015-04-12 06:56:01', 'A classic whodunit mystery.', 4.7, 1, 16.99, 55),
(406, 'Peril at End House', 'Agatha Christie', 'Drama', 1932, 'http://covers.openlibrary.org/b/id/12996556-L.jpg', '2018-02-11 06:12:34', '2021-06-09 05:10:10', 'An intriguing mystery novel.', 4.6, 1, 20.50, 35),
(407, 'Οἰδίπους Τύραννος (Oidípous Týrannos)', 'Sophocles', 'Drama', -429, 'http://covers.openlibrary.org/b/id/764695-L.jpg', '2014-12-01 00:34:55', '2019-03-22 07:23:12', 'A timeless Greek tragedy.', 4.8, 1, 17.99, 20),
(408, 'Hercule Poirot\'s Christmas', 'Agatha Christie', 'Drama', 1938, 'http://covers.openlibrary.org/b/id/12855074-L.jpg', '2010-07-12 01:56:18', '2018-11-05 09:34:33', 'A holiday-themed mystery.', 4.5, 1, 14.99, 50),
(409, 'Elephants Can Remember', 'Agatha Christie', 'Drama', 1972, 'http://covers.openlibrary.org/b/id/11165070-L.jpg', '2015-09-21 02:45:00', '2020-12-18 00:34:21', 'A classic Hercule Poirot tale.', 4.7, 1, 19.95, 25),
(410, 'Pocket Gde to Sketching Lb', 'Non-Fiction', 'Non-fiction', 2020, 'http://covers.openlibrary.org/b/id/10970390-L.jpg', '2016-05-21 06:32:45', '2023-09-11 02:12:34', 'A guide to sketching for beginners.', 4.4, 2, 18.99, 30),
(411, 'We\'re All Puppets', 'Non Fiction', 'Non-fiction', 2020, 'http://covers.openlibrary.org/b/id/13559199-L.jpg', '2018-03-12 01:12:18', '2021-12-05 03:34:10', 'An exploration of human behavior.', 4.7, 2, 15.49, 45),
(412, 'Gem Guide to London', 'Non-Fiction', 'Non-fiction', 1995, 'N/A', '2010-11-22 00:22:34', '2019-01-15 08:45:12', 'A practical guide to the city.', 4.3, 2, 12.99, 20),
(413, 'Dracula', 'Bram Stoker', 'Non-fiction', 1897, 'http://covers.openlibrary.org/b/id/12216503-L.jpg', '2010-11-22 00:22:34', '2019-01-15 08:45:12', 'A fascinating Gothic novel.', 4.8, 2, 19.99, 25),
(414, 'Meditations', 'Marcus Aurelius', 'Non-fiction', 167, 'http://covers.openlibrary.org/b/id/211529-L.jpg', '2015-07-19 01:45:33', '2023-01-12 06:23:55', 'Timeless philosophical insights.', 4.9, 2, 14.99, 35),
(417, 'Man and Superman', 'George Bernard Shaw', 'Comedy', 1903, 'http://covers.openlibrary.org/b/id/8288031-L.jpg', '2017-05-21 06:32:45', '2023-09-11 02:12:34', 'A satirical play exploring human nature.', 4.6, 3, 16.49, 30),
(418, 'The Importance of Being Earnest', 'Oscar Wilde', 'Comedy', 1895, 'http://covers.openlibrary.org/b/id/1260453-L.jpg', '2018-03-12 01:12:18', '2021-12-05 03:34:10', 'A witty comedy of manners.', 4.8, 3, 18.49, 25),
(419, 'As You Like It', 'William Shakespeare', 'Comedy', 1623, 'http://covers.openlibrary.org/b/id/7338874-L.jpg', '2010-11-22 00:22:34', '2019-01-15 08:45:12', 'A pastoral comedy full of charm and humor.', 4.7, 3, 14.99, 40),
(420, 'Much Ado About Nothing', 'William Shakespeare', 'Comedy', 1598, 'http://covers.openlibrary.org/b/id/8290853-L.jpg', '2021-09-17 23:12:44', '2022-11-12 10:22:09', 'A delightful comedy of misunderstandings.', 4.6, 3, 17.75, 35),
(421, 'The Alchemist', 'Ben Jonson', 'Comedy', 1610, 'http://covers.openlibrary.org/b/id/7463992-L.jpg', '2008-01-10 04:00:00', '2018-07-29 01:00:00', 'A satire of greed and gullibility.', 4.5, 3, 19.25, 50),
(422, 'The Taming of the Shrew', 'William Shakespeare', 'Comedy', 1593, 'http://covers.openlibrary.org/b/id/7889534-L.jpg', '2015-09-21 02:45:00', '2020-12-18 00:34:21', 'A lively battle of the sexes.', 4.6, 3, 15.99, 45),
(423, 'Cyrano de Bergerac', 'Edmond Rostand', 'Comedy', 1897, 'http://covers.openlibrary.org/b/id/8236320-L.jpg', '2010-07-12 01:56:18', '2018-11-05 09:34:33', 'A comedic tale of love and valor.', 4.7, 3, 18.99, 25),
(424, 'The Tempest', 'William Shakespeare', 'Comedy', 1611, 'http://covers.openlibrary.org/b/id/8155661-L.jpg', '2015-07-19 01:45:33', '2023-01-12 06:23:55', 'A magical comedy of reconciliation.', 4.8, 3, 20.49, 30),
(425, 'The Rivals', 'Richard Brinsley Sheridan', 'Comedy', 1775, 'http://covers.openlibrary.org/b/id/8256441-L.jpg', '2006-08-05 05:14:22', '2015-04-12 06:56:01', 'A sharp comedy of manners.', 4.5, 3, 17.50, 40),
(426, 'Twelfth Night', 'William Shakespeare', 'Comedy', 1602, 'http://covers.openlibrary.org/b/id/8292072-L.jpg', '2014-12-01 00:34:55', '2019-03-22 07:23:12', 'A whimsical comedy of love and identity.', 4.8, 3, 19.99, 35),
(439, 'Random Book 7906', 'Author 831', 'Drama', 1857, 'https://picsum.photos/200/300?random=5922', '2023-09-15 07:02:27', '2007-12-15 14:52:34', 'A random drama book description.', 3.5, 1, 6.89, 40),
(440, 'Random Book 1328', 'Author 938', 'Drama', 1919, 'https://picsum.photos/200/300?random=7912', '2002-08-08 13:17:40', '2004-09-08 05:29:47', 'A random drama book description.', 4.5, 1, 7.45, 32),
(441, 'Random Book 5453', 'Author 741', 'Drama', 1885, 'https://picsum.photos/200/300?random=9522', '2014-04-19 21:05:07', '2019-05-12 14:15:06', 'A random drama book description.', 4.1, 1, 33.34, 60),
(442, 'Random Book 1757', 'Author 838', 'Drama', 1969, 'https://picsum.photos/200/300?random=2190', '2003-06-05 13:28:39', '2005-05-06 14:15:15', 'A random drama book description.', 4.9, 1, 11.86, 56),
(443, 'Random Book 2227', 'Author 202', 'Drama', 1924, 'https://picsum.photos/200/300?random=1368', '2019-04-15 10:43:00', '2015-07-23 12:31:24', 'A random drama book description.', 3.9, 1, 22.50, 45),
(444, 'Random Book 3527', 'Author 523', 'Non-fiction', 2005, 'https://picsum.photos/200/300?random=9200', '2009-08-24 07:43:02', '2016-01-13 02:12:11', 'A random non-fiction book description.', 4.2, 2, 9.99, 55),
(445, 'Random Book 7012', 'Author 421', 'Non-fiction', 1937, 'https://picsum.photos/200/300?random=1250', '2022-10-10 09:22:40', '2006-06-15 07:34:22', 'A random non-fiction book description.', 4.8, 2, 18.50, 40),
(446, 'Random Book 5419', 'Author 312', 'Non-fiction', 1995, 'https://picsum.photos/200/300?random=4851', '2001-02-23 05:15:27', '2002-08-29 13:12:54', 'A random non-fiction book description.', 4.3, 2, 11.35, 36),
(447, 'Random Book 9845', 'Author 145', 'Non-fiction', 1883, 'https://picsum.photos/200/300?random=8024', '2021-12-04 06:12:45', '2008-09-12 14:18:10', 'A random non-fiction book description.', 3.7, 2, 19.99, 60),
(448, 'Random Book 3951', 'Author 893', 'Non-fiction', 2000, 'https://picsum.photos/200/300?random=3452', '2003-05-01 04:00:00', '2007-08-30 09:45:33', 'A random non-fiction book description.', 4.1, 2, 25.75, 50),
(449, 'Random Book 2029', 'Author 953', 'Comedy', 1879, 'https://picsum.photos/200/300?random=1245', '2011-09-15 01:35:22', '2019-04-25 07:45:33', 'A random comedy book description.', 4.0, 3, 7.95, 22),
(450, 'Random Book 6783', 'Author 431', 'Comedy', 1903, 'https://picsum.photos/200/300?random=2385', '2004-01-12 06:12:33', '2016-12-08 04:15:44', 'A random comedy book description.', 3.9, 3, 14.49, 42),
(451, 'petrang kabayoo 222131cxb', 'vicee', 'Action', 1980, 'https://static.vecteezy.com/system/resources/previews/000/375/353/original/question-mark-vector-icon.jpg', '2025-01-16 02:34:58', '2025-01-16 02:34:58', 'dfzfszxdzxd', 5.0, NULL, 1001.00, 131),
(454, 'boabankok', 'luffy', 'Action', 2024, 'https://static.vecteezy.com/system/resources/previews/000/375/353/original/question-mark-vector-icon.jpg', '2025-01-19 15:39:10', '2025-01-19 15:39:10', 'dsadasdasda', 5.0, NULL, 100.00, 1112),
(455, 'kakarai josu no takagi san', 'nishkata', 'romance', 2018, 'https://s.yimg.com/zb/imgv1/6bf364b1-d190-3c81-93df-77f16cc1acc4/t_500x300', '2025-01-19 15:41:01', '2025-01-19 15:41:01', 'Teasing Master Takagi-san is a Japanese manga series written and illustrated by Sōichirō Yamamoto. It started in Shogakukan\'s shōnen manga magazine supplement Monthly Shōnen Sunday Mini in June 2013, and later moved to the main magazine, Monthly Shōnen Sunday, in July 2016 and finished in October 2023. Its chapters were collected in twenty tankōbon volumes.', 5.0, NULL, 1232.00, 13),
(456, 'kakarai josu no takagi san vol2', 'nishkata', 'romance', 2018, 'https://s.yimg.com/zb/imgv1/6bf364b1-d190-3c81-93df-77f16cc1acc4/t_500x300', '2025-01-19 15:42:30', '2025-01-19 15:42:30', 'Teasing Master Takagi-san is a Japanese manga series written and illustrated by Sōichirō Yamamoto. It started in Shogakukan\'s shōnen manga magazine supplement Monthly Shōnen Sunday Mini in June 2013, and later moved to the main magazine, Monthly Shōnen Sunday, in July 2016 and finished in October 2023. Its chapters were collected in twenty tankōbon volumes.', 5.0, NULL, 1232.00, 13),
(459, 'Guide to best plays', 'Francis K. W. Drury', 'Drama', 2025, 'https://covers.openlibrary.org/b/id/4416447-L.jpg', '2025-01-22 11:27:46', '2025-01-22 11:27:46', 'No description available.', 5.0, NULL, 20.00, 10),
(460, 'Making the list', 'Michael Korda', 'Books and reading', 2025, 'https://covers.openlibrary.org/b/id/507296-L.jpg', '2025-01-22 11:27:46', '2025-01-22 11:27:46', 'No description available.', 5.0, NULL, 20.00, 10),
(461, 'Antisemitische Geschichtsbilder', 'Werner Bergmann', 'Antisemitism', 2025, 'https://covers.openlibrary.org/b/id/8415635-L.jpg', '2025-01-22 11:27:46', '2025-01-22 11:27:46', 'No description available.', 5.0, NULL, 20.00, 10),
(522, 'Venum', 'eddy', 'Action', 2024, 'https://static.vecteezy.com/system/resources/previews/000/375/353/original/question-mark-vector-icon.jpg', '2025-01-22 23:17:38', '2025-01-22 23:17:38', 'Venum an ailen', 4.0, NULL, 122.00, 12),
(523, 'laravel', 'lester', 'non fiction', 2025, 'https://static.vecteezy.com/system/resources/previews/000/375/353/original/question-mark-vector-icon.jpg', '2025-01-23 01:42:03', '2025-01-23 01:42:03', 'Web Development', 5.0, NULL, 1000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `created_at`, `updated_at`, `user_id`, `book_id`, `quantity`) VALUES
(18, '2025-01-18 06:52:07', '2025-01-18 06:52:07', 12, 340, 1),
(19, '2025-01-18 06:52:24', '2025-01-18 07:09:33', 12, 308, 5),
(21, '2025-01-18 06:58:33', '2025-01-18 06:58:33', 12, 309, 1),
(24, '2025-01-18 07:10:08', '2025-01-18 07:10:08', 12, 341, 1),
(25, '2025-01-18 07:10:14', '2025-01-18 07:10:14', 12, 355, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_21_094219_create_post_table', 1),
(5, '2025_01_04_164731_create_books_table', 1),
(6, '2025_01_05_154107_remove_role_from_users_table', 1),
(7, '2025_01_05_154445_set_default_phone_number', 1),
(8, '2025_01_05_230401_add_role_to_users_table', 1),
(10, '2025_01_09_082330_add_role_to_users_table', 2),
(12, '2025_01_12_150406_drop_role_column_from_users_table', 2),
(15, '2025_01_12_152514_add_role_column_to_users_table', 3),
(35, '2025_01_06_052653_add_subscription_type_to_users_table', 4),
(36, '2025_01_12_140258_add_phone_number_to_users_table', 4),
(37, '2025_01_12_153220_add_role_column_to_users_table', 4),
(38, '2025_01_12_154530_create_books_table', 4),
(39, '2025_01_12_181313_update_books_table', 5),
(40, '2025_01_13_074549_add_two_factor_columns_to_users_table', 5),
(41, '2025_01_13_083823_create_permission_tables', 6),
(42, '2025_01_13_095426_add_phone_number_to_users_table', 7),
(43, '2025_01_13_144940_add_price_and_quantity_to_books_table', 8),
(44, '2025_01_13_152059_make_price_nullable_in_books_table', 9),
(45, '2025_01_13_152401_set_default_quantity_in_books_table', 10),
(46, '2025_01_13_154426_remove_price_and_quantity_from_books_table', 11),
(47, '2025_01_13_154513_add_price_and_quantity_to_books_table', 12),
(49, '2025_01_13_154906_add_price_and_quantity_to_books_table', 13),
(50, '2025_01_13_162540_add_description_to_books_table', 14),
(51, '2025_01_13_171539_add_rating_to_books_table', 15),
(52, '2025_01_13_173622_create_genres_table', 16),
(53, '2025_01_13_173704_add_genre_id_to_books_table', 17),
(54, '2025_01_13_154649_remove_price_and_quantity_from_books_table', 18),
(55, '2025_01_13_175829_add_price_and_quantity_to_books_table', 19),
(56, '2025_01_17_145623_add_two_factor_columns_to_users_table', 20),
(57, '2025_01_17_170442_create_transaction_history_table', 21),
(58, '2025_01_17_173519_create_transaction_histories_table', 22),
(59, '2025_01_18_075423_create_carts_table', 23),
(60, '2025_01_18_204440_create_transaction_history_table', 24),
(62, '2025_01_18_212950_add_price_to_transaction_histories_table', 25),
(63, '2025_01_19_110448_add_book_id_to_transaction_histories', 26),
(64, '2025_01_19_110832_add_quantity_to_transaction_histories', 27),
(66, '2025_01_19_112612_remove_books_column_from_transaction_histories_table', 28),
(67, '2025_01_19_113342_add_total_amount_to_transaction_histories', 29),
(68, '2025_01_19_122027_add_total_amount_to_transaction_histories_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FjgoBLZJNbGiSNQI3NzGxgh5WQ4ROISJmSGdmow9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXZKYWh0bzhXSDB0cmNpMzJPcnMzTDh6REJTUDFWQW14RHhUZ1I0SiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1737625502);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_histories`
--

CREATE TABLE `transaction_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(8,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_histories`
--

INSERT INTO `transaction_histories` (`id`, `user_id`, `price`, `quantity`, `total_amount`, `created_at`, `updated_at`, `book_id`) VALUES
(20, 4, 19.99, 1, 19.99, '2025-01-19 05:35:25', '2025-01-19 05:35:25', 312),
(21, 4, 19.99, 3, 59.97, '2025-01-19 05:35:25', '2025-01-19 05:35:25', 311),
(22, 4, 1001.00, 1, 1001.00, '2025-01-19 05:54:17', '2025-01-19 05:54:17', 451),
(23, 4, 1001.00, 1, 1001.00, '2025-01-19 05:54:17', '2025-01-19 05:54:17', 355),
(25, 8, 18.99, 1, 18.99, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 396),
(26, 8, 19.99, 1, 19.99, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 341),
(27, 8, 9.99, 1, 9.99, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 347),
(28, 8, 1001.00, 2, 2002.00, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 451),
(29, 8, 1001.00, 1, 1001.00, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 355),
(30, 8, 13.75, 1, 13.75, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 344),
(31, 8, 12.99, 1, 12.99, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 339),
(32, 8, 1001.00, 1, 1001.00, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 318),
(34, 8, 19.99, 1, 19.99, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 310),
(35, 8, 22.49, 1, 22.49, '2025-01-19 05:55:22', '2025-01-19 05:55:22', 390),
(36, 8, 15.49, 1, 15.49, '2025-01-19 06:53:16', '2025-01-19 06:53:16', 397),
(37, 8, 19.99, 1, 19.99, '2025-01-19 06:53:16', '2025-01-19 06:53:16', 311),
(38, 8, 19.99, 1, 19.99, '2025-01-19 06:53:16', '2025-01-19 06:53:16', 308),
(39, 8, 19.99, 2, 39.98, '2025-01-19 07:36:24', '2025-01-19 07:36:24', 311),
(40, 8, 19.99, 1, 19.99, '2025-01-19 07:36:24', '2025-01-19 07:36:24', 313),
(41, 8, 19.99, 1, 19.99, '2025-01-19 07:36:24', '2025-01-19 07:36:24', 312),
(42, 8, 19.99, 1, 19.99, '2025-01-19 07:48:52', '2025-01-19 07:48:52', 311),
(43, 8, 1001.00, 1, 1001.00, '2025-01-19 07:48:52', '2025-01-19 07:48:52', 451),
(44, 8, 19.99, 1, 19.99, '2025-01-19 07:48:52', '2025-01-19 07:48:52', 309),
(45, 8, 19.99, 1, 19.99, '2025-01-19 08:07:35', '2025-01-19 08:07:35', 312),
(46, 8, 19.99, 1, 19.99, '2025-01-19 08:07:35', '2025-01-19 08:07:35', 311),
(47, 8, 19.99, 1, 19.99, '2025-01-19 08:07:35', '2025-01-19 08:07:35', 313),
(62, 2, 19.99, 1, 19.99, '2025-01-19 21:10:25', '2025-01-19 21:10:25', 312),
(63, 2, 19.99, 1, 19.99, '2025-01-19 21:10:25', '2025-01-19 21:10:25', 308),
(64, 2, 19.99, 1, 19.99, '2025-01-19 21:10:25', '2025-01-19 21:10:25', 309),
(65, 2, 19.99, 2, 39.98, '2025-01-19 21:10:25', '2025-01-19 21:10:25', 310),
(66, 2, 1001.00, 1, 1001.00, '2025-01-19 21:10:25', '2025-01-19 21:10:25', 355),
(67, 2, 1001.00, 2, 2002.00, '2025-01-19 21:11:50', '2025-01-19 21:11:50', 355),
(68, 2, 1001.00, 1, 1001.00, '2025-01-19 21:11:50', '2025-01-19 21:11:50', 451),
(69, 2, 1232.00, 1, 1232.00, '2025-01-19 21:11:50', '2025-01-19 21:11:50', 455),
(70, 2, 1232.00, 1, 1232.00, '2025-01-19 21:11:50', '2025-01-19 21:11:50', 456),
(71, 2, 19.99, 1, 19.99, '2025-01-19 21:11:50', '2025-01-19 21:11:50', 308),
(72, 2, 9.99, 1, 9.99, '2025-01-21 03:32:10', '2025-01-21 03:32:10', 347),
(73, 2, 19.99, 1, 19.99, '2025-01-21 03:32:10', '2025-01-21 03:32:10', 308),
(74, 2, 19.99, 1, 19.99, '2025-01-21 03:32:10', '2025-01-21 03:32:10', 314),
(75, 2, 1001.00, 1, 1001.00, '2025-01-21 03:32:10', '2025-01-21 03:32:10', 451),
(76, 2, 1001.00, 1, 1001.00, '2025-01-21 03:32:10', '2025-01-21 03:32:10', 355),
(77, 2, 19.99, 1, 19.99, '2025-01-21 21:21:03', '2025-01-21 21:21:03', 310),
(78, 2, 19.99, 1, 19.99, '2025-01-21 21:21:03', '2025-01-21 21:21:03', 313),
(79, 2, 9.99, 1, 9.99, '2025-01-21 21:21:03', '2025-01-21 21:21:03', 347),
(80, 2, 10.99, 1, 10.99, '2025-01-21 21:21:03', '2025-01-21 21:21:03', 342),
(81, 2, 19.99, 1, 19.99, '2025-01-21 22:19:17', '2025-01-21 22:19:17', 368),
(82, 2, 21.75, 1, 21.75, '2025-01-21 22:19:17', '2025-01-21 22:19:17', 369),
(83, 2, 22.49, 1, 22.49, '2025-01-21 22:19:17', '2025-01-21 22:19:17', 370),
(84, 2, 16.99, 1, 16.99, '2025-01-21 22:19:17', '2025-01-21 22:19:17', 371),
(86, 35, 19.99, 1, 19.99, '2025-01-21 23:33:35', '2025-01-21 23:33:35', 310),
(87, 35, 19.99, 1, 19.99, '2025-01-21 23:33:35', '2025-01-21 23:33:35', 312),
(88, 35, 10012.00, 1, 10012.00, '2025-01-21 23:33:35', '2025-01-21 23:33:35', 316),
(89, 35, 1001.00, 1, 1001.00, '2025-01-21 23:33:35', '2025-01-21 23:33:35', 315),
(90, 35, 1232.00, 1, 1232.00, '2025-01-21 23:33:35', '2025-01-21 23:33:35', 456),
(91, 35, 1001.00, 1, 1001.00, '2025-01-21 23:33:35', '2025-01-21 23:33:35', 355),
(92, 33, 10012.00, 1, 10012.00, '2025-01-21 23:37:39', '2025-01-21 23:37:39', 316),
(93, 33, 10012.00, 1, 10012.00, '2025-01-21 23:37:39', '2025-01-21 23:37:39', 317),
(94, 33, 1001.00, 1, 1001.00, '2025-01-21 23:37:39', '2025-01-21 23:37:39', 318),
(95, 33, 1001.00, 1, 1001.00, '2025-01-21 23:38:31', '2025-01-21 23:38:31', 315),
(96, 33, 10012.00, 1, 10012.00, '2025-01-21 23:38:31', '2025-01-21 23:38:31', 316),
(97, 33, 10012.00, 1, 10012.00, '2025-01-21 23:38:31', '2025-01-21 23:38:31', 317),
(98, 26, 1001.00, 1, 1001.00, '2025-01-22 09:28:36', '2025-01-22 09:28:36', 355),
(99, 26, 1001.00, 1, 1001.00, '2025-01-22 09:28:36', '2025-01-22 09:28:36', 315),
(100, 26, 10012.00, 1, 10012.00, '2025-01-22 09:28:36', '2025-01-22 09:28:36', 316),
(101, 26, 14.99, 1, 14.99, '2025-01-22 09:28:36', '2025-01-22 09:28:36', 337),
(102, 26, 19.99, 1, 19.99, '2025-01-22 09:28:36', '2025-01-22 09:28:36', 308),
(103, 26, 19.99, 1, 19.99, '2025-01-22 09:28:36', '2025-01-22 09:28:36', 309),
(104, 26, 19.99, 1, 19.99, '2025-01-22 09:28:36', '2025-01-22 09:28:36', 310),
(105, 26, 19.99, 1, 19.99, '2025-01-22 09:28:36', '2025-01-22 09:28:36', 311),
(106, 26, 19.99, 1, 19.99, '2025-01-22 10:37:40', '2025-01-22 10:37:40', 312),
(107, 26, 19.99, 1, 19.99, '2025-01-22 10:37:40', '2025-01-22 10:37:40', 308),
(108, 26, 19.99, 1, 19.99, '2025-01-22 10:37:40', '2025-01-22 10:37:40', 310),
(109, 26, 19.99, 1, 19.99, '2025-01-22 10:37:52', '2025-01-22 10:37:52', 312),
(110, 26, 19.99, 1, 19.99, '2025-01-22 10:37:52', '2025-01-22 10:37:52', 313),
(111, 26, 19.99, 1, 19.99, '2025-01-22 10:37:52', '2025-01-22 10:37:52', 308),
(112, 26, 19.99, 1, 19.99, '2025-01-23 00:12:06', '2025-01-23 00:12:06', 312),
(113, 26, 19.99, 1, 19.99, '2025-01-23 00:12:06', '2025-01-23 00:12:06', 313),
(114, 26, 19.99, 1, 19.99, '2025-01-23 00:15:05', '2025-01-23 00:15:05', 312),
(115, 26, 19.99, 1, 19.99, '2025-01-23 00:15:05', '2025-01-23 00:15:05', 313),
(116, 26, 19.99, 1, 19.99, '2025-01-23 00:16:02', '2025-01-23 00:16:02', 308),
(117, 26, 19.99, 1, 19.99, '2025-01-23 00:16:02', '2025-01-23 00:16:02', 309),
(118, 26, 19.99, 1, 19.99, '2025-01-23 00:16:02', '2025-01-23 00:16:02', 310),
(119, 26, 19.99, 1, 19.99, '2025-01-23 00:16:02', '2025-01-23 00:16:02', 311),
(120, 26, 22.49, 1, 22.49, '2025-01-23 00:16:02', '2025-01-23 00:16:02', 370),
(121, 40, 19.99, 1, 19.99, '2025-01-23 00:17:57', '2025-01-23 00:17:57', 312),
(122, 40, 19.99, 1, 19.99, '2025-01-23 00:17:57', '2025-01-23 00:17:57', 311),
(123, 40, 1001.00, 1, 1001.00, '2025-01-23 00:17:57', '2025-01-23 00:17:57', 315),
(124, 40, 1232.00, 1, 1232.00, '2025-01-23 00:17:57', '2025-01-23 00:17:57', 455),
(125, 26, 1232.00, 1, 1232.00, '2025-01-23 00:21:05', '2025-01-23 00:21:05', 456),
(126, 26, 19.99, 1, 19.99, '2025-01-23 00:21:05', '2025-01-23 00:21:05', 311),
(127, 26, 19.99, 1, 19.99, '2025-01-23 00:21:05', '2025-01-23 00:21:05', 313),
(128, 26, 1232.00, 1, 1232.00, '2025-01-23 00:21:05', '2025-01-23 00:21:05', 455),
(129, 26, 1001.00, 1, 1001.00, '2025-01-23 00:21:05', '2025-01-23 00:21:05', 355),
(130, 26, 1001.00, 1, 1001.00, '2025-01-23 00:21:05', '2025-01-23 00:21:05', 451),
(131, 26, 22.49, 1, 22.49, '2025-01-23 01:33:01', '2025-01-23 01:33:01', 370),
(132, 26, 1001.00, 2, 2002.00, '2025-01-23 01:33:01', '2025-01-23 01:33:01', 451),
(133, 26, 1001.00, 1, 1001.00, '2025-01-23 01:33:01', '2025-01-23 01:33:01', 355),
(134, 26, 1001.00, 1, 1001.00, '2025-01-23 01:34:21', '2025-01-23 01:34:21', 355),
(135, 26, 1001.00, 1, 1001.00, '2025-01-23 01:34:43', '2025-01-23 01:34:43', 355),
(136, 26, 1001.00, 1, 1001.00, '2025-01-23 01:37:02', '2025-01-23 01:37:02', 355),
(137, 26, 1001.00, 1, 1001.00, '2025-01-23 01:37:54', '2025-01-23 01:37:54', 355),
(138, 26, 1000.00, 1, 1000.00, '2025-01-23 01:44:12', '2025-01-23 01:44:12', 523),
(139, 26, 19.99, 1, 19.99, '2025-01-23 01:44:12', '2025-01-23 01:44:12', 309);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subscription_type` varchar(255) NOT NULL DEFAULT 'regular',
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `remember_token`, `created_at`, `updated_at`, `subscription_type`, `phone_number`) VALUES
(2, 'Sean pacho 12345', 'ramirez@pacho', NULL, '$2y$12$vlfM4kI6nRzaEJz2GR3Hru6d1RjG6sEayJW/TRZbLtG4N6feGChx2', NULL, NULL, NULL, 'user', NULL, '2025-01-12 04:28:29', '2025-01-21 23:21:19', 'premium', NULL),
(3, 'Sean pacho 1', '1234@gmail.com', NULL, '$2y$12$6gOz8g1zusBOEwC1DTY79.N6X67w1GXFaqueg4ZMtVm8CIq3UDN3a', NULL, NULL, NULL, 'user', NULL, '2025-01-12 05:06:32', '2025-01-12 05:06:32', 'regular', NULL),
(4, 'althea Pacho', 'althea@althea', NULL, '$2y$12$V2UXGYHahyqOUz021tEE5uBVaEXZKkvQuwpXCGetQzjbYVM4ZpJ5m', NULL, NULL, NULL, 'user', NULL, '2025-01-12 05:08:56', '2025-01-12 05:08:56', 'regular', NULL),
(5, 'althea Pacho', 'althea@altheaa', NULL, '$2y$12$K/6MOzrPlV47U4Ho4SZjcefZDXfNJtScXYLSKJTH2pc5q86840Dg.', NULL, NULL, NULL, 'user', NULL, '2025-01-12 06:03:14', '2025-01-12 06:03:14', 'regular', NULL),
(6, 'Earl Sean Pacho', 'pachoearlsean@gmail.com', NULL, '$2y$12$j9mbUpBxTrdwWWeb1jyOROpvrHufMHiYiMJDGul9SmBZccCrhFz5O', NULL, NULL, NULL, 'admin', NULL, '2025-01-12 06:54:15', '2025-01-19 16:39:23', 'regular', NULL),
(8, 'pacho', 'pacho@pacho', NULL, '$2y$12$KjO9ooJSD1FjL5Y9su.LTe.zYRnm8Qtex1C10jQzLtfF8HheBb7wm', NULL, NULL, NULL, 'user', NULL, '2025-01-12 07:08:46', '2025-01-19 21:03:23', 'basic', NULL),
(10, 'arlene', 'arlene@arlene', NULL, '$2y$12$W3I2oWffx88jKPhfy8xCYeAbtMf9Bap/vaEojIrUySj5sW8FphmjS', NULL, NULL, NULL, 'user', NULL, '2025-01-12 07:19:47', '2025-01-12 07:19:47', 'regular', NULL),
(12, 'papa', 'papa@papa', NULL, '$2y$12$AMRvSBrmG8Hj/zRg4Kzcz.5XB858VWlCd2y/o/QIiJkkl3mqElf9y', NULL, NULL, NULL, 'admin', NULL, '2025-01-12 07:36:15', '2025-01-12 07:36:15', 'regular', NULL),
(13, 'Test User', 'test@example.com', '2025-01-13 01:30:38', '$2y$12$bcDcWh8Ngrd1S1G5wwUdweZpbPALlevC3/fY1JwUFMlB/KzG1hlha', NULL, NULL, NULL, 'user', 'Nw3L8rrS8F', '2025-01-13 01:30:39', '2025-01-13 01:30:39', 'regular', NULL),
(14, 'nyah', 'nyah@nyah', NULL, '$2y$12$9YDagPcIeB5qbMtbJKXf0OhaIjHImWub7Sgr5mkXH5NDvdlbvAAPa', NULL, NULL, NULL, 'user', NULL, '2025-01-13 01:55:01', '2025-01-13 01:55:01', 'premium', '09090909090'),
(16, 'althea Pachoo', 'altheajade_pacho@yahoo.com', NULL, '$2y$12$a4DoHwncZsduBGOE3kJtFuoaL6ofIx8SAwwfyiWiMau5w/OhvCYDC', NULL, NULL, NULL, 'user', NULL, '2025-01-13 05:34:11', '2025-01-13 05:34:11', 'regular', NULL),
(17, 'skypacho', 'skypacho@sky', NULL, '$2y$12$xpwI4.5hPF8v.tH.FVjeFu7/GwAJhF59jm59wurQ2L79niqWAhmFq', NULL, NULL, NULL, 'user', NULL, '2025-01-13 05:51:42', '2025-01-13 05:51:42', 'regular', NULL),
(18, 'papahapon', 'hapon@hapon', NULL, '$2y$12$FrnCN0mzndJBYFKQsdo5ouGUlM7twylpCHnpWd8Uq9rgjACeUUJa2', NULL, NULL, NULL, 'admin', NULL, '2025-01-13 05:59:18', '2025-01-22 09:12:03', 'regular', NULL),
(19, 'haha', 'haha@hahahaha', NULL, '$2y$12$HaNsqa/ywy7D3pY6shZqw.QMXUOykXU6nPaujticq/b3Lge2JuaoS', NULL, NULL, NULL, 'user', NULL, '2025-01-13 06:34:58', '2025-01-13 06:34:58', 'silver', '11111111111'),
(21, 'nyah&xevi', 'forever@eternity', NULL, '$2y$12$1M8yypJV3XET3XME75ADP.8eA79puA/BEV/hZQKFurnLWUNnV8bGW', NULL, NULL, NULL, 'user', NULL, '2025-01-13 10:53:25', '2025-01-13 10:53:25', 'premium', '123412414'),
(22, 'julien', 'julien@julien', NULL, '$2y$12$2al7zzTuncDWDYbmyYg6OO0lK0/k3P5tFqEutPAjkMApPLB490VmO', NULL, NULL, NULL, 'user', NULL, '2025-01-15 02:33:44', '2025-01-15 02:33:44', 'premium', '11111111'),
(23, 'jc', 'jc@jc', NULL, '$2y$12$2nZAv65IhpnU3Wrelarq1e.uw23XTk60DSnn3HdK/YHiNNJBorQGG', NULL, NULL, NULL, 'user', NULL, '2025-01-15 09:07:35', '2025-01-15 09:07:35', 'premium', '00000000000'),
(24, 'erik', 'erik@erik', NULL, '$2y$12$Q/.uTFLLC05S/B9Vl681iOFliT7WE7FBKCsCeLyyonc2cDFQa2Hk.', NULL, NULL, NULL, 'user', NULL, '2025-01-15 09:12:22', '2025-01-15 09:12:22', 'regular', '12341234123'),
(25, 'lester', 'lester@lester', NULL, '$2y$12$66taVieYvw5yDpXgSjc8SukHEcQNCLUBtWSm7tt5a0KsyHm2PF6VO', NULL, NULL, NULL, 'user', NULL, '2025-01-15 09:13:19', '2025-01-15 09:13:19', 'premium', '11111111111'),
(26, 'luffy', 'luffy@luffy', NULL, '$2y$12$LwtJuqZgO35qYpdWrRF1.e7ZLpY.x9q7n5AlS11LWPfzKG1Y/F7oa', NULL, NULL, NULL, 'admin', NULL, '2025-01-15 12:14:50', '2025-01-15 12:14:50', 'regular', NULL),
(27, 'earl', 'earlpacho@yahoo.com', NULL, '$2y$12$EPU6xyoHCQEs/JKQ1qcYAODBFm01c3Uo71FH2pheTBEgQD6t9j7PG', NULL, NULL, NULL, 'admin', NULL, '2025-01-16 01:34:02', '2025-01-16 01:34:02', 'regular', NULL),
(28, 'lawrence Pacho', 'pacho@pacho.com', NULL, '$2y$12$BuSZaZbIPlx22cdOGCliau.fMcB79KPcpyTXq3MpfmzVOh/xgHXAu', NULL, NULL, NULL, 'admin', NULL, '2025-01-16 01:35:53', '2025-01-16 01:35:53', 'regular', NULL),
(30, 'arlene', 'arlenepacho9@gmail.com', NULL, '$2y$12$inbx.8j04kOmiutMJ4WT7OjVaA9ySehmekw8QXG8PJjgrj8fyU9eO', NULL, NULL, NULL, 'admin', NULL, '2025-01-18 07:14:54', '2025-01-18 07:14:54', 'regular', NULL),
(31, 'aizhel', 'aizhel@aizhel', NULL, '$2y$12$F4XCbzjZ5gmOYW3zDLjowuBYEBf4JtmqZW4ha.pArXfahsg9FQyeW', NULL, NULL, NULL, 'admin', NULL, '2025-01-18 10:04:16', '2025-01-18 10:04:16', 'regular', NULL),
(33, 'TINA', 'TINA@MATT', NULL, '$2y$12$c6pV.wcurVG9ESKazTqOjeg.WrR5cW4E3riJJswahE1IJz478Gp.C', NULL, NULL, NULL, 'user', NULL, '2025-01-21 07:42:26', '2025-01-21 07:42:26', 'regular', '1111111111111'),
(35, 'legional', 'legion@legional', NULL, '$2y$12$7uydBh/.rmd54f9prZ3ez.QUSx9rFIs/eJ6RfXj1z2jSrFs1/Tb22', NULL, NULL, NULL, 'user', NULL, '2025-01-21 23:32:33', '2025-01-22 08:18:02', 'premium', '11111111'),
(36, 'eddybrook', 'eddyBrok@gmail.com', NULL, '$2y$12$totFFJsUVhZfDkF5YQuuVO.WF0jNnLxHtgzlVxQRnCz/GY7OypuKW', NULL, NULL, NULL, 'admin', NULL, '2025-01-22 08:41:52', '2025-01-22 08:42:40', 'regular', NULL),
(37, 'belo', 'belo@belo', NULL, '$2y$12$0XG8vxB8YGRo/MfjS0xore8bVCQlpE9QjTAzWjDCSTnHPcexA7gTG', NULL, NULL, NULL, 'user', NULL, '2025-01-22 21:14:10', '2025-01-22 21:14:10', 'regular', '111111111'),
(38, 'Epson', 'epson@epson', NULL, '$2y$12$1Qx3Hkjnw.1Jl3UbA11T5utgCDwOAQipRjQIq8iqZlYdXdhUXDMyq', NULL, NULL, NULL, 'user', NULL, '2025-01-22 22:23:01', '2025-01-22 22:23:01', 'regular', '1111111111'),
(39, 'ippo', 'ippo@ippo', NULL, '$2y$12$ay9ktRsJVpRmBkPl47c5Hu7GNYp6zYcTHFMEBHObCqAPC2I/kFw9m', NULL, NULL, NULL, 'user', NULL, '2025-01-22 23:03:10', '2025-01-22 23:03:10', 'regular', '1111111111'),
(40, 'VenumAndBrook', 'venum@venum', NULL, '$2y$12$GmcozP7jGrHQ26BPr4I20OxN/StarVosjlG/zL1Tg6k37KImKW6rm', NULL, NULL, NULL, 'user', NULL, '2025-01-22 23:36:38', '2025-01-22 23:36:38', 'regular', '1111111111'),
(41, 'presto Peanut', 'presto@presto', NULL, '$2y$12$vXLZnNbmS5yX7CHRWDZBkuyXgP3nQY3CJsrUKpZehXnUas4kHNlWO', NULL, NULL, NULL, 'admin', NULL, '2025-01-23 00:25:54', '2025-01-23 00:30:18', 'regular', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_book_id_foreign` (`book_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_histories_user_id_foreign` (`user_id`),
  ADD KEY `transaction_histories_book_id_foreign` (`book_id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_history_user_id_foreign` (`user_id`),
  ADD KEY `transaction_history_book_id_foreign` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD CONSTRAINT `transaction_histories_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD CONSTRAINT `transaction_history_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
