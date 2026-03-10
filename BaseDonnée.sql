-- création de la base de données
CREATE DATABASE SIO1DelmasVELO

-- Création de la table CYCLISTE
CREATE TABLE CYCLISTE (
    id INT NOT NULL,
    nom CHAR(255) NOT NULL,
    prenom CHAR(255) NOT NULL,
    adresse CHAR(255),
    codePostal CHAR(10),
    ville CHAR(255) NOT NULL,
    age INT NOT NULL,
	CONSTRAINT pk_CYCLISTE PRIMARY KEY (id)
);

INSERT INTO CYCLISTE (id,nom, prenom, adresse, codePostal, ville, age)
VALUES
    (1,'Dupont', 'Jean', '10 Rue de la Liberté', '44000', 'Nantes', 40),
    (2,'Martin', 'Sophie', '5 Rue de la Paix', '44000', 'Nantes', 35),
    (3,'Lefevre', 'Pierre', '8 Avenue des Roses', '44100', 'Nantes', 45),
    (4,'Durand', 'Isabelle', '12 Rue du Vélo', '44300', 'Nantes', 38),
    (5,'Leclerc', 'François', '15 Boulevard du Cycliste', '44200', 'Nantes', 42),
    (6,'Girard', 'Marie', '20 Avenue des Champs', '44300', 'Nantes', 48),
    (7,'Roux', 'Paul', '25 Rue de la Pédale', '44000', 'Nantes', 36),
    (8,'Fournier', 'Catherine', '30 Boulevard du Tour', '44200', 'Nantes', 50),
    (9,'Lemoine', 'Thomas', '35 Rue de la Bicyclette', '44100', 'Nantes', 39),
    (10,'Bertrand', 'Sandrine', '40 Avenue des Cyclistes', '44300', 'Nantes', 41);

-- Création de la table CLUB
CREATE TABLE CLUB (
    id INT NOT NULL,
    libelle CHAR(50) NOT NULL,
    ville CHAR(50) NOT NULL,
	CONSTRAINT pk_CLUB PRIMARY KEY (id)
);
INSERT INTO CLUB (id,libelle, ville)
VALUES
    (1,'Les Cyclistes Nantais', 'Nantes'),
    (2,'Vélo Passion Nantes', 'Nantes'),
    (3,'Les Rouleurs de l Erdre', 'Nantes'),
    (4,'Nantes Cyclisme Club', 'Nantes'),
    (5,'La Petite Reine', 'Nantes');

-- Création de la table COURSE
CREATE TABLE COURSE (
    id INT NOT NULL,
    libelle CHAR(50) NOT NULL,
    dateCourse DATE NOT NULL,
    ville CHAR(50) NOT NULL,
	CONSTRAINT pk_COURSE PRIMARY KEY (id)
);
INSERT INTO COURSE (id, libelle, dateCourse, ville)
VALUES
    (1,'La Flèche Nantaise', '2025-01-15', 'Nantes'),
    (2,'Grand Prix de l''Erdre', '2025-02-20', 'Nantes'),
    (3,'Boucle de la Sèvre', '2025-03-10', 'Clisson'),
    (4,'Tour de l''Estuaire', '2025-04-05', 'Saint-Nazaire'),
    (5,'Classique du Vignoble', '2025-05-12', 'Nantes'),
    (6,'Boucle des Châteaux', '2025-06-18', 'Ancenis'),
    (7,'Critérium de la Loire', '2025-07-25', 'Nantes'),
    (8,'Tour de la Côte Atlantique', '2025-08-30', 'Pornic');

-- Création de la table PARTICIPER avec les clés étrangères
CREATE TABLE PARTICIPER (
    idCycliste INT NOT NULL,
    idCOURSE INT NOT NULL,
    CONSTRAINT pk_PARTICIPER PRIMARY KEY (idCycliste, idCOURSE),
    CONSTRAINT fk_PARTICIPER_CYCLISTE FOREIGN KEY (idCycliste) REFERENCES CYCLISTE(id),
    CONSTRAINT fk_PARTICIPER_COURSE FOREIGN KEY (idCOURSE) REFERENCES COURSE(id)
);

INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (1, 1), (1, 2), (1, 3);
INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (2, 1), (2, 2), (2, 3);
INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (3, 1), (3, 2), (3, 3), (3, 4);
INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (5, 1), (5, 2), (5, 3), (5, 4), (5, 5);
INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (6, 1), (6, 2), (6, 3);
INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (7, 1), (7, 2), (7, 3), (7, 4);
INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (8, 1), (8, 2), (8, 3);
INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (9, 1), (9, 2), (9, 3), (9, 4);
INSERT INTO PARTICIPER (idCycliste, idCOURSE) VALUES (10, 1), (10, 2), (10, 3), (10, 4), (10, 5);


-- Création de la table COTISATION avec les clés étrangères
CREATE TABLE COTISATION (
    idCycliste INT NOT NULL,
    idClub INT NOT NULL,
    annee INT NOT NULL,
    CONSTRAINT pk_COTISATION PRIMARY KEY (idCycliste, idClub, annee),
    CONSTRAINT fk_COTISATION_CYCLISTE FOREIGN KEY (idCycliste) REFERENCES CYCLISTE(id),
    CONSTRAINT fk_COTISATION_CLUB FOREIGN KEY (idClub) REFERENCES CLUB(id)
);

INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (1, 1, 2023), (1, 1, 2024), (1, 1, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (2, 2, 2024), (2, 2, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (3, 3, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (4, 4, 2023), (4, 4, 2024), (4, 4, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (5, 5, 2024), (5, 5, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (6, 1, 2023), (6, 1, 2024), (6, 1, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (7, 2, 2024), (7, 2, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (8, 3, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (9, 4, 2023), (9, 4, 2024), (9, 4, 2025);
INSERT INTO COTISATION (idCycliste, idClub, annee) VALUES (10, 5, 2024), (10, 5, 2025);

