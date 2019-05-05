CREATE TABLE Vetements(
    Id int(8) NOT NULL PRIMARY KEY,
    IdVendeur int(8) NOT NULL,
    Nom varchar(255) NOT NULL,
    Prix int(11) NOT NULL,
    Description varchar(255) NOT NULL,
    Couleur varchar(255) NOT NULL,
    Marque varchar(255) NOT NULL,
    Taille varchar(255) NOT NULL,
    QuantiteVendue int(11) NOT NULL,
    Quantite int(11) NOT NULL,
    Image varchar(255) NOT NULL,
    
    FOREIGN KEY (IdVendeur) REFERENCES Vendeurs(IdVendeur)
);

CREATE TABLE SportsEtLoisirs(
    Id int(8) NOT NULL PRIMARY KEY,
    IdVendeur int(8) NOT NULL,
    NomSport varchar(255) NOT NULL,
    Nom varchar(255) NOT NULL,
    Prix int(11) NOT NULL,
    Description varchar(255) NOT NULL,
    Couleur varchar(255) NOT NULL,
    Marque varchar(255) NOT NULL,
    QuantiteVendue int(11) NOT NULL,
    Quantite int(11) NOT NULL,
    Image varchar(255) NOT NULL,
    
    FOREIGN KEY (IdVendeur) REFERENCES Vendeurs(IdVendeur)
);

CREATE TABLE Musiques(
    Id int(8) NOT NULL PRIMARY KEY,
    IdVendeur int(8) NOT NULL,
    Nom varchar(255) NOT NULL,
    Prix int(11) NOT NULL,
    Duree int(11) NOT NULL,
    Artiste varchar(255) NOT NULL,
    Album varchar(255) NOT NULL,
    Style varchar(255) NOT NULL,
    Description varchar(255) NOT NULL,
    QuantiteVendue int(11) NOT NULL,
    Quantite int(11) NOT NULL,
    Image varchar(255) NOT NULL,
    
    FOREIGN KEY (IdVendeur) REFERENCES Vendeurs(IdVendeur)
);

CREATE TABLE Livres(
    Id int(8) NOT NULL PRIMARY KEY,
    IdVendeur int(8) NOT NULL,
    Titre varchar(255) NOT NULL,
    Prix int(11) NOT NULL,
    Description varchar(255) NOT NULL,
    NombrePage int(11) NOT NULL,
    Auteur varchar(255) NOT NULL,
    Editeur varchar(255) NOT NULL,
    QuantiteVendue int(11) NOT NULL,
    Quantite int(11) NOT NULL,
    Image varchar(255) NOT NULL,
    
    FOREIGN KEY (IdVendeur) REFERENCES Vendeurs(IdVendeur)
);

Insert into Vetements (Id, IdVendeur, Nom, Prix, Description, Couleur, Marque, Taille, QuantiteVendue, Quantite, Image) values (28647892, 45679823 , "zara", 98, "pull coton fabrique en chine comme d habitude", "bleu", "zaro", "s", 26, 524, "pullbleu.jpg");
Insert into Vetements (Id, IdVendeur, Nom, Prix, Description, Couleur, Marque, Taille, QuantiteVendue, Quantite, Image) values (54827892, 45612389 , "printemps", 98, "pull papier fabrique en chine comme d habitude", "rouge", "zadig", "l", 66, 237, "pullrouge.jpg");

Insert into SportsEtLoisirs (Id, IdVendeur, NomSport, Nom, Prix, Description, Couleur, Marque, QuantiteVendue, Quantite, Image) values (32198478, 98876521 , "Tennis", "Raquette de tennis enfant", 50, "Raquette de tennis pour debutant", "jaune", "Nadou", 634, 211, "raquettejaune.jpg");
Insert into SportsEtLoisirs (Id, IdVendeur, NomSport, Nom, Prix, Description, Couleur, Marque, QuantiteVendue, Quantite, Image) values (12378956, 95175364 , "Tennis", "Raquette de tennis pro", 344, "Raquette de tennis pour competiteur", "rouge", "fedou", 63, 159, "raquetterouge.jpg");

Insert into Musiques (Id, IdVendeur, Nom, Prix, Duree, Artiste, Album, Style, Description, QuantiteVendue, Quantite, Image) values (65793256, 85296374 , "Lucky you", 4, 3, "Eminem", "Kamikaze", "rap", "Musique au format mp3, haute qualité sonore", 846013, 1000000, "eminem.jpg");
Insert into Musiques (Id, IdVendeur, Nom, Prix, Duree, Artiste, Album, Style, Description, QuantiteVendue, Quantite, Image) values (35974124, 88559742 , "Monster", 4, 4, "Skillet", "Greater", "metal", "Musique au format mp3, haute qualité sonore", 2463156, 1000000, "skillet.jpg");

Insert into Livres (Id, IdVendeur, Titre, Prix, Description, NombrePage, Auteur, Editeur, QuantiteVendue, Quantite, Image) values (51963785, 41528965 , "Les miserables", 13, "Pauvres et malade, cest la s", 895, "Moliere", "hachette", 562, 777, "miserable.jpg");
Insert into Livres (Id, IdVendeur, Titre, Prix, Description, NombrePage, Auteur, Editeur, QuantiteVendue, Quantite, Image) values (74589632, 14528753 , "Cabane Magique", 10, "Voyage dans le temps", 120, "Xavier de Caz", "chevava", 1037, 121, "cabanemagique.jpg");