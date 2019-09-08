create database `Lapodrom` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

use `Lapodrom`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create table Korisnici
(user_id int auto_increment,
ime varchar(30),
prezime varchar(30),
email varchar(30),
sifra varchar(30),
tel numeric(30),
adresa varchar(30),
mode varchar(30),
constraint k_pk primary key (user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table Oglas
(oglas_id int auto_increment,
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
Lokacija varchar(30),
garancija int,
datum_oglasa datetime,
user_id int,
constraint o_pk primary key (oglas_id),
constraint o_fk foreign key (user_id) references Korisnici (user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table Tester
(user_id int,
oglas_id int,
test varchar(500),
ocena numeric(1),
constraint t1_fk foreign key (user_id) references Korisnici (user_id),
constraint t2_fk foreign key (oglas_id) references Oglas (oglas_id),
constraint ocena_check check (ocena IN ('1','2','3','4','5'))
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
