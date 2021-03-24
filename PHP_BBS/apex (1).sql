-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-24 14:02:16
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `apex`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `apex_table`
--

CREATE TABLE `apex_table` (
  `id` int(12) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `os` text COLLATE utf8_unicode_ci NOT NULL,
  `rank` text COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `apex_table`
--

INSERT INTO `apex_table` (`id`, `name`, `os`, `rank`, `naiyou`, `indate`) VALUES
(7, 'あ', 'PC', 'ブロンズ', 'あ', '2021-03-21 21:16:09'),
(9, 'あ', 'PS4', 'ブロンズ', 'あ', '2021-03-21 21:16:16'),
(13, 'あ', 'Switch', 'マスター', 'あ', '2021-03-21 21:16:32'),
(19, '田中太郎', 'PS4', 'マスター', 'マスターですこんばんは', '2021-03-21 22:52:13'),
(24, 'あああああ', 'Xbox', 'プラチナ', 'ああああ', '2021-03-23 21:42:04'),
(25, 'hallo.1234', 'PS4', 'ゴールド', 'GOLDですが一緒にランク回してくれる人募集します', '2021-03-23 21:44:17'),
(26, 'あ', 'PC', 'ゴールド', 'あ', '2021-03-23 22:41:25'),
(27, 'important.0002', 'PS4', 'プラチナ', 'あいうえお\r\nかきくけこ\r\nさしすせそ', '2021-03-24 19:37:40'),
(28, 'オクタンです', 'Xbox', 'ダイヤモンド', 'ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ', '2021-03-24 19:54:38');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `apex_table`
--
ALTER TABLE `apex_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `apex_table`
--
ALTER TABLE `apex_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
