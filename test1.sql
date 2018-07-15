-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 15 2018 г., 18:15
-- Версия сервера: 5.5.56-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `admin_id` int(8) NOT NULL,
  `admin_name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `admin_password` varchar(55) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_cat` int(11) unsigned NOT NULL,
  `name_cat` varchar(255) NOT NULL,
  `description_cat` text NOT NULL,
  `status_cat` tinyint(4) NOT NULL,
  `date_cat` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_cat`, `name_cat`, `description_cat`, `status_cat`, `date_cat`) VALUES
(2, 'Nature', 'About nature', 1, '2018-07-06 09:04:46'),
(9, 'Sport', 'About sport', 1, '2018-05-02 05:12:10'),
(10, 'Culture', 'About culture', 1, '2018-05-03 11:27:39'),
(11, 'Analytics', 'Only for authorized users', 1, '0000-00-00 00:00:00'),
(20, 'Political', 'About political news', 0, '2018-07-13 08:41:19');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comm` int(11) NOT NULL,
  `news_id_comm` int(11) NOT NULL,
  `user_id_comm` int(11) NOT NULL,
  `message_comm` text NOT NULL,
  `rating_comm` int(11) NOT NULL,
  `status_comm` int(11) NOT NULL,
  `date_comm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id_comm`, `news_id_comm`, `user_id_comm`, `message_comm`, `rating_comm`, `status_comm`, `date_comm`) VALUES
(2, 7, 1, 'Vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate.', 6, 1, '2018-07-14 09:12:48'),
(3, 7, 1, ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 5, 0, '2018-06-21 07:36:24'),
(9, 4, 1, 'Hello! Cool!', 1, 1, '2018-06-24 13:07:45'),
(10, 4, 1, 'Hi! ', 0, 1, '2018-07-06 09:16:31'),
(11, 5, 1, 'Greate!', 2, 1, '2018-07-09 19:19:12'),
(12, 5, 22, 'Very nice news!!!', 3, 1, '2018-07-09 19:21:10'),
(13, 40, 8, 'Nice news)', 1, 1, '2018-07-10 19:37:58'),
(15, 81, 7, 'Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.', 2, 1, '2018-07-15 17:09:32');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `parent` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `count_view` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `parent`, `image`, `status`, `count_view`, `date`) VALUES
(4, 'Excepteur', 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '10', 'images/img29.jpg', 1, 50, '2018-07-15 04:53:17'),
(5, 'Great pleasure', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. ', '9', 'images/img27.jpg', 1, 191, '2018-07-15 05:01:58'),
(6, 'Quisque rutrum', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '11', 'images/img4.jpg', 1, 29, '2018-05-02 05:54:54'),
(7, 'Nullam quis ante', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '11', 'images/img5.jpg', 1, 343, '2018-05-03 09:02:35'),
(8, 'Ut enim ad min', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '9', 'images/img2.jpg', 1, 14, '2018-05-03 09:04:15'),
(10, 'Excepturi sint occaecati', 'Excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '9', 'images/img6.jpg', 1, 5, '2018-05-03 09:06:50'),
(26, 'Blame belongs', 'Moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.', '10', 'images/img7.jpg', 1, 14, '2018-05-03 10:16:13'),
(33, 'Shrinking from', 'Which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.', '10', 'images/img14.png', 0, 6, '2018-05-03 07:10:10'),
(34, 'Commodo consequat', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 	', '11', 'images/img9.jpg', 1, 4, '2018-05-09 00:00:00'),
(35, 'Principle of selection', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', '11', 'images/img10.jpg', 1, 0, '2018-05-09 00:00:00'),
(36, 'Worse pains', 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', '11', 'images/img11.jpg', 1, 0, '2018-05-09 00:00:00'),
(37, 'Molestiae consequatur', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporivoluptas nulls suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo a pariatur?', '11', 'images/img12.jpg', 1, 2, '2018-05-09 00:00:00'),
(38, 'Laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '9', 'images/img13.jpg', 1, 3, '2018-05-11 03:09:59'),
(39, 'Asperiores', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '11', 'images/img15.jpg', 1, 2, '2018-05-11 03:11:32'),
(40, 'Nature News', 'About nature\r\nVoluptua copiosae reprimique sea ut, tamquam laoreet per ea. In eos inermis atomorum, signiferumque conclusionemque ea pri. Est no dicant disputando appellantur. Ne purto nibh accusata his, graece possim voluptatum cu qui.', '2', 'images/img13.jpg ', 1, 49, '2018-07-06 09:11:01'),
(79, 'Ad mollis legimus ', 'Ad mollis legimus sadipscing mei. Id eleifend dissentiunt sit. Ei dolores torquatos scribentur mei, sed essent euismod phaedrum ei. Nostrud intellegat no eos, vix volumus delicata ei, ubique expetenda suavitate ea eum.', '2', 'images/img26.jpg', 1, 1, '2018-07-14 08:29:26'),
(80, 'Nam possit virtute eripuit ', 'Ea cum mundi cetero accusamus, ea pri ignota semper scripserit. Per in iusto cetero delenit. Vim ut possim patrioque, meliore menandri no pro. Nam quem facer laboramus in, sea no ridens mnesarchum instructior. Mundi consulatu hendrerit ne mei. Nam possit virtute eripuit in. Liber latine utroque te eum.', '2', 'images/img28.jpg', 1, 2, '2018-07-14 08:30:35'),
(81, 'Cras dapibus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.', '2', 'images/img16.jpg', 1, 11, '2018-07-15 05:05:00');

-- --------------------------------------------------------

--
-- Структура таблицы `registered_users`
--

CREATE TABLE IF NOT EXISTS `registered_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(11) NOT NULL,
  `first_name` varchar(11) NOT NULL,
  `last_name` varchar(11) NOT NULL,
  `user_password` varchar(11) NOT NULL,
  `user_email` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registered_users`
--

INSERT INTO `registered_users` (`user_id`, `user_name`, `first_name`, `last_name`, `user_password`, `user_email`) VALUES
(1, 'makmarine1', 'Maryna ', 'Makarchuk', '12345', 'nmnb@jhl.co'),
(7, 'user', 'First Name', 'Last Name	', '1234', 'user@1234.c'),
(8, 'Test', 'Test name', 'Test name', 'test', 'test@test.c'),
(27, 'Boby', 'Bob', 'Bobby', '1234567', 'bob@jhl.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`) USING BTREE;

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `news_id` (`news_id_comm`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Индексы таблицы `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT для таблицы `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
