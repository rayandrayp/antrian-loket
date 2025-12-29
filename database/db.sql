-- --------------------------------------------------------
-- Host:                         10.10.10.7
-- Server version:               10.3.39-MariaDB-0ubuntu0.20.04.2-log - Ubuntu 20.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table antrian.tbl_antrian_loket
CREATE TABLE IF NOT EXISTS `tbl_antrian_loket` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `no_antrian` smallint(6) NOT NULL,
  `id_loket` smallint(1) NOT NULL DEFAULT 0,
  `status` enum('2','1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12250 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table antrian.tbl_antrian_loket: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_antrian_loket` DISABLE KEYS */;
INSERT INTO `tbl_antrian_loket` (`id`, `tanggal`, `no_antrian`, `id_loket`, `status`, `updated_date`) VALUES
	(12247, '2025-12-24', 1, 1, '2', '2025-12-24 12:11:35'),
	(12248, '2025-12-24', 2, 1, '2', '2025-12-24 12:11:38'),
	(12249, '2025-12-24', 3, 1, '2', '2025-12-24 12:11:33');
/*!40000 ALTER TABLE `tbl_antrian_loket` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
