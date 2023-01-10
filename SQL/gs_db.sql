-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 12 月 16 日 10:04
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL,
  `depart` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(1) NOT NULL,
  `col` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#ff0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `mail`, `lpw`, `gender`, `depart`, `sort`, `col`) VALUES
(1, '佐々木', 'test02', 'sasaki@sasaki.com', 'pw02', 1, 'アートディレクター', 0, '#00ff00'),
(2, '中村', 'test01', 'mail@mail.com', 'tpw', 1, 'デザイナー', 0, '#0000ff'),
(3, '太田', 'ota', 'ota@ota.com', 'ota01', 0, '統括', 1, '#ff0000'),
(4, '池永', 'ikenaga', 'email.com', 'ikenaga', 1, 'フォトグラファー', 0, '#00ffff'),
(5, '田中', 'tanaka', 'tanaka@tanaka.com', 'tanaka', 0, 'エンジニア', 0, '#ff00ff'),
(6, '後藤', 'goto', 'goto@goto.jp', 'goto', 0, 'ディレクター', 1, '#e8d502'),
(7, '橘', 'tachibana', 'tachibana@gmail.com', 'tachibana', 1, 'エンジニア', 0, '#ff147a');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
