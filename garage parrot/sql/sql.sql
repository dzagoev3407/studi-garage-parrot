/* Création d'une table employés */

CREATE TABLE garage_employes
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom varchar(150),
    prenom varchar(150),
    email varchar(255),
    mdp varchar(180)
)