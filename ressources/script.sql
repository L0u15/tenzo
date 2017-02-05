DROP TABLE IF EXISTS UTILISATEURS;
CREATE TABLE UTILISATEURS(
	id 				INT 			NOT NULL	PRIMARY KEY		AUTO_INCREMENT,
	login 			VARCHAR(100) 	NOT NULL,
	password 		VARCHAR(255) 	NOT NULL
);

DROP TABLE IF EXISTS RECETTES;
CREATE TABLE RECETTES(
	id 				INT				NOT NULL	PRIMARY KEY	AUTO_INCREMENT,
	nom 			VARCHAR(100) 	NOT NULL,
	utilisateur_id	INT				NOT NULL	REFERENCES UTILISATEURS(id)
);

DROP TABLE IF EXISTS UNITES;
CREATE TABLE UNITES(
	id 				INT 			NOT NULL	PRIMARY KEY		AUTO_INCREMENT,
	nom 			VARCHAR(100)	NOT NULL
);

DROP TABLE IF EXISTS AGENDAS;
CREATE TABLE AGENDAS(
	id 				INT 			NOT NULL	PRIMARY KEY		AUTO_INCREMENT,
	nom 			VARCHAR(100) 	NOT NULL 	DEFAULT 'Agenda'
);

DROP TABLE IF EXISTS MENUS;
CREATE TABLE MENUS(
	id 				INT				NOT NULL	PRIMARY KEY	AUTO_INCREMENT,
	jour 			DATE			NOT NULL,
	agenda_id		INT				NOT NULL	REFERENCES AGENDA(id)
);

DROP TABLE IF EXISTS PRODUITS;
CREATE TABLE PRODUITS(
	id 				INT				NOT NULL	PRIMARY KEY	AUTO_INCREMENT,
	nom				VARCHAR(100) 	NOT NULL,
	unite_id		INT				NOT NULL 	REFERENCES UNITES(id)
);

DROP TABLE IF EXISTS BESOINS;
CREATE TABLE BESOINS(
	id 				INT 			NOT NULL	PRIMARY KEY		AUTO_INCREMENT,
	produit_id 		INT				NOT NULL	REFERENCES PRODUITS(id),
	recette_id 		INT				NOT NULL	REFERENCES RECETTES(id),
	quantite		DECIMAL(5,2)			NOT NULL	DEFAULT 0
);

INSERT INTO UTILISATEURS (login,password) VALUES
('test','51abb9636078defbf888d8457a7c76f85c8f114c'), /* mdp : testtest */
('tenzo','cb1c6c38d222ca4ae949b74cf1297f4d44ba749b'); /* mdp : tenzo */

INSERT INTO RECETTES (nom,utilisateur_id) VALUES
('soupe aux potirons',1),
('omelette',2);

INSERT INTO UNITES (nom) VALUES
('kilo'),
('litre'),
('centilitre'),
('pièce'),
('gramme');

INSERT INTO PRODUITS (nom,unite_id) VALUES
('carottes',1),
('eau',2),
('lait de soja',3),
('potiron',4),
('oignon',4),
('pomme de terre',1);


INSERT INTO BESOINS (produit_id,recette_id,quantite) VALUES
(4,1,5),
(2,1,1),
(5,1,2),
(6,1,0.5);