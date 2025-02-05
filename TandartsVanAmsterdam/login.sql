create schema if not exists tandarts;
create table login(    
id  int auto_increment primary key, 
username       varchar(25) null,    
password       varchar(50) null,    
status         varchar(7)  not null,    
voornaam       varchar(25) null,    
achternaam     varchar(25) null,    
geboortedatum  date        null,    
geslacht       varchar(7)  null,    
bsnnummer      int         null,    
telefoonnummer varchar(15) null,    
adres          varchar(50) null);

create table login(    
id  int auto_increment primary key, 
username       varchar(25) null,    
password       varchar(50) null,    
status         varchar(7)  not null,    
voornaam       varchar(25) null,    
achternaam     varchar(25) null,    
geboortedatum  date        null,    
geslacht       varchar(7)  null,    
bsnnummer      int         null,    
telefoonnummer varchar(15) null,    
adres          varchar(50) null);

alter table login
    modify username varchar(25) auto_increment;

alter table login
    modify password varchar(50) auto_increment;

alter table login
    add voornaam varchar(25) null;

alter table login
    add achternaam varchar(25) null;

alter table login
    add geboortedatum date null;

alter table login
    add geslacht varchar(7) null;

alter table login
    add bsnnummer int null;

alter table login
    add telefoonnummer varchar(15) null;

alter table login
    add adres varchar(50) null;
alter table login
    modify password varchar(255) null;

