-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 7 月 28 日 18:44
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
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `task` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `incharge` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadline` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `prim` int(2) NOT NULL,
  `progress` int(2) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `task`, `incharge`, `deadline`, `note`, `prim`, `progress`, `indate`) VALUES
(1, 'メインページのコーディング', '田中', '2022-07-29', 'CSSは既存のものを使用', 1, 0, '2022-07-27 15:52:35'),
(2, 'モックアップ修正', '佐々木', '2022-08-03', '項目の追加', 0, 2, '2022-07-29 01:02:30'),
(3, '項目の確認', '太田', '2022-7-31', '確認後にチャットで連絡', 2, 1, '2022-07-29 01:06:31'),
(21, '問題点のまとめ', '田中', '2022-7-31', 'まとめたものはチャットで共有', 2, 2, '2022-07-29 03:36:21');

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
  `sort` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `mail`, `lpw`, `gender`, `depart`, `sort`) VALUES
(1, '田中', 'tanaka01', 'tanaka@tanaka.com', 'tanaka', 0, 'エンジニア', 0),
(2, '佐々木', 'test02', 'sasaki@sasaki.com', 'pw02', 1, 'デザイナー', 0),
(3, '中村', 'test01', 'mail@mail.com', 'tpw', 1, 'デザイナー', 0),
(5, '太田', 'ota', 'ota@ota.com', 'ota01', 0, '統括', 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
