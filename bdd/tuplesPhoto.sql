CREATE TABLE IF NOT EXISTS Categorie(
  catId INTEGER PRIMARY KEY,
  nomCat VARCHAR(250) NOT NULL
);

CREATE TABLE IF NOT EXISTS Photo(
  photoId INTEGER PRIMARY KEY,
  nomFich VARCHAR(250) NOT NULL,
  description VARCHAR(250) NOT NULL,
  catId INTEGER,
  FOREIGN KEY (catId) REFERENCES Categorie(catId)
);

CREATE TABLE IF NOT EXISTS Utilisateur(
  pseudo VARCHAR(250) NOT NULL PRIMARY KEY,
  mdp VARCHAR(250) NOT NULL,
  etat VARCHAR(250) NOT NULL,
  role VARCHAR(250) NOT NULL
);

INSERT INTO Categorie VALUES ('1',"Animaux");
INSERT INTO Categorie VALUES ('2',"Autres");


INSERT INTO Photo VALUES ('1',"DSC00011.jpg","perroquet", '1');
INSERT INTO Photo VALUES ('2',"DSC01212.jpg","chien", '1');
INSERT INTO Photo VALUES ('3',"DSC01422.jpg","dauphin", '1');
INSERT INTO Photo VALUES ('4',"DSC01446.jpg","chèvre", '1');
INSERT INTO Photo VALUES ('5',"DSC01040.jpg","nourriture bonne", '2');
INSERT INTO Photo VALUES ('6',"DSC01280.jpg","monument", '2');
