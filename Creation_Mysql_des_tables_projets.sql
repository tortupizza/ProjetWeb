CREATE TABLE Entreprise(
   ID int NOT NULL AUTO_INCREMENT,
   Nom VARCHAR(50),
   Secteur_d_activite VARCHAR(50),
   Note DECIMAL(15,2),
   Stagiaire_CESI_acceptes INT,
   Confiance_du_pilote INT,
   Localite VARCHAR(50),
   PRIMARY KEY(ID)
);

CREATE TABLE Offre_de_stage(
   ID int NOT NULL AUTO_INCREMENT,
   Duree INT,
   Date_de_creation DATE,
   Competence VARCHAR(50),
   types_de_promotions_concernees VARCHAR(50),
   base_de_remuneration VARCHAR(50),
   nombre_de_places VARCHAR(50),
   ID_Entreprise INT NOT NULL,
   PRIMARY KEY(ID),
   FOREIGN KEY(ID_Entreprise) REFERENCES Entreprise(ID)
);

CREATE TABLE Utilisateur(
   ID int NOT NULL AUTO_INCREMENT,
   Nom VARCHAR(50),
   Prenom VARCHAR(50),
   Username VARCHAR(50),
   MDP VARCHAR(50),
   PRIMARY KEY(ID)
);

CREATE TABLE Delegue(
   ID int NOT NULL AUTO_INCREMENT,
   Droits BOOLEAN,
   ID_Utilisateur INT NOT NULL,
   PRIMARY KEY(ID),
   UNIQUE(ID_Utilisateur),
   FOREIGN KEY(ID_Utilisateur) REFERENCES Utilisateur(ID)
);

CREATE TABLE Administrateur(
   ID int NOT NULL AUTO_INCREMENT,
   ID_Utilisateur INT NOT NULL,
   PRIMARY KEY(ID),
   UNIQUE(ID_Utilisateur),
   FOREIGN KEY(ID_Utilisateur) REFERENCES Utilisateur(ID)
);

CREATE TABLE Pilote(
   ID VARCHAR(50),
   ID_Utilisateur INT NOT NULL,
   PRIMARY KEY(ID),
   UNIQUE(ID_Utilisateur),
   FOREIGN KEY(ID_Utilisateur) REFERENCES Utilisateur(ID)
);

CREATE TABLE Promotion(
   ID int NOT NULL AUTO_INCREMENT,
   Centre VARCHAR(50),
   Nom VARCHAR(50),
   ID_Pilote VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID),
   FOREIGN KEY(ID_Pilote) REFERENCES Pilote(ID)
);

CREATE TABLE etudiant(
   ID int NOT NULL AUTO_INCREMENT,
   ID_Promotion INT NOT NULL,
   ID_Utilisateur INT NOT NULL,
   PRIMARY KEY(ID),
   UNIQUE(ID_Utilisateur),
   FOREIGN KEY(ID_Promotion) REFERENCES Promotion(ID),
   FOREIGN KEY(ID_Utilisateur) REFERENCES Utilisateur(ID)
);

CREATE TABLE Candidature(
   ID_Offre_de_stage INT,
   ID_Etudiant INT,
   etape INT,
   CV TEXT,
   lettre_de_motivation TEXT,
   Fiche_de_validation TEXT,
   Convention_de_stage TEXT,
   PRIMARY KEY(ID_Offre_de_stage, ID_Etudiant),
   FOREIGN KEY(ID_Offre_de_stage) REFERENCES Offre_de_stage(ID),
   FOREIGN KEY(ID_Etudiant) REFERENCES etudiant(ID)
);

CREATE TABLE Wish(
   ID_Offre_de_stage INT,
   ID_Etudiant INT,
   PRIMARY KEY(ID_Offre_de_stage, ID_Etudiant),
   FOREIGN KEY(ID_Offre_de_stage) REFERENCES Offre_de_stage(ID),
   FOREIGN KEY(ID_Etudiant) REFERENCES etudiant(ID)
);

CREATE TABLE dirige_D(
   ID_Promotion INT,
   ID_Delegue INT,
   PRIMARY KEY(ID_Promotion, ID_Delegue),
   FOREIGN KEY(ID_Promotion) REFERENCES Promotion(ID),
   FOREIGN KEY(ID_Delegue) REFERENCES Delegue(ID)
);
