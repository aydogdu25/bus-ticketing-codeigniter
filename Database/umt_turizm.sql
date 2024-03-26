-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Mar 2024, 14:23:49
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `umt_turizm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `umt_biletler`
--

CREATE TABLE `umt_biletler` (
  `bilet_id` int(11) NOT NULL,
  `sefer_id` int(11) DEFAULT NULL,
  `uye_id` int(11) DEFAULT NULL,
  `pnr_kod` varchar(100) DEFAULT NULL,
  `koltuk_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `umt_biletler`
--

INSERT INTO `umt_biletler` (`bilet_id`, `sefer_id`, `uye_id`, `pnr_kod`, `koltuk_no`) VALUES
(77, 508, 2, '25ÖS20240326152659I25BSM2534', 7),
(78, 516, 2, '25ÖS20240326152852H25BSM2535', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `umt_mesajlar`
--

CREATE TABLE `umt_mesajlar` (
  `mesaj_id` int(11) NOT NULL,
  `kullanici_isim` varchar(250) NOT NULL,
  `kullanici_email` varchar(250) NOT NULL,
  `mesaj_tip` varchar(250) NOT NULL,
  `kullanici_mesaj` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `umt_mesajlar`
--

INSERT INTO `umt_mesajlar` (`mesaj_id`, `kullanici_isim`, `kullanici_email`, `mesaj_tip`, `kullanici_mesaj`) VALUES
(5, 'Saffet Buğra Akabalı', 'SafBugAka@gmail.com', 'Öneri', 'Bence sitenizin tema rengi sarı olmalıydı. İyi günler.\r\n'),
(6, 'Kadir Aydoğdu', 'gecebekcisi25@gmail.com', 'Şikayet', 'Yöneticiniz Oltan Bey çok yakışıklı. Onu çok beğeniyorum.'),
(8, 'sfdsf', 'kaydogdu4125@gmail.com', 'Şikayet', 'sadasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `umt_seferler`
--

CREATE TABLE `umt_seferler` (
  `sefer_id` int(11) NOT NULL,
  `kalkis_yeri` varchar(45) NOT NULL,
  `varis_yeri` varchar(45) DEFAULT NULL,
  `gidis_tarihi` datetime NOT NULL,
  `donus_tarihi` datetime NOT NULL,
  `sefer_tipi` varchar(20) NOT NULL,
  `koltuk_tipi` varchar(5) NOT NULL,
  `ucret` int(11) NOT NULL,
  `plaka` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `umt_seferler`
--

INSERT INTO `umt_seferler` (`sefer_id`, `kalkis_yeri`, `varis_yeri`, `gidis_tarihi`, `donus_tarihi`, `sefer_tipi`, `koltuk_tipi`, `ucret`, `plaka`) VALUES
(505, 'Ankara', 'İstanbul', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+2', 1000, '06BSM2534'),
(506, 'İzmir', 'İstanbul', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+2', 1000, '35BSM2534'),
(507, 'Antalya', 'İstanbul', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+1', 1000, '07BSM2534'),
(508, 'Erzurum', 'İstanbul', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+2', 1000, '25BSM2534'),
(509, 'İstanbul', 'Ankara', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+2', 1000, '34BSM2506'),
(510, 'İzmir', 'Ankara', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+1', 1000, '35BSM2506'),
(511, 'Antalya', 'Ankara', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+2', 1000, '07BSM2506'),
(512, 'Erzurum', 'Ankara', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+1', 1000, '25BSM2506'),
(513, 'İstanbul', 'İzmir', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+2', 1000, '34BSM2535'),
(514, 'Ankara', 'İzmir', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+1', 1000, '06BSM2535'),
(515, 'Antalya', 'İzmir', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+1', 1000, '07BSM2535'),
(516, 'Erzurum', 'İzmir', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+1', 1000, '25BSM2535'),
(517, 'İstanbul', 'Antalya', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+2', 1000, '34BSM2507'),
(518, 'Ankara', 'Antalya', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+2', 1000, '06BSM2507'),
(519, 'İzmir', 'Antalya', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+1', 1000, '35BSM2507'),
(520, 'Erzurum', 'Antalya', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+1', 1000, '25BSM2507'),
(521, 'İstanbul', 'Erzurum', '2024-03-19 22:00:00', '0000-00-00 00:00:00', 'Gidiş', '2+1', 1000, '34BSM2525'),
(522, 'Ankara', 'Erzurum', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+2', 1000, '06BSM2525'),
(523, 'İzmir', 'Erzurum', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+1', 1000, '35BSM2525'),
(524, 'Antalya', 'Erzurum', '2024-03-19 22:00:00', '2024-03-20 22:00:00', 'Gidiş-Dönüş', '2+1', 1000, '07BSM2525');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `umt_uyeler`
--

CREATE TABLE `umt_uyeler` (
  `uye_id` int(11) NOT NULL,
  `tc_pas` bigint(20) NOT NULL,
  `ad` varchar(45) NOT NULL,
  `soyad` varchar(45) NOT NULL,
  `kullanici` varchar(45) NOT NULL,
  `sifre` varchar(45) NOT NULL,
  `cins` varchar(6) NOT NULL,
  `dogum` date NOT NULL,
  `e_posta` varchar(30) NOT NULL,
  `bakiye` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `umt_uyeler`
--

INSERT INTO `umt_uyeler` (`uye_id`, `tc_pas`, `ad`, `soyad`, `kullanici`, `sifre`, `cins`, `dogum`, `e_posta`, `bakiye`) VALUES
(2, 258, 'kadir', 'aydoğdu', 'kadir1', '1234', 'erkek', '2024-03-17', 'kadir@com', 0),
(3, 213, 'oltan', 'asd', 'oltan', '1234', 'erkek', '2024-03-19', 'kadir@com', 0),
(4, 258, 'saffet', 'f', 'saffet', '1234', 'erkek', '2024-03-26', 'kadir@hotmail.com', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `umt_biletler`
--
ALTER TABLE `umt_biletler`
  ADD PRIMARY KEY (`bilet_id`),
  ADD KEY `sefer_id` (`sefer_id`),
  ADD KEY `uye_id` (`uye_id`);

--
-- Tablo için indeksler `umt_mesajlar`
--
ALTER TABLE `umt_mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `umt_seferler`
--
ALTER TABLE `umt_seferler`
  ADD PRIMARY KEY (`sefer_id`);

--
-- Tablo için indeksler `umt_uyeler`
--
ALTER TABLE `umt_uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `umt_biletler`
--
ALTER TABLE `umt_biletler`
  MODIFY `bilet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Tablo için AUTO_INCREMENT değeri `umt_mesajlar`
--
ALTER TABLE `umt_mesajlar`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `umt_seferler`
--
ALTER TABLE `umt_seferler`
  MODIFY `sefer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;

--
-- Tablo için AUTO_INCREMENT değeri `umt_uyeler`
--
ALTER TABLE `umt_uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `umt_biletler`
--
ALTER TABLE `umt_biletler`
  ADD CONSTRAINT `umt_biletler_ibfk_1` FOREIGN KEY (`sefer_id`) REFERENCES `umt_seferler` (`sefer_id`),
  ADD CONSTRAINT `umt_biletler_ibfk_2` FOREIGN KEY (`uye_id`) REFERENCES `umt_uyeler` (`uye_id`);

DELIMITER $$
--
-- Olaylar
--
CREATE DEFINER=`root`@`localhost` EVENT `seferleri sil` ON SCHEDULE EVERY 8 YEAR STARTS '2024-03-18 18:01:00' ON COMPLETION PRESERVE ENABLE DO DELETE FROM umt_seferler
WHERE DATE(gidis_tarihi) < CURDATE()$$

CREATE DEFINER=`root`@`localhost` EVENT `sefer ekle` ON SCHEDULE EVERY 8 YEAR STARTS '2024-03-19 22:35:00' ON COMPLETION PRESERVE ENABLE DO INSERT INTO umt_seferler (kalkis_yeri, varis_yeri, plaka, gidis_tarihi, donus_tarihi, koltuk_tipi, ucret)
SELECT 
    kalkis.iller AS kalkis_yeri,
    varis.iller AS varis_yeri,
    CONCAT(
        CASE kalkis.iller
            WHEN 'İstanbul' THEN '34'
            WHEN 'Ankara' THEN '06'
            WHEN 'İzmir' THEN '35'
            WHEN 'Antalya' THEN '07'
            WHEN 'Erzurum' THEN '25'
        END,
        'BSM25',
        CASE varis.iller
            WHEN 'İstanbul' THEN '34'
            WHEN 'Ankara' THEN '06'
            WHEN 'İzmir' THEN '35'
            WHEN 'Antalya' THEN '07'
            WHEN 'Erzurum' THEN '25'
        END
    ) AS plaka,
    CONCAT(DATE_FORMAT(NOW(), '%Y-%m-%d '), DATE_FORMAT(NOW(), '%H'), ':00:00') AS gidis_tarihi,
    CASE 
        WHEN RAND() < 0.5 THEN DATE_ADD(CONCAT(DATE_FORMAT(NOW(), '%Y-%m-%d '), DATE_FORMAT(NOW(), '%H'), ':00:00'), INTERVAL 1 DAY)
        ELSE NULL
    END AS donus_tarihi,
    CASE 
        WHEN RAND() < 0.5 THEN '2+1'
        ELSE '2+2'
    END AS koltuk_tipi,
    1000 AS ucret
FROM 
    (SELECT 'İstanbul' AS iller UNION SELECT 'Ankara' UNION SELECT 'İzmir' UNION SELECT 'Antalya' UNION SELECT 'Erzurum') AS kalkis,
    (SELECT 'İstanbul' AS iller UNION SELECT 'Ankara' UNION SELECT 'İzmir' UNION SELECT 'Antalya' UNION SELECT 'Erzurum') AS varis
WHERE 
    kalkis.iller != varis.iller$$

CREATE DEFINER=`root`@`localhost` EVENT `sefer guncelle` ON SCHEDULE EVERY 8 YEAR STARTS '2024-03-19 22:36:00' ON COMPLETION PRESERVE ENABLE DO UPDATE umt_seferler
SET sefer_tipi = 'Gidiş'
WHERE donus_tarihi = '0000-00-00 00:00:00'$$

CREATE DEFINER=`root`@`localhost` EVENT `sefer guncelle2` ON SCHEDULE EVERY 8 YEAR STARTS '2024-03-19 22:36:00' ON COMPLETION PRESERVE ENABLE DO UPDATE umt_seferler
SET sefer_tipi = 'Gidiş-Dönüş'
WHERE donus_tarihi != '0000-00-00 00:00:00'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
