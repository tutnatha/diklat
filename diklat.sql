/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


CREATE DATABASE `diklat` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `diklat`;
CREATE TABLE `tb_daftarnarasumber` (
  `NIP` varchar(50) NOT NULL DEFAULT '',
  `Nama` varchar(255) DEFAULT NULL,
  `TempatLahir` varchar(255) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `NomorHP` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `JenisKelamin` varchar(20) DEFAULT NULL,
  `PendidikanTerakhir` varchar(20) DEFAULT NULL,
  `NPWP` varchar(255) DEFAULT NULL,
  `NamaInstansi` varchar(255) DEFAULT NULL,
  `AlamatInstansi` varchar(255) DEFAULT NULL,
  `Provinsi` varchar(255) DEFAULT NULL,
  `Kabupaten` varchar(255) DEFAULT NULL,
  `NoTelp` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(255) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_daftarnarasumber` VALUES ('123456','Made Warsa Kumara','Tabanan','0000-00-00','12324223','','Laki laki','','','','','','','','','');
CREATE TABLE `tb_diklat` (
  `UnitKerja` varchar(20) NOT NULL DEFAULT '',
  `KodeDiklat` varchar(20) NOT NULL DEFAULT '',
  `NamaDiklat` varchar(255) DEFAULT NULL,
  `Jenis` varchar(20) DEFAULT NULL,
  `DariTanggal` date DEFAULT NULL,
  `SampaiTanggal` date DEFAULT NULL,
  `JmlPeserta` smallint(6) DEFAULT NULL,
  `Tempat` varchar(255) DEFAULT NULL,
  `FasilitasLPMP` varchar(10) DEFAULT NULL,
  `ApprKabagUmum` varchar(10) DEFAULT NULL,
  `Catatan1` varchar(255) DEFAULT NULL,
  `ApprPPK1` varchar(10) DEFAULT NULL,
  `Catatan2` varchar(255) DEFAULT NULL,
  `ApprPPK2` varchar(10) DEFAULT NULL,
  `Catatan3` varchar(255) DEFAULT NULL,
  `ApprKepala1` varchar(10) DEFAULT NULL,
  `Catatan4` varchar(255) DEFAULT NULL,
  `ApprKepala2` varchar(10) DEFAULT NULL,
  `Catatan5` varchar(255) DEFAULT NULL,
  `KodeUndangan` varchar(255) DEFAULT NULL,
  `TglDaftarDari` date DEFAULT NULL,
  `TglDaftarSampai` date DEFAULT NULL,
  `JmlPanitia` tinyint(3) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`KodeDiklat`,`UnitKerja`),
  KEY `JenisDiklat` (`Jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_diklat` VALUES ('Kasubbag Umum','001','Diklat Pelatihan Pendidikan UMUM','001','2016-08-01','2016-08-31',12,'denpasar','Tidak',NULL,NULL,'Ya','','Ya','asdfa','Ya','asdfa','Ya','','123456','2016-07-01','2016-07-31',1,'');
INSERT INTO `tb_diklat` VALUES ('002','002','Pelatihan Penggunaan Sistem Informasi Terpadu','001','2016-08-05','2016-08-31',12,'Denpasar','Ya','Ya','','Ya','','Ya','','Ya','','Ya','','123456','2016-07-01','2017-12-31',1,'');
CREATE TABLE `tb_jenis_diklat` (
  `KodeJenis` varchar(20) NOT NULL DEFAULT '',
  `NamaJenis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`KodeJenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_jenis_diklat` VALUES ('001','Diklat Pim II');
CREATE TABLE `tb_jenis_jabatan` (
  `KodeJabatan` varchar(20) NOT NULL DEFAULT '',
  `NamaJabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`KodeJabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_jenis_jabatan` VALUES ('001','Kasi');
CREATE TABLE `tb_jenis_jabatan_panitia` (
  `KodeJabatan` varchar(20) NOT NULL DEFAULT '',
  `NamaJabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`KodeJabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_jenis_jabatan_panitia` VALUES ('001','Ketua Panitia ad');
INSERT INTO `tb_jenis_jabatan_panitia` VALUES ('002','Sekretaris');
CREATE TABLE `tb_narasumber` (
  `KodeDiklat` varchar(20) NOT NULL DEFAULT '',
  `NIP` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`KodeDiklat`,`NIP`),
  KEY `diklat` (`KodeDiklat`),
  KEY `narasumber` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_panitia` (
  `KodeDiklat` varchar(20) NOT NULL DEFAULT '',
  `NIP` varchar(50) NOT NULL DEFAULT '',
  `Jabatan` varchar(20) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`KodeDiklat`,`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_panitia` VALUES ('001','1','001',NULL);
INSERT INTO `tb_panitia` VALUES ('001','19580611 198203 1 014','undefined','81dc9bdb52d04dc20036dbd8313ed055');
INSERT INTO `tb_panitia` VALUES ('001','19580611-198203-1-014',NULL,NULL);
INSERT INTO `tb_panitia` VALUES ('001','19590915 198603 1 002','001',NULL);
INSERT INTO `tb_panitia` VALUES ('001','19590921 198803 2 002','001',NULL);
INSERT INTO `tb_panitia` VALUES ('001','warsa','001',NULL);
INSERT INTO `tb_panitia` VALUES ('002','19580611 198203 1 014','001',NULL);
INSERT INTO `tb_panitia` VALUES ('002','19590915 198603 1 002','002',NULL);
CREATE TABLE `tb_pegawai` (
  `NIP` varchar(50) NOT NULL DEFAULT '',
  `Nama` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `NoTelp` varchar(255) DEFAULT NULL,
  `Pangkat` varchar(255) DEFAULT NULL,
  `Golongan` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(255) DEFAULT NULL,
  `UnitKerja` varchar(20) DEFAULT NULL,
  `TempatLahir` varchar(255) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `JenisKelamin` varchar(20) DEFAULT NULL,
  `Agama` varchar(10) DEFAULT NULL,
  `Pendidikan` varchar(255) DEFAULT NULL,
  `NPWP` varchar(255) DEFAULT NULL,
  `KTP` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_pegawai` VALUES ('19580611 198203 1 014','Drs. Pande Putu Karyana, M.Pd.',NULL,NULL,'Pembina Tk.I','IV.b','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19590915 198603 1 002','I Gsuti Made Sudiasa, B.Sc',NULL,NULL,'Penata','III.c','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19590921 198803 2 002','Ni Ketut Masni',NULL,NULL,'Penata Muda Tk.I','III.b','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19591231 197903 1 042','Drs. I Nengah Nitia, M.Kes.',NULL,NULL,'Pembina Tk.I','IV.b','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19591231 198101 1 100','Drs. I Nyoman Sudiana, M.Pd.',NULL,NULL,'Pembina Tk.I','IV.b','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19600124 198503 1 001','Dr. I Made Alit Mariana, M.Pd',NULL,NULL,'Pembina Tk.I','IV.b','001A','001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19600317 198103 1 003','I Made Manabawa',NULL,NULL,'Penata','III.c','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19611016 198403 1 004','Drs. I Made Suastana, M.Hum',NULL,NULL,'Pembina Tk.I','IV.b','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19611231 198503 2 006','Ni Wayan Korti, S.Sos.',NULL,NULL,'Penata','III.c','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19620206 198903 1 003','I Gusti Ngurah Gargita',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19620308 198203 2 002','Anak Agung Ayu Nuryati',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19620824 198304 2 013','Ni Wayan Murki, S.Pd., MM',NULL,NULL,'Pembina Tk.I','IV.b','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19620909 198503 1 005','I Made Dana',NULL,NULL,'Pengatur Muda','II.a','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19621231 199003 2 004','Dra. Ni Nyoman Yumiati, M.Pd.',NULL,NULL,'Pembina','IV.a','003A','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19630218 198903 2 002','Ni Ketut Sri Astuti',NULL,NULL,'Penata Muda','III.a','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19630625 199103 2 001','Sagung Putu Wirati, S.Sos.',NULL,NULL,'Penata Muda Tk.I','III.b','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19631015 198602 1 001','I Nyoman Susanta',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19631222 199103 2 001','Ni Putu Maharani, S.Sos.',NULL,NULL,'Penata Tk.I','III.d','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19631231 198803 1 022','I Made Kartu',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19631231 198804 2 005','Dra. Gusti Ayu Sriati, M.Pd.',NULL,NULL,'Pembina','IV.a','004A','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19631231 199003 1 182','Drs. I Ketut Gede Suteja, M.Pd',NULL,NULL,'Pembina Tk.I','IV.b','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19641113 198703 1 011','Drs. I Wayan Suandi, M.Pd.',NULL,NULL,'Pembina Tk.I','IV.b','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19641227 198803 1 003','I Gusti Ketut Subawa, SH',NULL,NULL,'Penata','III.c','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19650911 199009 2 001','Ni Nyoman Sukapti',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19651016 199103 1 003','I Nengah Paria',NULL,NULL,'Penata Muda','III.a','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19660201 198903 2 001','Anak Agung Sri Indrawati, S.Sos.',NULL,NULL,'Penata Tk.I','III.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19660212 198602 1 001','I Nyoman Gde Adysusana, S.Sos.',NULL,NULL,'Penata Tk.I','III.d','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19661019 199009 1 001','I Gede Oka Astawa',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19661019 200112 1 001','I Made Ariartha, S.Pd., M.Pd',NULL,NULL,'Penata Tk.I','III.d','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19661105 199001 1 001','I Made Yasa, SH',NULL,NULL,'Penata Muda Tk.I','III.b','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19670128 199103 2 002','Ida Ayu Komang Metri',NULL,NULL,'Penata Muda','III.a','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19670607 200501 1 001','I Ketut Suarnaya, S.ST., M.Pd.',NULL,NULL,'Penata','III.c','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19671231 198903 2 002','Ni Made Pagerswari Adnyani',NULL,NULL,'Pengatur Tk.I','II.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19680103 199009 1 001','Anak Agung Ngurah Ketut Suastika',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19680411 199103 1 002','I Ketut Parwata',NULL,NULL,'Penata Muda','III.a','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19680419 199303 2 001','Ni Wayan Nur Asmariati',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19680603 199003 2 001','Ni Luh Senin',NULL,NULL,'Penata Muda','III.a','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19690610 200212 1 001','Gede Selamat Atmaja, SH',NULL,NULL,'Penata Tk.I','III.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19690625 200212 1 001','I Putu Pande Sukerta',NULL,NULL,'Pengatur Tk.I','II.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19691128 200312 1 001','I Ketut Suwi Arjaya, S.Pd',NULL,NULL,'Penata Tk.1, III.d','III.c','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19691231 200312 1 001','Ketut Ardana, S.Pd.',NULL,NULL,'Penata Tk.1, III.d','III.c','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19700117 200212 2 001','Ni Made Armiti, S.Sos.',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19700307 198903 2 002','Ni Komang Wardi',NULL,NULL,'Penata Muda','III.a','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19700628 199702 2 003','Dr. Ni Made Suciani, M.Pd.',NULL,NULL,'Pembina Utama Muda','IV.c','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19700701 199303 1 002','I Made Sujana, S.Sos.',NULL,NULL,'Penata Muda Tk.I','III.b','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19700920 200312 2 001','Ni Wayan Mudiarni, S.Pd., MM',NULL,NULL,'Penata Tk.I','III.d','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19710226 200212 1 001','Bambang Harijanto, S.Pd.',NULL,NULL,'Penata Tk.I','III.d','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19710521 199702 1 004','Dr. I Wayan Surata, S.Pd., M.Pd.',NULL,NULL,'Pembina Utama Muda','IV.c','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19711130 200312 2 001','Ni Luh Ketut Ayu Puspitawati, SE',NULL,NULL,'Penata Tk.1, III.d','III.c','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19720216 200312 2 001','Ni Wayan Surasmini, S.Si., M.Pd.',NULL,NULL,'Penata Tk.I','III.d','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19720305 200312 2 001','Ni Ketut Irma Parwati, SE., M.Pd.',NULL,NULL,'Penata Tk.I','III.d','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19720322 200501 2 002','Ni Made Budi Marettini, S.Pd., M.Pd.',NULL,NULL,'Penata','III.c','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19721021 200312 2 001','Ni Made Dewi Oktori, S.Psi',NULL,NULL,'Penata Tk.1, III.d','III.c','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19721104 200501 1 001','I Gusti Made Sumearsa',NULL,NULL,'Pengatur','II.c','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19730702 200501 2 002','Ni Putu Budi Riniati, S.Pd.',NULL,NULL,'Penata','III.c','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19741012 200112 2 001','Ni Nengah Winarsih, SS',NULL,NULL,'Penata Tk.I','III.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19741216 200112 1 001','Heru Susanto, S.Pd',NULL,NULL,'Penata Tk.I','III.d','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19741225 200312 1 004','I Made Alit Dwitama, ST',NULL,NULL,'Penata Tk.1, III.d','III.c','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19741231 200212 1 002','I Wayan Darmayasa, SE',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19751009 200112 2 002','Ni Nengah Nuadi, S.Pd., M.Pd.',NULL,NULL,'Penata Tk.I','III.d','007','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19751121 200112 2 001','Ni Made Setiarini, S.IP., M.Pd',NULL,NULL,'Penata Tk.I','III.d','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19760409 201012 1 001','I Gusti Putu Sunarta, A.Md',NULL,NULL,'Pengatur Tk.I','II.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19760417 200701 1 001','I Wayan Ardana',NULL,NULL,'Pengatur Muda','II.a','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19760428 200112 2 002','Husnul Khatimah, S.Pd.',NULL,NULL,'Penata Tk.I','III.d','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19760805 200501 1 002','Roni Karsidi, SH',NULL,NULL,'Penata','III.c','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19770108 200810 1 001','I Putu Ari Pariyatna',NULL,NULL,'Pengatur Muda Tk.I','II.b','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19770223 200501 2 003','Ni Putu Ayu Rastiti, S.Sos.',NULL,NULL,'Penata','III.c','006','003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19770401 200112 2 001','I Gsuti Agung Ayu Putu Sasrani, SE',NULL,NULL,'Penata Tk.I','III.d','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19770421 200501 2 001','Teja Nadirah Kirana, SE',NULL,NULL,'Penata Muda Tk.1','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19770503 200112 1 003','I Made Abdi Wismana, ST., MT',NULL,NULL,'Penata Tk.I','III.d','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19770527 200112 2 001','Komang Dewi Arnawati, S.Si.',NULL,NULL,'Penata Tk.I','III.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19770914 200212 2 001','Ida Ayu Putu Witari',NULL,NULL,'Pengatur Tk.I','II.d','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19771103 200312 1 002','I Wayan Teja Budi Antara, S.Kom., MM',NULL,NULL,'Penata Tk.1, III.d','III.c','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19780414 200312 2 002','Ni Putu Apriyati Wiardani, S.KM',NULL,NULL,'Penata Muda Tk.I','III.b','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19780825 200312 1 001','I Gede Putu Agustina Aryanta, ST',NULL,NULL,'Penata Tk.1, III.d','III.c','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19781018 200701 1 001','Anak Agung Putu Sunanjaya',NULL,NULL,'Pengatur Muda Tk.I','II.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19790221 200501 1 003','I Gede Mastika, SP',NULL,NULL,'Penata','III.c','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19790515 200501 2 003','Suheldina Krisniwana, S.Pd',NULL,NULL,'Penata Muda Tk.I','III.b','008','006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19790821 200501 1 002','I Kadek Wira Santosa, S.Mat.',NULL,NULL,'Penata Muda','III.a','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19801230 200112 1 002','I Ketut Sumantara, S.Pd',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19810425 200312 2 002','Dewa Ayu Sri Herawati, SE., MM',NULL,NULL,'Penata Tk.1, III.d','III.c','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19810731 200910 1 002','I Nyoman Suasnawa Artha',NULL,NULL,'Pengatur Muda Tk.I','II.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19811114 200501 2 001','Ni Made Sudiarti, S.KM',NULL,NULL,'Penata Muda','III.a','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19820302 200912 2 006','Kadek Anggaryani, A.Md',NULL,NULL,'Pengatur Tk.I','II.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19830309 200501 2 001','Ni Putu Sri Eka Purwati, SE',NULL,NULL,'Penata Muda','III.a','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19830312 201012 1 002','I Dewa Gede Budi Artajaya, S.Kom',NULL,NULL,'Penata Muda Tk.I','III.b','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19850228 201012 2 005','Kadek Dian Wijayanti, S.Pd., M.Pd.',NULL,NULL,'Penata Muda Tk.I','III.b','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19860402 200912 2 004','Ni Ketut Yudhyareni, A.Md',NULL,NULL,'Pengatur Tk.I','II.d','006','005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19870502 201012 1 006','I Wayan Raka Santi Darmawan, S.Pd.',NULL,NULL,'Penata Muda Tk.I','III.b','006','004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('19890309 201504 1 005','Gusti Ngurah Putu Yoga Adhyatmana, S.Kom',NULL,NULL,'Penata Muda','III.a','006','002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `tb_pegawai` VALUES ('warsa','1234','','','','','','','','0000-00-00','Laki laki','Budha','','','',NULL);
CREATE TABLE `tb_peserta` (
  `KodeDiklat` varchar(20) NOT NULL DEFAULT '',
  `Nama` varchar(255) DEFAULT NULL,
  `NIP` varchar(50) NOT NULL DEFAULT '',
  `TempatLahir` varchar(255) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `NomorHP` varchar(50) DEFAULT NULL,
  `TelpRumah` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `JenisKelamin` varchar(20) DEFAULT NULL,
  `Pangkat` varchar(255) DEFAULT NULL,
  `Golongan` varchar(255) DEFAULT NULL,
  `PendidikanTerakhir` varchar(20) DEFAULT NULL,
  `Mapel` varchar(255) DEFAULT NULL,
  `NUPTK` varchar(255) DEFAULT NULL,
  `NPWP` varchar(255) DEFAULT NULL,
  `NamaInstansi` varchar(255) DEFAULT NULL,
  `AlamatInstansi` varchar(255) DEFAULT NULL,
  `Provinsi` varchar(255) DEFAULT NULL,
  `Kabupaten` varchar(255) DEFAULT NULL,
  `NoTelp` varchar(255) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(255) DEFAULT NULL,
  `StatusPendaftaran` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`KodeDiklat`,`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_peserta` VALUES ('001','anidnya putri','12345678','','0000-00-00','','','','','Laki laki','','','','','','','','','','','','','','On Process','c4ca4238a0b923820dcc509a6f75849b','');
INSERT INTO `tb_peserta` VALUES ('001','warsasadfasdf 12121','2345432','tabanan','0000-00-00','jl Turi No 15','0213948134','233434','warsabmc@gmail.com','Laki laki','penata muda','III/a','S1 Ilmu Komputer Uni','matemati','2224232','w4534343','universitas warmadewa','Jln. Gadjah Mada No. 123 Denpasar Bali','bali','denpasar','344','ferer','dadfa','On Process','d41d8cd98f00b204e9800998ecf8427e','');
INSERT INTO `tb_peserta` VALUES ('001','wqrwa','asdfasdfa','Denpasar','0000-00-00','ul','a2334','ul','ayubisma50@yahoo.com','Laki laki','ul','ul','adf','ul','ul','','','','','','','ul','','Diterima','1234','ul');
CREATE TABLE `tb_unit_kerja` (
  `KodeUnitKerja` varchar(20) NOT NULL DEFAULT '',
  `NamaUnitKerja` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`KodeUnitKerja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_unit_kerja` VALUES ('001','Kepala');
INSERT INTO `tb_unit_kerja` VALUES ('002','SI');
INSERT INTO `tb_unit_kerja` VALUES ('003','PMS');
INSERT INTO `tb_unit_kerja` VALUES ('004','FPMP');
INSERT INTO `tb_unit_kerja` VALUES ('005','PMS');
INSERT INTO `tb_unit_kerja` VALUES ('006','WI');
CREATE TABLE `tb_user` (
  `Username` varchar(50) NOT NULL DEFAULT '',
  `Password` varchar(255) DEFAULT NULL,
  `Level` varchar(255) DEFAULT NULL,
  `UnitKerja` varchar(20) DEFAULT NULL,
  `Diklat` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_user` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3','Admin',NULL,NULL);
INSERT INTO `tb_user` VALUES ('kasi','b68fcc3e90e4fecf7182587472526728','Kasi',NULL,NULL);
INSERT INTO `tb_user` VALUES ('kasisi','bce65ef70900366ea385ddefc15780a2','Kasi','002','1');
INSERT INTO `tb_user` VALUES ('kepala','870f669e4bbbfa8a6fde65549826d1c4','Kepala',NULL,NULL);
INSERT INTO `tb_user` VALUES ('pegawai','047aeeb234644b9e2d4138ed3bc7976a','Staf Kepegawaian','','0');
INSERT INTO `tb_user` VALUES ('pms','7489abae110d9030bfd282a0aa0084e8','Kasi','003','1');
INSERT INTO `tb_user` VALUES ('ppk','3bb3f4dbc050a34d9c401067d396db13','PPK','','1');
INSERT INTO `tb_user` VALUES ('umum','adfab9c56b8b16d6c067f8d3cff8818e','Kasubbag Umum','','1');
INSERT INTO `tb_user` VALUES ('warsa','da09d83faa85c143d15611698f7b1eac','PPK','','1');

ALTER TABLE `tb_diklat`
  ADD CONSTRAINT `JenisDiklat` FOREIGN KEY (`Jenis`) REFERENCES `tb_jenis_diklat` (`KodeJenis`)
;

ALTER TABLE `tb_narasumber`
  ADD CONSTRAINT `diklat` FOREIGN KEY (`KodeDiklat`) REFERENCES `tb_diklat` (`KodeDiklat`),
  ADD CONSTRAINT `narasumber` FOREIGN KEY (`NIP`) REFERENCES `tb_daftarnarasumber` (`NIP`)
;

ALTER TABLE `tb_peserta`
  ADD CONSTRAINT `tb_peserta_ibfk_1` FOREIGN KEY (`KodeDiklat`) REFERENCES `tb_diklat` (`KodeDiklat`)
;


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
