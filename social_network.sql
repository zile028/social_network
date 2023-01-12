-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 08:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Books'),
(2, 'Sport'),
(3, 'Movies'),
(4, 'Nature');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL,
  `public` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `image`, `category_id`, `user_id`, `created_at`, `update_at`, `public`) VALUES
(1, 'Privi post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut cum deserunt, dignissimos, doloremque eum eveniet in incidunt iste minus nam nobis officia qui quia sit veritatis voluptas voluptatibus! Ab aut dignissimos doloribus facilis molestias mollitia non numquam tenetur voluptatum. Architecto consequatur cum dignissimos est, incidunt, molestiae nulla obcaecati perferendis placeat quasi quidem quis quos reiciendis sit tempore tenetur, unde veniam vitae voluptas voluptatem. Adipisci, consectetur cum doloribus dolorum earum enim eos et eveniet exercitationem fugiat hic nam nobis non nulla quibusdam, recusandae rerum sit, voluptatibus. Aliquam asperiores aut delectus dolorem earum eligendi labore laudantium odit optio sint. Dolorem, excepturi.', '1673464616.jpg', 4, 1, '2023-01-11 19:16:56', NULL, 1),
(2, 'Drugi post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut cum deserunt, dignissimos, doloremque eum eveniet in incidunt iste minus nam nobis officia qui quia sit veritatis voluptas voluptatibus! Ab aut dignissimos doloribus facilis molestias mollitia non numquam tenetur voluptatum. Architecto consequatur cum dignissimos est, incidunt, molestiae nulla obcaecati perferendis placeat quasi quidem quis quos reiciendis sit tempore tenetur, unde veniam vitae voluptas voluptatem. Adipisci, consectetur cum doloribus dolorum earum enim eos et eveniet exercitationem fugiat hic nam nobis non nulla quibusdam, recusandae rerum sit, voluptatibus. Aliquam asperiores aut delectus dolorem earum eligendi labore laudantium odit optio sint. Dolorem, excepturi.', '1673464655.jpg', 2, 1, '2023-01-11 19:17:35', NULL, 1),
(3, 'Petrov', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut cum deserunt, dignissimos, doloremque eum eveniet in incidunt iste minus nam nobis officia qui quia sit veritatis voluptas voluptatibus! Ab aut dignissimos doloribus facilis molestias mollitia non numquam tenetur voluptatum. Architecto consequatur cum dignissimos est, incidunt, molestiae nulla obcaecati perferendis placeat quasi quidem quis quos reiciendis sit tempore tenetur, unde veniam vitae voluptas voluptatem. Adipisci, consectetur cum doloribus dolorum earum enim eos ', '1673551342.jpg', 2, 2, '2023-01-12 18:27:34', '2023-01-12 19:22:22', 1),
(4, 'Books', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut cum deserunt, dignissimos, doloremque eum eveniet in incidunt iste minus nam nobis officia qui quia sit veritatis voluptas voluptatibus! Ab aut dignissimos doloribus facilis molestias mollitia non numquam tenetur voluptatum. Architecto consequatur cum dignissimos est, incidunt, molestiae nulla obcaecati perferendis placeat quasi quidem quis quos reiciendis sit tempore tenetur, unde veniam vitae voluptas voluptatem. Adipisci, consectetur cum doloribus dolorum earum enim eos ', '1673551505.jpg', 1, 2, '2023-01-12 18:28:32', '2023-01-12 19:25:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `role`, `created_at`, `update_at`) VALUES
(1, 'Dejan', 'Zivkovic', 'dejan@gmail.com', '$2y$10$z7a0g4SuJ6FTNb/AuPyktulenjjyvLiKWQVcxBYJa7OtddiVXHM0y', 'male', 'admin', '2023-01-09 19:00:57', '2023-01-11 17:59:15'),
(2, 'Petar', 'Jovanovic', 'petar@gmail.com', '$2y$10$yLZvyRMHJbEecue0VQCp5.rrKI8amfPlmTau6s.1kk/6EJmGgQXvm', 'male', 'user', '2023-01-09 19:12:12', '2023-01-11 17:57:53'),
(3, 'Jovan', 'Savic', 'jovan@gmail.com', '$2y$10$yLZvyRMHJbEecue0VQCp5.rrKI8amfPlmTau6s.1kk/6EJmGgQXvm', 'male', 'user', '2023-01-09 19:25:54', '2023-01-11 17:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
