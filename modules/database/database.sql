CREATE TABLE akun (
	id int primary key auto_increment,
	nama varchar(255),
	username varchar(255) not null unique,
	password varchar(255) not null,
	level enum('PETUGAS', 'PEMILIK') DEFAULT 'PEMILIK',
	kontak varchar(16),
	alamat text,
  	jenis_kelamin enum('1', '2')
);

CREATE TABLE daftar (
	id int primary key auto_increment,
	tanggal datetime DEFAULT CURRENT_TIMESTAMP,
	pemilik int,
	jenis_hewan varchar(64),
	usia_hewan varchar(64),
	tujuan varchar(64) DEFAULT NULL,
	status enum('PENDING', 'DISETUJUI', 'BATAL') DEFAULT 'PENDING',
	foreign key (pemilik) references akun(id)
);

CREATE TABLE jadwal (
	id int primary key auto_increment,
	id_daftar int,
	tanggal datetime DEFAULT CURRENT_TIMESTAMP,
	hari varchar(32) DEFAULT NULL,
	status enum('PENDING', 'SELESAI') DEFAULT 'PENDING',
	foreign key (id_daftar) references daftar(id)
);

CREATE TABLE rekam_medis (
  id int primary key auto_increment,
  id_jadwal int(11),
  tanggal datetime DEFAULT CURRENT_TIMESTAMP,
  gejala varchar(200) NOT NULL,
  penyakit varchar(100) NOT NULL,
  terapi varchar(200) NOT NULL,
  foreign key (id_jadwal) references jadwal(id)
);

CREATE TABLE vaksinasi (
  id int primary key auto_increment,
  id_jadwal int(11),
  tanggal datetime DEFAULT CURRENT_TIMESTAMP,
  gejala varchar(200) NOT NULL,
  penyakit varchar(100) NOT NULL,
  terapi varchar(200) NOT NULL,
  foreign key (id_jadwal) references jadwal(id)
);