-- Baza za sajt Laptop oglasi

create database `lapodrom` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ; -- Definisanje baze da podrzava nase kraktere

use `lapodrom`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; -- Sprecava ubacivanja 0 (not NULL) vrednosti u novokreirana polja
SET time_zone = "+01:00"; -- Definisanje vremenske zone


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create table korisnici
(user_id int not null auto_increment,
ime varchar(256),
prezime varchar(256),
email varchar(256),
sifra varchar(2048),
tel numeric(65),
adresa varchar(256),
mode varchar(30),
created datetime DEFAULT current_timestamp,
modified timestamp DEFAULT current_timestamp on update current_timestamp,
constraint k_pk primary key (user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table oglas
(oglas_id int not null auto_increment,
naziv varchar(30),
cena numeric(30),
slika varchar(100),
cpu varchar(30),
cpu_opis varchar(500),
ram varchar(30),
tip_rama varchar(30),
gpu varchar(30),
gpu_opis varchar(500),
ekran varchar(30),
ekran_opis varchar(30),
hdd1 varchar(30),
hdd1_opis varchar(30),
hdd2 varchar(30),
hdd2_opis varchar(30),
os varchar(30),
slob_opis varchar(1000),
lokacija varchar(30),
garancija int,
datum_oglasa timestamp NULL DEFAULT CURRENT_TIMESTAMP,
user_id int,
constraint o_pk primary key (oglas_id),
constraint o_fk foreign key (user_id) references korisnici (user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table tester
(user_id int,
oglas_id int,
test varchar(500),
ocena numeric(1),
constraint t1_fk foreign key (user_id) references korisnici (user_id),
constraint t2_fk foreign key (oglas_id) references oglas (oglas_id),
constraint ocena_check check (ocena IN ('1','2','3','4','5'))
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert into korisnici (ime,prezime,email,sifra,tel,adresa,mode) values ('Marko','Markovic','markomarkovic@hotmail.com','$2a$07$AHcTAlLDVapYECnD6xlva.RYROubO17KADs3fx.e/WF8kGOzf3z0O',060123456,'IT Heroja bb','admin');
insert into oglas (naziv,cena,slika,cpu,cpu_opis,ram,tip_rama,gpu,gpu_opis,ekran,ekran_opis,hdd1,hdd1_opis,hdd2,hdd2_opis,os,slob_opis,lokacija,garancija,datum_oglasa,user_id) 
values ('Lenovo Thinkpad T440p',15000,'default.png','i5','i5-5200U 2 cores 4 threads','8','DDR4','Integrisana','Intel HD5500','14','IPS ekran 1080p','1024','Toshiba 1TB sata3','256','SanDisk SSD','Nema',
'U odlicnom stanju. Ocuvan.','Beograd',0,'2019-09-17',1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
