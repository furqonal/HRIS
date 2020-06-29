-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Agu 2018 pada 10.45
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris_trialerror`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_user`, `bobot`, `id_indikator`) VALUES
(1, 16, 20, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `competency`
--

CREATE TABLE `competency` (
  `id_kompetensi` int(100) NOT NULL,
  `nama_author` varchar(250) NOT NULL,
  `linkedin` varchar(250) NOT NULL,
  `nama_competency` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `competency`
--

INSERT INTO `competency` (`id_kompetensi`, `nama_author`, `linkedin`, `nama_competency`, `deskripsi`, `status`) VALUES
(1, 'Tm Reza', 'https://www.linkedin.com/', 'Commitment to long team', 'ini coba deskripsoi', 1),
(2, 'Tm Reza', 'https://www.linkedin.com/in/teuku-muhammad-reza-rahadian-2a267a160/', 'Customer First', 'deskripsi accountability', 1),
(3, 'Tm Reza', 'https://www.linkedin.com/in/teuku-muhammad-reza-rahadian-2a267a160/', 'Caring Meritocracy', 'deskripsi adaptability', 1),
(4, 'Alkhuzaefi', 'https://www.linkedin.com/in/teuku-muhammad-reza-rahadian-2a267a160/', 'Co creation of win win partnership', 'deskripsi ambition', 1),
(5, 'Alkhuzaefi', 'https://www.linkedin.com/in/teuku-muhammad-reza-rahadian-2a267a160/', 'Decision Making', 'Ambition', 1),
(6, 'furqon', 'https://www.linkedin.com/', 'Buisness Awarness', 'apdfmapfndap', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator`
--

CREATE TABLE `indikator` (
  `id_indikator` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `indikator` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `id_user`, `indikator`) VALUES
(1, 16, 'jumlah pelatihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetensi_karyawan`
--

CREATE TABLE `kompetensi_karyawan` (
  `id_kompetensi_karyawan` int(11) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `id_kompetensi` int(50) NOT NULL,
  `level_kompetensi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kompetensi_karyawan`
--

INSERT INTO `kompetensi_karyawan` (`id_kompetensi_karyawan`, `nip`, `id_kompetensi`, `level_kompetensi`) VALUES
(1, 21474836411, 1, 'expert'),
(2, 21474836411, 3, 'intermediate'),
(3, 21474836411, 4, 'beginer'),
(4, 2147483646, 1, 'beginer'),
(5, 2147483646, 6, 'intermediate'),
(6, 2147483646, 2, 'beginer'),
(9, 2147483647, 1, 'expert'),
(10, 2147483647, 2, 'intermediate'),
(11, 2147483647, 5, 'intermediate');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_cuti`
--

CREATE TABLE `ms_cuti` (
  `id_cuti` int(11) NOT NULL,
  `nama_cuti` varchar(100) DEFAULT NULL,
  `hari` int(11) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_cuti`
--

INSERT INTO `ms_cuti` (`id_cuti`, `nama_cuti`, `hari`, `deskripsi`) VALUES
(1, 'Cuti Tahunan', 12, NULL),
(2, 'Cuti Alasan penting', 7, NULL),
(3, 'Cuti Sakit', 3, NULL),
(4, 'Cuti Melahirkan', 90, NULL),
(5, 'Cuti Besar', 45, NULL),
(6, 'Cuti Keguguran', 45, NULL),
(7, 'Cuti Diluar tanggungan yayasan', 90, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_data_karyawan`
--

CREATE TABLE `ms_data_karyawan` (
  `nip` bigint(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_job_profile` int(11) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `status_karyawan` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nama_ibu_kandung` varchar(50) DEFAULT NULL,
  `nama_bapak_kandung` varchar(50) DEFAULT NULL,
  `nama_anak1` varchar(50) DEFAULT NULL,
  `nama_anak2` varchar(50) DEFAULT NULL,
  `nama_anak3` varchar(50) DEFAULT NULL,
  `alamat_rumah` varchar(500) DEFAULT NULL,
  `notlp_rumah` varchar(20) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat_ortu` varchar(500) DEFAULT NULL,
  `perguruan_tinggi` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `norek_gaji` varchar(12) DEFAULT NULL,
  `bank_gaji` varchar(15) DEFAULT NULL,
  `tgl_mulai_kerja` date DEFAULT NULL,
  `tgl_capeg` date DEFAULT NULL,
  `tgl_penglap` date DEFAULT NULL,
  `ms_update_karyawan_id` int(11) DEFAULT NULL,
  `sys_jabatan_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_data_karyawan`
--

INSERT INTO `ms_data_karyawan` (`nip`, `nama`, `id_job_profile`, `nik`, `foto`, `status_karyawan`, `tempat_lahir`, `tgl_lahir`, `nama_ibu_kandung`, `nama_bapak_kandung`, `nama_anak1`, `nama_anak2`, `nama_anak3`, `alamat_rumah`, `notlp_rumah`, `nohp`, `email`, `alamat_ortu`, `perguruan_tinggi`, `level`, `jurusan`, `norek_gaji`, `bank_gaji`, `tgl_mulai_kerja`, `tgl_capeg`, `tgl_penglap`, `ms_update_karyawan_id`, `sys_jabatan_id`, `user_id`) VALUES
(2147483646, 'alkhuzaefi', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 16),
(2147483647, 'Teuku Muhammad Reza Rahardian', 2, '32092115220008', '6291d0a2-029e-4eea-a18a-757dc89d75a113.jpg', 'Karyawan tidak tetap', 'Aceh', '1996-12-13', 'mama', 'papa', 'Anggit', 'Chaidar', 'Filma', 'Keluarga Angin', '081100079', '081100079', 'teuku@gmail.com', '\"\"\"Keluarga angin', 'Telkom University', 'D3', 'Manajemen Informatika', '00000000', 'BNI', '2018-03-12', '2018-03-12', '2018-03-12', NULL, 4, 1),
(2147483648, 'Niken Galuh', 2, '32092115220008', '6291d0a2-029e-4eea-a18a-757dc89d75a112.jpg', 'Karyawan tetap', 'Madiun', '1996-12-13', 'mama', 'papa', 'unknown', 'unknown', 'unknown', 'Keluarga Angin', '081100079', '081100079', 'niken@gmail.com', '\"Keluarga angin', 'Telkom University', 'D3', 'Manajemen Informatika', '00000000', 'MANDIRI', '2018-03-12', '2018-03-12', '2018-03-12', NULL, 3, 2),
(2147483649, 'Furqon', 2, '32092115220008', '6291d0a2-029e-4eea-a18a-757dc89d75a112.jpg', 'Karyawan tetap', 'Mana aja', '1996-12-13', 'mama', 'papa', NULL, NULL, NULL, NULL, '081100079', '081100079', 'niken@gmail.com', '\"Keluarga angin', 'Telkom University', 'D3', 'Manajemen Informatika', '00000000', 'MANDIRI', '2018-03-12', '2018-03-12', '2018-03-12', NULL, 2, 4),
(2147483650, 'Pak kiki', 1, '32092115220008', '6291d0a2-029e-4eea-a18a-757dc89d75a112.jpg', 'Karyawan tetap', 'Mana aja', '1996-12-13', 'mama', 'papa', NULL, NULL, NULL, NULL, '081100079', 'v081100079', 'niken@gmail.com', '\"Keluarga angin', 'Telkom University', 'v', 'Manajemen Informatika', '00000000', NULL, NULL, NULL, NULL, NULL, 1, 5),
(21474836411, 'Badrun', 2, '32092115220009', NULL, 'karyawan tidak tetap', 'bandung', '2016-09-29', 'bunda', 'ayah', 'teti', 'ijam', 'jarjit', 'jljalan', '0833333', '081100079', 'badrun@gmail.com', 'kelluarga ku', 'ITB', 'S1', 'Sistem Iformasi', NULL, NULL, NULL, NULL, NULL, NULL, 4, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_data_update_karyawan`
--

CREATE TABLE `ms_data_update_karyawan` (
  `id_pengajuan` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `status_karyawan` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nama_ibu_kandung` varchar(50) DEFAULT NULL,
  `nama_bapak_kandung` varchar(50) DEFAULT NULL,
  `nama_anak1` varchar(50) DEFAULT NULL,
  `nama_anak2` varchar(50) DEFAULT NULL,
  `nama_anak3` varchar(50) DEFAULT NULL,
  `alamat_rumah` varchar(500) DEFAULT NULL,
  `notlp_rumah` varchar(20) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat_ortu` varchar(500) DEFAULT NULL,
  `perguruan_tinggi` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `norek_gaji` varchar(12) DEFAULT NULL,
  `bank_gaji` varchar(15) DEFAULT NULL,
  `tgl_mulai_kerja` date DEFAULT NULL,
  `tgl_capeg` date DEFAULT NULL,
  `tgl_penglap` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `sys_jabatan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_data_update_karyawan`
--

INSERT INTO `ms_data_update_karyawan` (`id_pengajuan`, `nip`, `nama`, `nik`, `unit`, `foto`, `status_karyawan`, `tempat_lahir`, `tgl_lahir`, `nama_ibu_kandung`, `nama_bapak_kandung`, `nama_anak1`, `nama_anak2`, `nama_anak3`, `alamat_rumah`, `notlp_rumah`, `nohp`, `email`, `alamat_ortu`, `perguruan_tinggi`, `level`, `jurusan`, `norek_gaji`, `bank_gaji`, `tgl_mulai_kerja`, `tgl_capeg`, `tgl_penglap`, `status`, `sys_jabatan_id`) VALUES
(1, '2147483647', 'Teuku Muhammad Reza Rahardian', '32092115220008', 'General Affair', '3_-Logo-Telkom-University-Konfigurasi-Memusat8.png', 'Karyawan tidak tetap', 'Aceh', '1996-12-13', 'mama', 'papa', 'Anggit', 'Chaidar', 'Filma', 'Keluarga Angin', '081100079', '081100079', 'teuku@gmail.com', '\"Keluarga angin', 'Telkom University', 'D3', 'Manajemen Informatika', '00000000', 'BNI', '2018-03-12', '2018-03-12', '2018-03-12', 'Sudah disetujui', 4),
(5, '2147483647', 'Teuku Muhammad Reza Rahardian Raja Guguk', '32092115220008', 'GA', '2.PNG', 'Karyawan tidak tetap', 'Aceh', '1996-12-13', 'mama', 'papa', 'Anggit', 'Chaidar', 'Filma', 'Keluarga Angin', '081100079', '081100079', 'teuku@gmail.com', '\"\"Keluarga angin', 'Telkom University', 'D3', 'Manajemen Informatika', '00000000', 'BNI', '2018-03-12', '2018-03-12', '2018-03-12', 'Sudah disetujui', 4),
(6, '2147483647', 'Teuku Muhammad Reza Rahardian', '32092115220008', 'GA', '6291d0a2-029e-4eea-a18a-757dc89d75a113.jpg', 'Karyawan tidak tetap', 'Aceh', '1996-12-13', 'mama', 'papa', 'Anggit', 'Chaidar', 'Filma', 'Keluarga Angin', '081100079', '081100079', 'teuku@gmail.com', '\"\"\"Keluarga angin', 'Telkom University', 'D3', 'Manajemen Informatika', '00000000', 'BNI', '2018-03-12', '2018-03-12', '2018-03-12', 'Sudah disetujui', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_jatah_cuti`
--

CREATE TABLE `ms_jatah_cuti` (
  `id_jatah_cuti` int(11) NOT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `tahunan` int(11) DEFAULT NULL,
  `alasan_penting` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `melahirkan` int(11) DEFAULT NULL,
  `besar` int(11) DEFAULT NULL,
  `keguguran` int(11) DEFAULT NULL,
  `diluar_tanggungan_yayasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_jatah_cuti`
--

INSERT INTO `ms_jatah_cuti` (`id_jatah_cuti`, `nip`, `tahunan`, `alasan_penting`, `sakit`, `melahirkan`, `besar`, `keguguran`, `diluar_tanggungan_yayasan`) VALUES
(1, 21474836411, 12, 3, 3, 90, 45, 45, 90),
(2, 2147483647, 12, 3, 3, 90, 45, 45, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_job_profile`
--

CREATE TABLE `ms_job_profile` (
  `id_job_profile` int(100) NOT NULL,
  `nama_jabatan` varchar(250) NOT NULL,
  `unit_kerja` varchar(250) NOT NULL,
  `atasan_langsung` text NOT NULL,
  `bawahan_langsung` text NOT NULL,
  `tujuan_jabatan` text NOT NULL,
  `pendidikan_minimal` varchar(100) NOT NULL,
  `status_kepegawaian` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_job_profile`
--

INSERT INTO `ms_job_profile` (`id_job_profile`, `nama_jabatan`, `unit_kerja`, `atasan_langsung`, `bawahan_langsung`, `tujuan_jabatan`, `pendidikan_minimal`, `status_kepegawaian`, `status`) VALUES
(1, 'Assistant  Manager  of  Human  Capital  and  Support ', 'General Affair', 'Senior manager of general affair', '1. staff of human capital and logistic <br> 2. staff of public relation', 'Menjalankan  fungsi  koordinasi  pelaksanaan  kegiatan  SDM,  logistik,  dan  public  relation  di  Bandung  Techno  Park  dan  dilaksanakan  sesuai  dengan  target  yang  ditetapkan.', 'S1', 'Tetap', 0),
(2, 'staf salesman', 'salesaman', 'senior manager salesman', 'staf salesman', 'memenuhi penjualan', 'd3', 'tetap', 1),
(3, 'staff hrd', 'hrd', 'senior manager hrd', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_kompetensi`
--

CREATE TABLE `penilaian_kompetensi` (
  `nip` bigint(20) NOT NULL,
  `id_kompetensi` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `nilai_komp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_kompetensi`
--

INSERT INTO `penilaian_kompetensi` (`nip`, `id_kompetensi`, `id_nilai`, `nilai_komp`) VALUES
(2147483646, 1, 14, 5),
(2147483646, 6, 15, 4),
(2147483646, 2, 16, 4),
(21474836411, 1, 17, 5),
(21474836411, 3, 18, 4),
(21474836411, 4, 19, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `performa_appraisal`
--

CREATE TABLE `performa_appraisal` (
  `id_user` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `id_performa` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `performa_appraisal`
--

INSERT INTO `performa_appraisal` (`id_user`, `posisi`, `id_performa`, `sku`) VALUES
(16, '', 1, 'interrnal bisnis proces');

-- --------------------------------------------------------

--
-- Struktur dari tabel `real`
--

CREATE TABLE `real` (
  `id_real` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `real` int(11) NOT NULL,
  `indikator` varchar(100) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `evidence` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `real`
--

INSERT INTO `real` (`id_real`, `id_user`, `real`, `indikator`, `id_indikator`, `evidence`, `status`) VALUES
(1, 16, 3, 'jumlah', 1, 'proposal2.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_anggota_perjalanandinas`
--

CREATE TABLE `rel_anggota_perjalanandinas` (
  `id_anggota` int(11) NOT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `id_perjalanandinas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_anggota_perjalanandinas`
--

INSERT INTO `rel_anggota_perjalanandinas` (`id_anggota`, `nip`, `id_perjalanandinas`) VALUES
(1, 21474836411, 2),
(2, 2147483647, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_indikator_keberhasilan`
--

CREATE TABLE `rel_indikator_keberhasilan` (
  `id_indikator_keberhasilan` int(100) NOT NULL,
  `id_job_profile` int(100) NOT NULL,
  `indikator` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_indikator_keberhasilan`
--

INSERT INTO `rel_indikator_keberhasilan` (`id_indikator_keberhasilan`, `id_job_profile`, `indikator`) VALUES
(1, 1, 'indikator 1'),
(2, 1, 'indikator 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_keahlian_pengetahuan`
--

CREATE TABLE `rel_keahlian_pengetahuan` (
  `id_keahlian_pengetahuan` int(100) NOT NULL,
  `id_job_profile` int(100) NOT NULL,
  `kompetensi_keahlian` text NOT NULL,
  `level_keahliaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_keahlian_pengetahuan`
--

INSERT INTO `rel_keahlian_pengetahuan` (`id_keahlian_pengetahuan`, `id_job_profile`, `kompetensi_keahlian`, `level_keahliaan`) VALUES
(1, 1, 'blabla', 'experts'),
(2, 1, 'blibli', 'intermediate');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_kompetensi_inti`
--

CREATE TABLE `rel_kompetensi_inti` (
  `id_kompetensi_inti` int(100) NOT NULL,
  `id_job_profile` int(100) NOT NULL,
  `kompetensi_inti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_kompetensi_inti`
--

INSERT INTO `rel_kompetensi_inti` (`id_kompetensi_inti`, `id_job_profile`, `kompetensi_inti`) VALUES
(1, 1, 'kompetensi inti 1'),
(2, 1, 'komptensi inti 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_kualitas_personal`
--

CREATE TABLE `rel_kualitas_personal` (
  `id_kualitaas_personal` int(100) NOT NULL,
  `id_job_profile` int(100) NOT NULL,
  `kualitas_personal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_kualitas_personal`
--

INSERT INTO `rel_kualitas_personal` (`id_kualitaas_personal`, `id_job_profile`, `kualitas_personal`) VALUES
(1, 1, 'kualitas 1'),
(2, 1, 'kualitas 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_manajemen_cuti`
--

CREATE TABLE `rel_manajemen_cuti` (
  `id_pengajuan_cuti` int(11) NOT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `sampai_tgl` date DEFAULT NULL,
  `lama_cuti` int(11) DEFAULT NULL,
  `ms_karyawan_id` bigint(20) DEFAULT NULL,
  `p_ataasan1` varchar(20) DEFAULT NULL,
  `p_ataasan2` varchar(20) DEFAULT NULL,
  `ms_cuti_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_manajemen_cuti`
--

INSERT INTO `rel_manajemen_cuti` (`id_pengajuan_cuti`, `tgl_pengajuan`, `sampai_tgl`, `lama_cuti`, `ms_karyawan_id`, `p_ataasan1`, `p_ataasan2`, `ms_cuti_id`, `status`) VALUES
(13, '2018-05-10', '2018-05-11', 1, 21474836411, 'Sudah disetujui', 'Sudah disetujui', 2, 'Expired'),
(14, '2018-05-09', '1970-01-01', 2, 2147483647, 'Belum disetujui', 'Sudah disetujui', 4, 'Proses persetujuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_manajemen_perjalanan_dinas`
--

CREATE TABLE `rel_manajemen_perjalanan_dinas` (
  `id_perjalanan_dinas` int(11) NOT NULL,
  `deskripsi_perjalanan` varchar(500) DEFAULT NULL,
  `jenis_perjalan` varchar(100) DEFAULT NULL,
  `kota_tujuan` varchar(100) DEFAULT NULL,
  `transportasi` varchar(100) DEFAULT NULL,
  `anggaran_saat_ini` bigint(20) DEFAULT NULL,
  `anggaran_akhir` bigint(20) DEFAULT NULL,
  `ms_karyawan_id` bigint(20) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `lama_perjalanan` int(11) DEFAULT NULL,
  `p_atasan1` varchar(20) DEFAULT NULL,
  `p_atasan2` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_manajemen_perjalanan_dinas`
--

INSERT INTO `rel_manajemen_perjalanan_dinas` (`id_perjalanan_dinas`, `deskripsi_perjalanan`, `jenis_perjalan`, `kota_tujuan`, `transportasi`, `anggaran_saat_ini`, `anggaran_akhir`, `ms_karyawan_id`, `tgl_pengajuan`, `tgl_kembali`, `lama_perjalanan`, `p_atasan1`, `p_atasan2`, `status`) VALUES
(1, 'deksripsi', 'Dalam negeri', 'Bandung', 'Pesawat', 100000, 15000, 2147483647, '2018-05-09', '2018-05-16', 7, 'Belum disetujui', 'Belum disetujui', 'Expired'),
(2, 'ad', 'Dalam negeri', 'asd', 'Pesawat', 123, 123, 21474836411, '2018-05-09', '2018-05-13', 5, 'Sudah disetujui', 'Sudah disetujui', 'Expired');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_pelatihan`
--

CREATE TABLE `rel_pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `nama_pelatihan` varchar(200) DEFAULT NULL,
  `tahun` varchar(50) DEFAULT NULL,
  `sertifikat` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ms_karyawan_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_pelatihan`
--

INSERT INTO `rel_pelatihan` (`id_pelatihan`, `nama_pelatihan`, `tahun`, `sertifikat`, `status`, `ms_karyawan_id`) VALUES
(2, 'Pelatihan membuat tahu bulat', '2018-03-13', 'Ya', 'Belum disetujui', 2147483647),
(3, 'Pelatihan membuat tahu', '2018-03-13', 'Ya', 'Sudah disetujui', 2147483647),
(4, 'coba', '2018-04-03', 'Ya', 'Sudah disetujui', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_pengalaman_kerja`
--

CREATE TABLE `rel_pengalaman_kerja` (
  `id_pengalamankerja` int(11) NOT NULL,
  `nama_perusahaan` varchar(150) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_berakhir` date DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ms_karyawan_id` bigint(20) DEFAULT NULL,
  `status_seen` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_pengalaman_kerja`
--

INSERT INTO `rel_pengalaman_kerja` (`id_pengalamankerja`, `nama_perusahaan`, `tgl_mulai`, `tgl_berakhir`, `posisi`, `unit`, `status`, `ms_karyawan_id`, `status_seen`) VALUES
(3, 'Telkom Indonesia', '2018-03-13', '2018-03-13', 'HRD', 'General Affair', 'Belum disetujui', 2147483647, 0),
(4, 'Telkom Indonesia', '2018-03-13', '2018-03-13', 'HRD', 'General Affair', 'Belum disetujui', 2147483647, 1),
(5, 'Telkom Indonesia', '2018-03-13', '2018-03-13', 'HRD', 'General Affair', 'Belum disetujui', 2147483647, 1),
(6, 'Telkom Indonesia', '2018-03-13', '2018-03-13', 'HRD', 'General Affair', 'Sudah disetujui', 2147483647, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_sppd`
--

CREATE TABLE `rel_sppd` (
  `id_sppd` int(11) NOT NULL,
  `SPPD` varchar(500) DEFAULT NULL,
  `ms_karyawan_id` bigint(20) DEFAULT NULL,
  `tgl_upload` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_tugas_pokok`
--

CREATE TABLE `rel_tugas_pokok` (
  `id_tugas_pokok` int(100) NOT NULL,
  `id_job_profile` int(100) NOT NULL,
  `uraian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rel_tugas_pokok`
--

INSERT INTO `rel_tugas_pokok` (`id_tugas_pokok`, `id_job_profile`, `uraian`) VALUES
(1, 1, 'Bertanggung  jawab  mengelola  dan  mengembangkan  sumber  daya  manusia;  '),
(2, 1, 'Membuat  sistem  HR  yang  efektif  dan  efisien,  misalnya  dengan  membuat  SOP,  job  description,  training  and  development  system  dll;  ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `id_user`, `satuan`, `id_indikator`) VALUES
(1, 16, 'jumlah', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_jabatan`
--

CREATE TABLE `sys_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sys_jabatan`
--

INSERT INTO `sys_jabatan` (`id_jabatan`, `nama_jabatan`, `deskripsi`) VALUES
(1, 'Atasan 1', NULL),
(2, 'Atasan 2', NULL),
(3, 'HRD', NULL),
(4, 'Karyawan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `target`
--

CREATE TABLE `target` (
  `id_target` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `target`
--

INSERT INTO `target` (`id_target`, `id_user`, `target`, `id_indikator`) VALUES
(1, 16, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `id_user`, `tipe`, `id_indikator`) VALUES
(1, 16, 'Higher Better ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_user`
--

CREATE TABLE `tipe_user` (
  `id_tipe_user` int(11) NOT NULL,
  `tipe_user` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_user`
--

INSERT INTO `tipe_user` (`id_tipe_user`, `tipe_user`) VALUES
(1, 'HRD'),
(2, 'General Manager'),
(3, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_tipe_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_tipe_user`) VALUES
(1, 'tm', 'tm', 4),
(2, 'niken', 'niken', 3),
(4, 'furqon', 'furqon', 2),
(5, 'pak kiki', 'atasan1', 1),
(15, 'badrun', 'badrun', 4),
(16, 'alkhuzaefi', 'al', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `id_user`, `waktu`, `id_indikator`) VALUES
(1, 16, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `competency`
--
ALTER TABLE `competency`
  ADD PRIMARY KEY (`id_kompetensi`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id_indikator`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kompetensi_karyawan`
--
ALTER TABLE `kompetensi_karyawan`
  ADD PRIMARY KEY (`id_kompetensi_karyawan`),
  ADD KEY `id_kompetensi` (`id_kompetensi`);

--
-- Indexes for table `ms_cuti`
--
ALTER TABLE `ms_cuti`
  ADD KEY `id` (`id_cuti`);

--
-- Indexes for table `ms_data_karyawan`
--
ALTER TABLE `ms_data_karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_jabatan_id` (`sys_jabatan_id`),
  ADD KEY `id_job_profile` (`id_job_profile`);

--
-- Indexes for table `ms_data_update_karyawan`
--
ALTER TABLE `ms_data_update_karyawan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `fk_jabatan_karyawan` (`sys_jabatan_id`);

--
-- Indexes for table `ms_jatah_cuti`
--
ALTER TABLE `ms_jatah_cuti`
  ADD PRIMARY KEY (`id_jatah_cuti`),
  ADD KEY `fk_nip_jatahcuti` (`nip`);

--
-- Indexes for table `ms_job_profile`
--
ALTER TABLE `ms_job_profile`
  ADD PRIMARY KEY (`id_job_profile`);

--
-- Indexes for table `penilaian_kompetensi`
--
ALTER TABLE `penilaian_kompetensi`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kompetensi` (`id_kompetensi`);

--
-- Indexes for table `performa_appraisal`
--
ALTER TABLE `performa_appraisal`
  ADD PRIMARY KEY (`id_performa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `real`
--
ALTER TABLE `real`
  ADD PRIMARY KEY (`id_real`),
  ADD KEY `indikator` (`indikator`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rel_anggota_perjalanandinas`
--
ALTER TABLE `rel_anggota_perjalanandinas`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `fk_perjalandinas_anggota` (`id_perjalanandinas`),
  ADD KEY `fk_karyawan_PPD` (`nip`);

--
-- Indexes for table `rel_indikator_keberhasilan`
--
ALTER TABLE `rel_indikator_keberhasilan`
  ADD PRIMARY KEY (`id_indikator_keberhasilan`);

--
-- Indexes for table `rel_keahlian_pengetahuan`
--
ALTER TABLE `rel_keahlian_pengetahuan`
  ADD PRIMARY KEY (`id_keahlian_pengetahuan`);

--
-- Indexes for table `rel_kompetensi_inti`
--
ALTER TABLE `rel_kompetensi_inti`
  ADD PRIMARY KEY (`id_kompetensi_inti`);

--
-- Indexes for table `rel_kualitas_personal`
--
ALTER TABLE `rel_kualitas_personal`
  ADD PRIMARY KEY (`id_kualitaas_personal`);

--
-- Indexes for table `rel_manajemen_cuti`
--
ALTER TABLE `rel_manajemen_cuti`
  ADD PRIMARY KEY (`id_pengajuan_cuti`),
  ADD KEY `fk_nip_karyawan_cuti` (`ms_karyawan_id`),
  ADD KEY `fk_id_cuti` (`ms_cuti_id`);

--
-- Indexes for table `rel_manajemen_perjalanan_dinas`
--
ALTER TABLE `rel_manajemen_perjalanan_dinas`
  ADD PRIMARY KEY (`id_perjalanan_dinas`),
  ADD KEY `fk_nip_dinas` (`ms_karyawan_id`);

--
-- Indexes for table `rel_pelatihan`
--
ALTER TABLE `rel_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`),
  ADD KEY `fk_karyawan_nip` (`ms_karyawan_id`);

--
-- Indexes for table `rel_pengalaman_kerja`
--
ALTER TABLE `rel_pengalaman_kerja`
  ADD PRIMARY KEY (`id_pengalamankerja`),
  ADD KEY `fk_nip_karyawan` (`ms_karyawan_id`);

--
-- Indexes for table `rel_sppd`
--
ALTER TABLE `rel_sppd`
  ADD PRIMARY KEY (`id_sppd`),
  ADD KEY `fk_nip_karyawan_sppd` (`ms_karyawan_id`);

--
-- Indexes for table `rel_tugas_pokok`
--
ALTER TABLE `rel_tugas_pokok`
  ADD PRIMARY KEY (`id_tugas_pokok`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sys_jabatan`
--
ALTER TABLE `sys_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id_target`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_indikator` (`id_indikator`);

--
-- Indexes for table `tipe_user`
--
ALTER TABLE `tipe_user`
  ADD PRIMARY KEY (`id_tipe_user`),
  ADD UNIQUE KEY `id_tipe_user` (`id_tipe_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_tipe_user` (`id_tipe_user`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `competency`
--
ALTER TABLE `competency`
  MODIFY `id_kompetensi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kompetensi_karyawan`
--
ALTER TABLE `kompetensi_karyawan`
  MODIFY `id_kompetensi_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ms_cuti`
--
ALTER TABLE `ms_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ms_data_update_karyawan`
--
ALTER TABLE `ms_data_update_karyawan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ms_jatah_cuti`
--
ALTER TABLE `ms_jatah_cuti`
  MODIFY `id_jatah_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ms_job_profile`
--
ALTER TABLE `ms_job_profile`
  MODIFY `id_job_profile` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penilaian_kompetensi`
--
ALTER TABLE `penilaian_kompetensi`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `performa_appraisal`
--
ALTER TABLE `performa_appraisal`
  MODIFY `id_performa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `real`
--
ALTER TABLE `real`
  MODIFY `id_real` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rel_anggota_perjalanandinas`
--
ALTER TABLE `rel_anggota_perjalanandinas`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rel_indikator_keberhasilan`
--
ALTER TABLE `rel_indikator_keberhasilan`
  MODIFY `id_indikator_keberhasilan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rel_keahlian_pengetahuan`
--
ALTER TABLE `rel_keahlian_pengetahuan`
  MODIFY `id_keahlian_pengetahuan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rel_kompetensi_inti`
--
ALTER TABLE `rel_kompetensi_inti`
  MODIFY `id_kompetensi_inti` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rel_kualitas_personal`
--
ALTER TABLE `rel_kualitas_personal`
  MODIFY `id_kualitaas_personal` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rel_manajemen_cuti`
--
ALTER TABLE `rel_manajemen_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rel_manajemen_perjalanan_dinas`
--
ALTER TABLE `rel_manajemen_perjalanan_dinas`
  MODIFY `id_perjalanan_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rel_pelatihan`
--
ALTER TABLE `rel_pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rel_pengalaman_kerja`
--
ALTER TABLE `rel_pengalaman_kerja`
  MODIFY `id_pengalamankerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rel_sppd`
--
ALTER TABLE `rel_sppd`
  MODIFY `id_sppd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rel_tugas_pokok`
--
ALTER TABLE `rel_tugas_pokok`
  MODIFY `id_tugas_pokok` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sys_jabatan`
--
ALTER TABLE `sys_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipe_user`
--
ALTER TABLE `tipe_user`
  MODIFY `id_tipe_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`);

--
-- Ketidakleluasaan untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `indikator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `performa_appraisal` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `ms_data_karyawan`
--
ALTER TABLE `ms_data_karyawan`
  ADD CONSTRAINT `fk_jabatan_id` FOREIGN KEY (`sys_jabatan_id`) REFERENCES `sys_jabatan` (`id_jabatan`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `ms_data_karyawan_ibfk_1` FOREIGN KEY (`id_job_profile`) REFERENCES `ms_job_profile` (`id_job_profile`);

--
-- Ketidakleluasaan untuk tabel `ms_data_update_karyawan`
--
ALTER TABLE `ms_data_update_karyawan`
  ADD CONSTRAINT `fk_jabatan_karyawan` FOREIGN KEY (`sys_jabatan_id`) REFERENCES `sys_jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `ms_jatah_cuti`
--
ALTER TABLE `ms_jatah_cuti`
  ADD CONSTRAINT `fk_nip_jatahcuti` FOREIGN KEY (`nip`) REFERENCES `ms_data_karyawan` (`nip`);

--
-- Ketidakleluasaan untuk tabel `penilaian_kompetensi`
--
ALTER TABLE `penilaian_kompetensi`
  ADD CONSTRAINT `penilaian_kompetensi_ibfk_1` FOREIGN KEY (`id_kompetensi`) REFERENCES `kompetensi_karyawan` (`id_kompetensi_karyawan`);

--
-- Ketidakleluasaan untuk tabel `performa_appraisal`
--
ALTER TABLE `performa_appraisal`
  ADD CONSTRAINT `performa_appraisal_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `real`
--
ALTER TABLE `real`
  ADD CONSTRAINT `real_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`);

--
-- Ketidakleluasaan untuk tabel `rel_anggota_perjalanandinas`
--
ALTER TABLE `rel_anggota_perjalanandinas`
  ADD CONSTRAINT `fk_karyawan_PPD` FOREIGN KEY (`nip`) REFERENCES `ms_data_karyawan` (`nip`),
  ADD CONSTRAINT `fk_perjalandinas_anggota` FOREIGN KEY (`id_perjalanandinas`) REFERENCES `rel_manajemen_perjalanan_dinas` (`id_perjalanan_dinas`);

--
-- Ketidakleluasaan untuk tabel `rel_manajemen_cuti`
--
ALTER TABLE `rel_manajemen_cuti`
  ADD CONSTRAINT `fk_id_cuti` FOREIGN KEY (`ms_cuti_id`) REFERENCES `ms_cuti` (`id_cuti`),
  ADD CONSTRAINT `fk_nip_karyawan_cuti` FOREIGN KEY (`ms_karyawan_id`) REFERENCES `ms_data_karyawan` (`nip`);

--
-- Ketidakleluasaan untuk tabel `rel_manajemen_perjalanan_dinas`
--
ALTER TABLE `rel_manajemen_perjalanan_dinas`
  ADD CONSTRAINT `fk_nip_dinas` FOREIGN KEY (`ms_karyawan_id`) REFERENCES `ms_data_karyawan` (`nip`);

--
-- Ketidakleluasaan untuk tabel `rel_pelatihan`
--
ALTER TABLE `rel_pelatihan`
  ADD CONSTRAINT `fk_karyawan_nip` FOREIGN KEY (`ms_karyawan_id`) REFERENCES `ms_data_karyawan` (`nip`);

--
-- Ketidakleluasaan untuk tabel `rel_pengalaman_kerja`
--
ALTER TABLE `rel_pengalaman_kerja`
  ADD CONSTRAINT `fk_nip_karyawan` FOREIGN KEY (`ms_karyawan_id`) REFERENCES `ms_data_karyawan` (`nip`);

--
-- Ketidakleluasaan untuk tabel `rel_sppd`
--
ALTER TABLE `rel_sppd`
  ADD CONSTRAINT `fk_nip_karyawan_sppd` FOREIGN KEY (`ms_karyawan_id`) REFERENCES `ms_data_karyawan` (`nip`);

--
-- Ketidakleluasaan untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD CONSTRAINT `satuan_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`);

--
-- Ketidakleluasaan untuk tabel `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `target_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`);

--
-- Ketidakleluasaan untuk tabel `tipe`
--
ALTER TABLE `tipe`
  ADD CONSTRAINT `tipe_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_tipe_user` FOREIGN KEY (`id_tipe_user`) REFERENCES `sys_jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD CONSTRAINT `waktu_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
