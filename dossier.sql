drop database if exists FilRougeG3;

create database FilRougeG3;

use FilRougeG3;

create table Utilisateur(id int primary key not null auto_increment);
alter table Utilisateur add pseudo varchar(255);
alter table Utilisateur add mail varchar(255);
alter table Utilisateur add mot_de_passe varchar(255);

create table Signalement (id int primary key not null auto_increment);
alter table Signalement add intitule varchar(255);
alter table Signalement add date_Signalement DateTime;

create table Type_Signalement (id int primary key not null auto_increment);
alter table Type_Signalement add intitule varchar(255);

create table API (id int primary key not null auto_increment);
alter table API add api_key varchar(255);

create table Personnage (id int primary key not null auto_increment);
alter table Personnage add niveau varchar (255);
alter table Personnage add equipement varchar (255);

create table Evenement (id int primary key not null auto_increment);
alter table Evenement add intitule varchar (255);
alter table Evenement add date_Evenement DateTime;
alter table Prerequis add niveau_max INT;
alter table Prerequis add niveau_min INT;

create table Rang(id int primary key not null auto_increment);
alter table Rang add intitule varchar (255);

create table Zone (id int primary key not null auto_increment);
alter table Zone add intitule varchar (255);
alter table Zone add lieu varchar(255);

create table Type_Zone (id int primary key not null auto_increment);
alter table Type_Zone add intitule varchar(255);

create table Etre_Signale (id int primary key not null auto_increment);
alter table Etre_Signale add (numSignalement int, numUtilisateur int, foreign key (numSignalement)references Signalement(id),
foreign key (numUtilisateur)references Utilisateur(id)) ; 

create table Demander (id int primary key not null auto_increment);
alter table Demander add (numZone int, numRang int, foreign key (numZone)references Zone(id),
foreign key (numRang)references Rang(id)) ; 

create table Inscrire (id int primary key not null auto_increment);
alter table Inscrire add (numEvenement int, numPersonnage int, foreign key (numEvenement)references Evenement(id),
foreign key (numPersonnage) references Personnage(id));
-- Creer un Signalement
alter table Signalement add (numUtilisateur int, foreign key (numUtilisateur)references Utilisateur(id) );
-- relation typer le signalement
alter table Signalement add (numType_Signalement int, foreign key (numType_Signalement)references Type_Signalement(id));

alter table API add (numUtilisateur int, foreign key (numUtilisateur)references Utilisateur(id));
-- relation avoir personnage
alter table Personnage add (numUtilisateur int, foreign key (numUtilisateur)references Utilisateur(id));
-- relation organiser
alter table Evenement add (numUtilisateur int, foreign key (numUtilisateur)references Utilisateur(id));

alter table Utilisateur add (numRang int, foreign key (numRang)references Rang(id));

alter table Evenement add (numZone int, foreign key (numZone)references Zone(id));

alter table Zone add (numType_Zone int, foreign key (numType_Zone) references Type_Zone(id));

