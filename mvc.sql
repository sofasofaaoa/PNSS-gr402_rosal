-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 04 2023 г., 15:59
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cabinets`
--

CREATE TABLE `cabinets` (
  `cabinet_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cabinets`
--

INSERT INTO `cabinets` (`cabinet_id`, `title`) VALUES
(8, 'УЗИ'),
(9, 'РЕНТГЕН'),
(10, 'ГИНЕКОЛОГ'),
(11, 'ПЕДИАТР'),
(12, 'СТОМАТОЛОГ'),
(13, 'МРТ'),
(14, 'ФЛЮОРОГРАФИЯ');

-- --------------------------------------------------------

--
-- Структура таблицы `diagnoses`
--

CREATE TABLE `diagnoses` (
  `diagnosis_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `diagnoses`
--

INSERT INTO `diagnoses` (`diagnosis_id`, `title`) VALUES
(18, '&lt;a&gt;ASFADFD&lt;/a&gt;'),
(15, 'asdf'),
(17, 'asdfsadfa'),
(14, 'zxc'),
(19, 'zxcxvcvcbc'),
(16, 'zxvxbdtb'),
(1, 'Ангина'),
(10, 'Диарея'),
(3, 'Невроз'),
(2, 'Опухоль'),
(4, 'Поликистоз'),
(5, 'Пульпит'),
(6, 'Трахеит'),
(11, 'Что-то'),
(12, 'Что=тотам'),
(7, 'Язва');

-- --------------------------------------------------------

--
-- Структура таблицы `job_title`
--

CREATE TABLE `job_title` (
  `job_title_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `job_title`
--

INSERT INTO `job_title` (`job_title_id`, `title`) VALUES
(1, 'Администратор'),
(2, 'Врач'),
(3, 'Работник регистрации');

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`patient_id`, `surname`, `name`, `patronymic`, `date_of_birth`) VALUES
(1, 'QWE', 'QWE', 'QWE', '2004-10-07'),
(2, 'QWE', 'QWE', 'QWE', '2004-10-07'),
(3, 'asd', 'asd', 'asd', '2023-04-04'),
(4, 'zxc', 'zxc', 'zxc', '2023-01-16'),
(5, 'zxc', 'zxc', 'zxc', '2023-01-16'),
(6, 'Иванов', 'Иван', 'Иванович', '2023-05-05');

-- --------------------------------------------------------

--
-- Структура таблицы `receptions`
--

CREATE TABLE `receptions` (
  `reception_id` int(11) NOT NULL,
  `patient_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `cabinet_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `diagnosis_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `receptions`
--

INSERT INTO `receptions` (`reception_id`, `patient_id`, `id`, `cabinet_id`, `date`, `time`, `diagnosis_id`) VALUES
(2, 1, 9, 10, '2023-04-03', '15:30:00', 1),
(3, 1, 8, 12, '2023-04-03', '15:30:00', 1),
(6, 2, 9, 12, '2023-04-02', '00:00:00', 2),
(7, 2, 9, 12, '2023-04-20', '14:42:00', 6),
(9, 2, 9, 12, '2023-03-08', '15:49:00', 5),
(11, 2, 9, 12, '2023-04-05', '13:50:00', 5),
(15, 6, 9, 11, '2023-04-04', '18:50:00', 1),
(16, 6, 9, 11, '2023-04-04', '18:50:00', 1),
(17, 1, 5, 8, '2023-04-05', '18:56:00', 2),
(18, 1, 5, 8, '2023-03-30', '19:00:00', 1),
(19, 1, 5, 8, '2023-03-30', '19:00:00', 1),
(20, 1, 5, 8, '2023-03-30', '19:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `job_title_id` int(11) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `surname`, `name`, `patronymic`, `sex`, `date_of_birth`, `job_title_id`, `specialization`) VALUES
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Робертус', 'Софья', 'Александровна', 'Ж', '2004-10-07', 1, 'Администратор'),
(8, 'hud', '8eaab8f57cf980e83393fe2b03efe0c2', 'Худобин', 'Дмитрий', 'Александрович', 'М', '1989-11-09', 3, ''),
(9, 'ivanov', '4dfe6e220d16e7b633cfdd92bcc8050b', 'Иванов', 'Иван', 'Иванович', 'М', '1965-11-05', 2, 'Акушер-гинеколог'),
(30, 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd', 'asd', 'Ж', '1970-01-01', 2, 'asd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cabinets`
--
ALTER TABLE `cabinets`
  ADD PRIMARY KEY (`cabinet_id`);

--
-- Индексы таблицы `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`diagnosis_id`),
  ADD UNIQUE KEY `title` (`title`) USING BTREE;

--
-- Индексы таблицы `job_title`
--
ALTER TABLE `job_title`
  ADD PRIMARY KEY (`job_title_id`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Индексы таблицы `receptions`
--
ALTER TABLE `receptions`
  ADD PRIMARY KEY (`reception_id`),
  ADD KEY `diagnosis_id` (`diagnosis_id`),
  ADD KEY `cabinet_id` (`cabinet_id`),
  ADD KEY `id` (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `job_title_id` (`job_title_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cabinets`
--
ALTER TABLE `cabinets`
  MODIFY `cabinet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `job_title`
--
ALTER TABLE `job_title`
  MODIFY `job_title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `receptions`
--
ALTER TABLE `receptions`
  MODIFY `reception_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `receptions`
--
ALTER TABLE `receptions`
  ADD CONSTRAINT `receptions_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `receptions_ibfk_2` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnoses` (`diagnosis_id`),
  ADD CONSTRAINT `receptions_ibfk_3` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `receptions_ibfk_4` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinets` (`cabinet_id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`job_title_id`) REFERENCES `job_title` (`job_title_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
