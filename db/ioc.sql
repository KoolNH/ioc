-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2023 lúc 03:56 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ioc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url_video_intro` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `short_description`, `description`, `image`, `url_video_intro`, `updated_at`, `user_id`) VALUES
(1, 'The Complete Histudy 2023: From Zero to Expert!', 'Are you new to PHP or need a refresher? Then this course will help you get all the fundamentals of Procedural PHP', 'Are you new to PHP or need a refresher? Then this course will help you get all the fundamentals of Procedural PHP, Object Oriented PHP, MYSQLi and ending the course by building a CMS system similar to WordPress, Joomla or Drupal. Knowing PHP has allowed m', 'https://rainbowit.net/html/histudy/assets/images/course/course-01.jpg', 'https://www.youtube.com/watch?v=nA1Aqp0sPQo', '2023-10-29 09:45:17', 1),
(2, 'course 2', '', 'asdasdsadasdsad', 'https://rainbowit.net/html/histudy/assets/images/course/course-01.jpg', 'https://www.youtube.com/watch?v=nA1Aqp0sPQo', '2023-10-24 17:09:30', 1),
(3, 'course 3', '', 'asdasdsadasdsad123', 'https://rainbowit.net/html/histudy/assets/images/course/course-01.jpg', '', '2023-10-24 17:09:32', 1),
(4, 'course 4', '', 'asdasdsadasdsad123', 'https://rainbowit.net/html/histudy/assets/images/course/course-01.jpg', '', '2023-10-24 17:09:35', 1),
(5, 'course 5', '', 'asdasdsadasdsad123', 'https://rainbowit.net/html/histudy/assets/images/course/course-01.jpg', '', '2023-10-24 17:09:38', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`id`, `name`, `course_id`) VALUES
(1, 'Topic 1', 2),
(2, 'Topic 2', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` enum('admin','instructor','learner','') DEFAULT 'learner',
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `avatar`, `phone`, `email`, `description`, `registered_at`) VALUES
(1, 'admin', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Jack', 'https://rainbowit.net/html/histudy/assets/images/course/course-01.jpg', '096152341023', 'kool22@gmail.com', '1sdassd123e12sad', '2023-10-24 13:54:08'),
(2, 'learner', 'learner', 'b879c6e092ce6406eb1f806bf3757e49981974a7', 'Kool', 'https://rainbowit.net/html/histudy/assets/images/course/course-01.jpg', '0944602000', '', '', '2023-10-24 13:54:08'),
(4, 'instructor', 'instructor', '0e3bbd26f46012ccec4776d171f314a00c022d98', 'Denis', 'https://media.vov.vn/sites/default/files/styles/large/public/2023-07/yoona-nang-nguc.png.jpg', '564655465', '', '', '2023-10-24 13:54:08'),
(5, 'learner', 'dennis', 'b879c6e092ce6406eb1f806bf3757e49981974a7', 'Dennis', 'https://rainbowit.net/html/histudy/assets/images/course/course-01.jpg', '+8463654246', '', '', '2023-10-24 13:54:08'),
(6, 'instructor', 'kool', '7ab515d12bd2cf431745511ac4ee13fed15ab578', 'Kool', 'https://static1.thegamerimages.com/wordpress/wp-content/uploads/2022/10/Overwatch-2-Genji.jpg', '6325498', '', '', '2023-10-24 13:54:08'),
(21, 'learner', 'kool2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '0961688824', '', '', '2023-10-24 13:54:08'),
(23, 'learner', '1234655', 'a9993e364706816aba3e25717850c26c9cd0d89d', '', '', '1256324102', 'asdsad@gmail.com', '', '2023-10-24 14:04:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`id`, `title`, `url`, `topic_id`) VALUES
(1, 'video 1 ', 'abc', 1),
(2, 'video 2', '123asdc', 1),
(3, 'video 1', 'url', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
