DROP database IF EXISTS rdv_medecin;
CREATE DATABASE rdv_medecin;
USE rdv_medecin;

CREATE TABLE Patient (
    idpatient int(3) not null auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    adresse varchar(50) , 
    age int(3) not null, 
    mdp varchar(50) not null,
    primary key (idpatient)
);

CREATE TABLE Medecin (
    idmedecin int(3) not null auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    mdp varchar(50) not null,
    specialite varchar(50) not null,
    idpatient int(3) not null,
    primary key (idmedecin),
    foreign key (idpatient) references Patient(idpatient)
);

CREATE TABLE RendezVous (
    idrendezvous int(3) not null auto_increment,
    daterdv date not null,
    heure time not null,
    idpatient int(3) not null,
    idmedecin int(3) not null,
    primary key (idrendezvous),
    foreign key (idpatient) references Patient(idpatient),
    foreign key (idmedecin) references Medecin(idmedecin)
);


CREATE TABLE Prescription (
    idprescription int(3) not null auto_increment,
    dateprescription date not null,
    medicament varchar(100) not null, 
    idpatient int(3) not null,
    idmedecin int(3) not null,
    primary key (idprescription),
    foreign key (idpatient) references Patient(idpatient),
    foreign key (idmedecin) references Medecin(idmedecin)
);


CREATE TABLE user (
    iduser int(3) not null auto_increment,
    nom varchar(50) not null,
    prenom varchar(50) not null,
    email varchar(50) not null,
    mdp varchar(50) not null,
    role enum ('patient','medecin','admin'),
    primary key (iduser)
);

insert into user values ( null,"patient", "1", "patient1@gmail.com", "123", "patient");
insert into user values ( null,"Médecin", "Youssoufa", "med.youssoufa@gmail.com", "456", "medecin");
insert into user values ( null,"Admin", "Baptiste", "admin@gmail.com", "789", "admin");
insert into user values ( null,"Developpeur", "Mathieu", "mathieu@gmail.com", "123", "admin");