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

insert into korisnici (ime,prezime,email,sifra,tel,adresa,mode,created) 
values ('Marko','Markovic','markomarkovic@hotmail.com','$2a$07$AHcTAlLDVapYECnD6xlva.RYROubO17KADs3fx.e/WF8kGOzf3z0O',060123456,'IT Heroja bb','admin','2019-08-02');

insert into korisnici (ime,prezime,email,sifra,tel,adresa,mode,created) 
values ('Pera','Peric','peraperic@gmail.com','$2a$07$7bU0iGaPEc9cwHBajm2zM.1mxPujOYqWeP9T2I8bztr3ruQEu/F4u',069123456,'IT Heroja 12','user','2019-09-05');

insert into oglas (naziv,cena,slika,cpu,cpu_opis,ram,tip_rama,gpu,gpu_opis,ekran,ekran_opis,hdd1,hdd1_opis,hdd2,hdd2_opis,os,slob_opis,lokacija,garancija,datum_oglasa,user_id) 
values ('Lenovo Thinkpad T440p',15000,'default.png','i5','i5-5200U 2 cores 4 threads','8','DDR3','Integrisana','Intel HD5500','14','IPS ekran 1080p','1024','Toshiba 1TB sata3','256','SanDisk SSD','Nema',
'U odlicnom stanju. Ocuvan.','Beograd',0,'2019-09-17',1);

insert into oglas (naziv,cena,slika,cpu,cpu_opis,ram,tip_rama,gpu,gpu_opis,ekran,ekran_opis,hdd1,hdd1_opis,hdd2,hdd2_opis,os,slob_opis,lokacija,garancija,datum_oglasa,user_id) 
values ('HP Elitebook 8570p',26000,'default.png','i7','Intel(R) Core i7-3520M 3.60GHz Turbo clock, 2.90GHz Base clock','8','DDR3','Integrisana','Intel HD400','15.6','IPS ekran 900p',null,null,'256','Intel SSD','Nema',
'Na prodaju jedan fantastičan laptop, vrhunske Biznis klase, HP Elitebook 8570p. HP je jedan od svetskih liderau izradi prenosnih i stabilnih računara, a Elitebook je njihova elitna (kao što i naziv kaže) klasa laptopova.  
Poznati su po vrhunskom kvalitetu izrade (kućište izrađeno u kombinaciji Magnezijuma i Aluminijuma), izuzetnoj pouzdanosti, odličnim perfomansama i dugovečnoisti. ','Sabac',0,'2019-10-18',1);

insert into oglas (naziv,cena,slika,cpu,cpu_opis,ram,tip_rama,gpu,gpu_opis,ekran,ekran_opis,hdd1,hdd1_opis,hdd2,hdd2_opis,os,slob_opis,lokacija,garancija,datum_oglasa,user_id) 
values ('Toshiba Protege Z930',25000,'default.png','i5','Intel(R) Core i5-3437U 2.9GHz Turbo clock, 1.9GHz Base clock','6','DDR3','Integrisana','Intel HD4000','14','IPS ekran 768p',null,null,'128','Transcend SSD','Windows 7',
'Na prodaju Toshiba Protege Z930 slim book. Ultra tanko magnezijumsko kućište, elegantan dizajn, pravi mali lepotan. Besprekorno ispavan, detaljno testiran, urađen redovan servis (očišćen kuler, zamenjene termalne paste), instaliran nov operativni sistem. . . .
Računar za svaku preporuku, i što se tiče dizajna, ali i perfomansi. Odličan za poslovnu primenu, za potrebe škole, ali i za multimediju (internet, filmovi, muzika). . . Sve će raditi glatko i bez seckanaj.','Novi Sad',0,'2019-09-14',2);

insert into oglas (naziv,cena,slika,cpu,cpu_opis,ram,tip_rama,gpu,gpu_opis,ekran,ekran_opis,hdd1,hdd1_opis,hdd2,hdd2_opis,os,slob_opis,lokacija,garancija,datum_oglasa,user_id) 
values ('Lenovo ThinkPad T450',37000,'default.png','i5',' Intel(R) Core i5-5300U 2.900GHz Turbo clock, 2.30GHz Base clock Quad core (4 logička, odnsono, 2 fizička jezgra)','16','DDR3','Integrisana','Intel HD5500','14','IPS ekran 900p','1024','WD 1TB sata3','256','Samsung SSD','Windows 10',
'Na prodaju jedan fantastičan laptop visoke biznis klase, Lenovo ThinkPad T450. Intel Core i5 procesor 5. generacije, ubačn NOV SSD (kupljen u Emmiu, specijalno za ovaj laptop), raspolaže sa 16GB RAM-a, ima dva baterije koje konbinovano omogućavaju autonomiju i do preko 10-11h zavisno od korišćenja. . .
Besprekorno ispravan, instaliran nov operativni sistem, očišćen kuler, zamenjena termalna pasta, odlično radi, dve baterije originalne, skoro nove.','Beograd',0,'2019-09-17',2);

insert into oglas (naziv,cena,slika,cpu,cpu_opis,ram,tip_rama,gpu,gpu_opis,ekran,ekran_opis,hdd1,hdd1_opis,hdd2,hdd2_opis,os,slob_opis,lokacija,garancija,datum_oglasa,user_id) 
values ('Dell Latitude E6420',20000,'default.png','i5','Intel Core i5-2520M Quad core 2.53GHz','8','DDR3','Integrisana','Intel HD3000','14','IPS ekran 768p','512','Seagate 512GB sata3',null,null,'Windows 7',
'Na prodaju vrhunski biznis laptop Dell Latitude E6420. Atraktivan dizajn, aluminijumsko kućište, 100% ispravan, testiran, bez ikakavih skrivenih mana. Ide i punjač uz njega.','Nis',0,'2019-08-30',2);

insert into oglas (naziv,cena,slika,cpu,cpu_opis,ram,tip_rama,gpu,gpu_opis,ekran,ekran_opis,hdd1,hdd1_opis,hdd2,hdd2_opis,os,slob_opis,lokacija,garancija,datum_oglasa,user_id) 
values ('HP Proobook 6550b',18000,'default.png','i5','Intel Core i5-540M Quad core 2.53GHz','4','DDR3','Integrisana','Intel HD2500','15.6','IPS ekran 768p','512','Toshiba 512GB sata3',null,null,'Windows 7 Pro',
'Na prodaju laptop HP Proobook 6550b. Laptop je 100% ispravan, testiran. Ide i punjač uz njega.','Beograd',0,'2019-09-10',1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
