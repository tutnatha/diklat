-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: playground
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `badroom`
--

DROP TABLE IF EXISTS `badroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `badroom` (
  `no` int(5) NOT NULL,
  `no_kamar` varchar(5) NOT NULL,
  `reg_no` varchar(10) NOT NULL,
  `is_used` char(1) DEFAULT 'N',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badroom`
--

LOCK TABLES `badroom` WRITE;
/*!40000 ALTER TABLE `badroom` DISABLE KEYS */;
INSERT INTO `badroom` VALUES (1,'314','314-1','N',NULL,NULL),(2,'314','314-2','N',NULL,NULL),(3,'318','318-3','N',NULL,NULL),(4,'320','320-1','N',NULL,NULL),(5,'320','320-2','N',NULL,NULL),(6,'324','324-1','N',NULL,NULL),(7,'316','316-1','N',NULL,NULL),(8,'316','316-2','N',NULL,NULL);
/*!40000 ALTER TABLE `badroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `topic_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'kursus satu','keterangan...','nomor topik'),(2,'kursus dua','keterangan...dua','nomor topik 2'),(3,'kursus tiga','keterangan...tiga','nomor topik 3');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daftarhunian_dtl`
--

DROP TABLE IF EXISTS `daftarhunian_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftarhunian_dtl` (
  `no_trx` int(9) NOT NULL,
  `seq_no` int(9) NOT NULL DEFAULT '0',
  `no_kamar` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_trx`,`no_kamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftarhunian_dtl`
--

LOCK TABLES `daftarhunian_dtl` WRITE;
/*!40000 ALTER TABLE `daftarhunian_dtl` DISABLE KEYS */;
INSERT INTO `daftarhunian_dtl` VALUES (1,1,314),(1,2,316);
/*!40000 ALTER TABLE `daftarhunian_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daftarhunian_hdr`
--

DROP TABLE IF EXISTS `daftarhunian_hdr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftarhunian_hdr` (
  `no_trx` int(9) NOT NULL AUTO_INCREMENT,
  `penyelenggara` varchar(10) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `jml_peserta` int(9) DEFAULT NULL,
  `sudah_selesai` char(1) DEFAULT 'N',
  PRIMARY KEY (`no_trx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftarhunian_hdr`
--

LOCK TABLES `daftarhunian_hdr` WRITE;
/*!40000 ALTER TABLE `daftarhunian_hdr` DISABLE KEYS */;
INSERT INTO `daftarhunian_hdr` VALUES (1,'Umum',NULL,NULL,100,'N'),(2,'Dinas Pend',NULL,NULL,100,'N');
/*!40000 ALTER TABLE `daftarhunian_hdr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daftarhunianbad`
--

DROP TABLE IF EXISTS `daftarhunianbad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftarhunianbad` (
  `no_trx` int(9) NOT NULL,
  `seq_no` int(9) NOT NULL,
  `no_kamar` int(5) NOT NULL,
  `nip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftarhunianbad`
--

LOCK TABLES `daftarhunianbad` WRITE;
/*!40000 ALTER TABLE `daftarhunianbad` DISABLE KEYS */;
INSERT INTO `daftarhunianbad` VALUES (1,1,314,'1034567892'),(1,1,314,'1234567890'),(1,1,316,'1024567893'),(1,2,316,'1034567892');
/*!40000 ALTER TABLE `daftarhunianbad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kamar`
--

DROP TABLE IF EXISTS `kamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kamar` (
  `no` varchar(5) NOT NULL,
  `lantai` int(5) NOT NULL,
  `jml_tt` int(5) NOT NULL,
  `url_picture` varchar(255) DEFAULT NULL,
  `satuan_tarif` varchar(1) DEFAULT NULL,
  `tarif` decimal(12,0) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kamar`
--

LOCK TABLES `kamar` WRITE;
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
INSERT INTO `kamar` VALUES ('244',2,2,'www.lpmp-prov-bali.com',NULL,NULL),('264',2,2,'www.lpmp-prov-bali.com',NULL,NULL),('313',2,2,NULL,NULL,NULL),('314',2,2,NULL,NULL,NULL),('315',2,2,NULL,NULL,NULL),('316',2,2,NULL,NULL,NULL),('317',2,2,NULL,NULL,NULL),('318',2,2,NULL,NULL,NULL),('319',2,2,NULL,NULL,NULL),('320',2,2,NULL,NULL,NULL),('321',2,2,NULL,NULL,NULL),('322',2,2,NULL,NULL,NULL),('323',2,2,NULL,NULL,NULL),('xc60',6,10,'www.xc60.com/bali',NULL,NULL),('xc90',6,10,'www.xc90.com/bali',NULL,NULL);
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan` (
  `kode` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(45) NOT NULL,
  `keterangan` varchar(90) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
INSERT INTO `kegiatan` VALUES (1,'Pelatihan Quality Kontrol Diknas','*','http://stacktips.com/wp-content/uploads/2017/06/GCeasy-and-FastThread-375x300.png'),(2,'Pelatihan Trainer Parenting','*','http://stacktips.com/wp-content/uploads/2016/08/Download-Smart-Dashboard-Extras-Wordpress-Plugin-145x100.png'),(3,'Pelatihan Simulasi Alat2 Pendidikan','*','http://stacktips.com/wp-content/uploads/2016/08/Smart-Dashboard-Admin-Settings-145x100.png'),(4,'Pelatihan Antisipasi Bencana Pendidikan','*','http://stacktips.com/wp-content/uploads/2016/08/Smart-Dashboard-Customizations-145x100.png'),(5,'Seminar Terpadu Kemajuan Pendidikan','*','http://stacktips.com/wp-content/uploads/2016/08/Smart-Dashboard-Extras-Wordpress-Plugin.jpeg');
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kenaikan_gaji_berkala`
--

DROP TABLE IF EXISTS `kenaikan_gaji_berkala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kenaikan_gaji_berkala` (
  `thn` int(4) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `nip` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`thn`,`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kenaikan_gaji_berkala`
--

LOCK TABLES `kenaikan_gaji_berkala` WRITE;
/*!40000 ALTER TABLE `kenaikan_gaji_berkala` DISABLE KEYS */;
/*!40000 ALTER TABLE `kenaikan_gaji_berkala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kenaikan_pangkat`
--

DROP TABLE IF EXISTS `kenaikan_pangkat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kenaikan_pangkat` (
  `nip` varchar(30) NOT NULL,
  `thn` int(4) NOT NULL DEFAULT '0',
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nip`,`thn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kenaikan_pangkat`
--

LOCK TABLES `kenaikan_pangkat` WRITE;
/*!40000 ALTER TABLE `kenaikan_pangkat` DISABLE KEYS */;
/*!40000 ALTER TABLE `kenaikan_pangkat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi_surat`
--

DROP TABLE IF EXISTS `lokasi_surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasi_surat` (
  `kode_lokasi` varchar(5) NOT NULL,
  `nama_lokasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi_surat`
--

LOCK TABLES `lokasi_surat` WRITE;
/*!40000 ALTER TABLE `lokasi_surat` DISABLE KEYS */;
INSERT INTO `lokasi_surat` VALUES ('Dps','Denpasar');
/*!40000 ALTER TABLE `lokasi_surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi_tujuan`
--

DROP TABLE IF EXISTS `lokasi_tujuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasi_tujuan` (
  `kode` varchar(20) NOT NULL,
  `nama_lokasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi_tujuan`
--

LOCK TABLES `lokasi_tujuan` WRITE;
/*!40000 ALTER TABLE `lokasi_tujuan` DISABLE KEYS */;
INSERT INTO `lokasi_tujuan` VALUES ('SDN1GYR-GYR','SD N 1 GIANYAR'),('SDN1PDKGD-TBN','SD N 1 PANDEK GDE TBN'),('SDN3BRN-GYR','SD N 3 BURUAN GIANYAR'),('SDN4MNKY-GYR','SD N 4 MANUKAYA GIANYAR');
/*!40000 ALTER TABLE `lokasi_tujuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(90) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `golongan_ruang` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pangkat_tmt` date NOT NULL,
  `thn_mkg` int(4) NOT NULL,
  `bln_mkg` int(2) NOT NULL,
  `thn_gol_gaji` int(4) NOT NULL,
  `thn_seluruh` int(4) NOT NULL,
  `bln_seluruh` int(2) NOT NULL,
  `tmt_pangkat_pertama` date NOT NULL,
  `gol_pangkat_pertama` varchar(10) NOT NULL,
  `thn_pangkat_pertama` int(5) NOT NULL,
  `bln_pangkat_pertama` int(2) NOT NULL,
  `thn_pensiun` int(4) NOT NULL,
  `jenjang_pendidikan` varchar(50) NOT NULL,
  `jurusan_pendidikan` varchar(50) NOT NULL,
  `bln_gol_gaji` int(2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('19580611 198203 1 014','Drs. Pande Putu Karyana, M.Pd','Gianyar','1958-06-11','Pembina Utama Muda','IV b','Widyaiswara Madya','2012-04-01',28,1,33,38,6,'1982-03-01','II.b',3,0,2018,'S2','Pendidikan Dasar',6,NULL),('19620824 198304 2 013','Ni Wayan Murki, S.Pd., M.M','Badung','1962-08-24','Pembina Utama Muda','IV c','Widyaiswara Madya','2016-04-01',30,0,31,34,5,'1983-04-01','II.a',0,0,2022,'S2','Manajamen Sumber Daya Manusia',5,NULL),('19700628 199702 2 003','Dr. Ni Made Suciani, M.Pd.','Denpasar','1970-06-28','Pembina Utama Muda','IV c','Widyaiswara Madya','2015-10-01',18,8,20,20,7,'1997-02-01','III.a',0,0,2030,'S3','Kajian Budaya',0,NULL),('19710521 199702 1 004','Dr. I Wayan Surata, S.Pd., M.Pd.','Tabanan','1971-05-21','Pembina Utama Muda','IV c','Widyaiswara Madya','2016-04-01',19,2,20,20,7,'1997-02-01','III.a',0,0,2031,'S3','Penelitian dan Evaluasi Pendidikan',7,NULL),('19741225 200312 1 004','I Made Alit Dwitama, ST., M.Pd.','Denpasar','1974-12-25','Penata Tk.I','III d','Kasi SI','2016-04-01',12,4,13,9,13,'0000-00-00','2003-01-12',0,0,0,'S2','Magister Pendidikan',9,'');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_tugas`
--

DROP TABLE IF EXISTS `surat_tugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surat_tugas` (
  `nomor_surat` varchar(30) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `nip_pemberi_tugas` varchar(20) NOT NULL,
  `txt_hdr` varchar(255) DEFAULT NULL,
  `txt_penutup` varchar(255) DEFAULT NULL,
  `url_logo_hdr1` varchar(255) DEFAULT NULL,
  `url_logo_hdr2` varchar(255) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_location` varchar(50) DEFAULT NULL,
  `template_model` int(1) NOT NULL,
  PRIMARY KEY (`nomor_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_tugas`
--

LOCK TABLES `surat_tugas` WRITE;
/*!40000 ALTER TABLE `surat_tugas` DISABLE KEYS */;
INSERT INTO `surat_tugas` VALUES ('832/D7.16/KP/2017','Untuk memantau kegiatan Pendampingan SPMI Sekolah Model, pada tgl dan tempat sbb:','197412252003121004','Yg bertt dibawah ini memberikan tugas kpd :','Demikian surat tugas ini dibuat utk dilaksanakan dgn penuh tanggung jawab.','','','2017-08-28','Dps',1),('838/D7.16/KP/2017','Untuk memantau kegiatan Pendampingan Sistim Penjaminan Mutu Internal (SMPI) Sekolah Model. Seluruh biaya perjalanan dinas ini ditanggung sepenuhnya melalui DIPA LPMP Bali. Demikian surat tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.','197412252003121004','Yang bertanda tangan di bawah ini memberikan tugas kepada :','Demikian surat tugas ini dibuat untuk dilaksanakan dengan penuh tanggung jawab.',NULL,NULL,'2017-08-30','Dps',0);
/*!40000 ALTER TABLE `surat_tugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_tugas_dtl`
--

DROP TABLE IF EXISTS `surat_tugas_dtl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surat_tugas_dtl` (
  `nomor_surat` varchar(30) NOT NULL,
  `nomor_urut` int(2) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tujuan_sekolah` varchar(30) NOT NULL,
  `tgl_pemantauan` date NOT NULL,
  `is_valid` varchar(1) NOT NULL,
  PRIMARY KEY (`nomor_surat`,`nip`,`tgl_pemantauan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_tugas_dtl`
--

LOCK TABLES `surat_tugas_dtl` WRITE;
/*!40000 ALTER TABLE `surat_tugas_dtl` DISABLE KEYS */;
INSERT INTO `surat_tugas_dtl` VALUES ('832/D7.16/KP/2017',1,'19580611 198203 1 014','SDN1GYR-GYR','2017-12-30','Y');
/*!40000 ALTER TABLE `surat_tugas_dtl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('mukesh','$2a$10$N0eqNiuikWCy9ETQ1rdau.XEELcyEO7kukkfoiNISk/9F7gw6eB0W','Mukesh Sharma','ROLE_ADMIN','India',1),('tarun','$2a$10$QifQnP.XqXDW0Lc4hSqEg.GhTqZHoN2Y52/hoWr4I5ePxK7D2Pi8q','Tarun Singh','ROLE_USER','India',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-02 14:39:16
