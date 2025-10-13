show databases;

create database masjidWeb;
use masjidWeb;

create table ruangan (
	id_ruangan integer auto_increment primary key,
    nama_ruangan varchar(100) not null,
    kapasitas integer not null,
    keterangan text
);
drop table ruangan;
desc ruangan;
 
create table barang (
	id_barang integer auto_increment primary key,
    nama_barang varchar(100) not null,
    kondisi varchar(50) not null,
    jumlah integer
);
desc barang;