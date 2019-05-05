CREATE TABLE Admins(
    Id int(8) NOT NULL PRIMARY KEY,
    Email varchar(255) NOT NULL,
    Mdp varchar(255) NOT NULL,
    Nom varchar(255) NOT NULL
);

INSERT INTO Admins (Id, Email, Mdp, Nom) VALUES (10000000,"admin@gmail.com","admin", "AdminPolo");

CREATE TABLE Vendeurs(
    Id int(8) NOT NULL PRIMARY KEY,
    Pseudo varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    Mdp varchar(255) NOT NULL,
    Photo varchar(255),
    FondEcran varchar(255)
);

INSERT INTO Vendeurs (Id, Pseudo, Email, Mdp, Photo, FondEcran) VALUES (20000000,"Aliexpress","ali@gmail.com","ali","ali.jpg","fd.jpeg");
INSERT INTO Vendeurs (Id, Pseudo, Email, Mdp, Photo, FondEcran) VALUES (20000012,"Zara","zara@gmail.com","zara","ZARA Rectangle.png","zarashop-68.jpg");
INSERT INTO Vendeurs (Id, Pseudo, Email, Mdp, Photo, FondEcran) VALUES (20000078,"Decathlon","deca@gmail.com","deca","deca.jpg","fddeca.jpeg");



CREATE TABLE Acheteurs(
  Id int(8) NOT NULL PRIMARY KEY,
  Nom varchar(255) NOT NULL ,
  Prenom varchar(255) NOT NULL ,
  Rue varchar(255) NOT NULL ,
  Ville varchar(255) NOT NULL ,
  CodePostal int(11) NOT NULL ,
  Email varchar(255) NOT NULL ,
  Mdp varchar(255) NOT NULL ,
  NomBancaire varchar(255) NOT NULL ,
  NumeroBancaire bigint(16) NOT NULL ,
  DateExpiration DATE NOT NULL ,
  CryptogrammeBancaire int(4) NOT NULL
);

INSERT INTO Acheteurs (Id, Nom, Prenom, Rue, Ville, CodePostal, Email, Mdp, NomBancaire, NumeroBancaire, DateExpiration, CryptogrammeBancaire) VALUES (30000000,"DUPOND","Jean","10, rue de Villier","Paris",75015,"jean.dupond@gmail.com","jean1234","JEAN DUPOND",1234567809877890, '2020-11-01',123);

INSERT INTO Acheteurs (Id, Nom, Prenom, Rue, Ville, CodePostal, Email, Mdp, NomBancaire, NumeroBancaire, DateExpiration, CryptogrammeBancaire) VALUES (30000001,"GONTRAND","Jacques","123, rue de la République","Levallois-Perret",92300,"jacques.gontrand@gmail.com","jacques1234","JACQUES GONTRAND",0987654312345678, '2021-08-01',456);

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
    Video varchar(255) NOT NULL,
    
    FOREIGN KEY (IdVendeur) REFERENCES Vendeurs(Id)
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
    Video varchar(255) NOT NULL,
    
    FOREIGN KEY (IdVendeur) REFERENCES Vendeurs(Id)
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
    Video varchar(255) NOT NULL,
    
    FOREIGN KEY (IdVendeur) REFERENCES Vendeurs(Id)
);

CREATE TABLE Livres(
    Id int(8) NOT NULL PRIMARY KEY,
    IdVendeur int(8) NOT NULL,
    Nom varchar(255) NOT NULL,
    Prix int(11) NOT NULL,
    Description varchar(255) NOT NULL,
    NombrePage int(11) NOT NULL,
    Auteur varchar(255) NOT NULL,
    Editeur varchar(255) NOT NULL,
    QuantiteVendue int(11) NOT NULL,
    Quantite int(11) NOT NULL,
    Image varchar(255) NOT NULL,
    Video varchar(255) NOT NULL,
    
    FOREIGN KEY (IdVendeur) REFERENCES Vendeurs(Id)
);

CREATE TABLE Panier(
    Id int(8) NOT NULL,
    IdAcheteur int(8) NOT NULL,
    Nom varchar(255) NOT NULL,
    Prix varchar(255) NOT NULL,
    Description varchar(255) NOT NULL,
    Image varchar(255) NOT NULL,
    Quantite int(8) NOT NULL,
    
    FOREIGN KEY (IdAcheteur) REFERENCES Acheteurs(Id)
);


Insert into Vetements (Id, IdVendeur, Nom, Prix, Description, Couleur, Marque, Taille, QuantiteVendue, Quantite, Image, Video) values (40000015, 20000012 , "Pull homme", 98, "Pull coton fabrique en chine comme d habitude", "bleu", "zaro", "s", 26, 524, "pullbleu.jpg","");
Insert into Vetements (Id, IdVendeur, Nom, Prix, Description, Couleur, Marque, Taille, QuantiteVendue, Quantite, Image, Video) values (40000020, 20000012 , "Pull femme", 98, "Pull papier fabrique en chine comme d habitude", "rouge", "zadig", "l", 66, 237, "pullrouge.jpg","");
Insert into Vetements (Id, IdVendeur, Nom, Prix, Description, Couleur, Marque, Taille, QuantiteVendue, Quantite, Image, Video) values (40000103, 20000012 , "Veste Saharienne", 60, "Blouson à col mao, manches longues et poignets boutonnés.", "beige", "zara", "m", 130, 764, "VesteSharrienne.jpg","");
Insert into Vetements (Id, IdVendeur, Nom, Prix, Description, Couleur, Marque, Taille, QuantiteVendue, Quantite, Image, Video) values (40000053, 20000012 , "Costume Femme", 168, "Costume slim fit pour femme", "blanche", "Asos", "S", 783, 1587, "CostumeF.jpg","");


Insert into SportsEtLoisirs (Id, IdVendeur, NomSport, Nom, Prix, Description, Couleur, Marque, QuantiteVendue, Quantite, Image, Video) values (41070002, 20000000 , "Tennis", "Raquette de tennis enfant", 50, "Raquette de tennis pour debutant", "jaune", "Nadou", 634, 211, "raquettejaune.jpg","");
Insert into SportsEtLoisirs (Id, IdVendeur, NomSport, Nom, Prix, Description, Couleur, Marque, QuantiteVendue, Quantite, Image, Video) values (41070012, 20000078 , "Tennis", "Raquette de tennis pro", 344, "Raquette de tennis pour competiteur", "rouge", "fedou", 63, 159, "raquetterouge.jpg","");
Insert into SportsEtLoisirs (Id, IdVendeur, NomSport, Nom, Prix, Description, Couleur, Marque, QuantiteVendue, Quantite, Image, Video) values (41001001, 20000078 , "Football", "Ballon de Foot", 50, "Ballon de Football professionnel", "Neutre", "LFP", 30, 280, "balle.jpeg","");
Insert into SportsEtLoisirs (Id, IdVendeur, NomSport, Nom, Prix, Description, Couleur, Marque, QuantiteVendue, Quantite, Image, Video) values (41030020, 20000000 , "Natation", "Palme de Plonge", 344, "Palme de plongé en silicone", "noir", "scuba-diving", 11, 234, "Palme.jpg","");


Insert into Musiques (Id, IdVendeur, Nom, Prix, Duree, Artiste, Album, Style, Description, QuantiteVendue, Quantite, Image, Video) values (42000015, 20000000 , "Lucky you", 4, 3, "Eminem", "Kamikaze", "Rap", "Musique au format mp3, haute qualité sonore", 846013, 1000000, "eminem.jpg","");
Insert into Musiques (Id, IdVendeur, Nom, Prix, Duree, Artiste, Album, Style, Description, QuantiteVendue, Quantite, Image, Video) values (42000019, 20000078 , "Tout oublier", 3, 4, "Angele", "Brol", "Pop", "Musique au format mp3, haute qualité sonore", 7765434, 721898, "Ttoublie.jpg","");
Insert into Musiques (Id, IdVendeur, Nom, Prix, Duree, Artiste, Album, Style, Description, QuantiteVendue, Quantite, Image, Video) values (42010015, 20000000 , "Deux Frère", 4, 3, "Pnl", "Deux Frère", "Rap", "Musique au format mp3, haute qualité sonore", 8765434, 9082309, "DeuxFrere.jpg","");


Insert into Livres (Id, IdVendeur, Nom, Prix, Description, NombrePage, Auteur, Editeur, QuantiteVendue, Quantite, Image, Video) values (43000011, 20000000 , "Les miserables", 13, "Pauvres et malade, cest la s", 895, "Moliere", "hachette", 562, 777, "miserable.jpg","");
Insert into Livres (Id, IdVendeur, Nom, Prix, Description, NombrePage, Auteur, Editeur, QuantiteVendue, Quantite, Image, Video) values (43589609, 20000012 , "Cabane Magique", 10, "Voyage dans le temps", 120, "Xavier de Caz", "chevava", 1037, 121, "cabanemagique.jpg","");
Insert into Livres (Id, IdVendeur, Nom, Prix, Description, NombrePage, Auteur, Editeur, QuantiteVendue, Quantite, Image, Video) values (43000451, 20000000 , "Biographie Steve Job", 13, "Nous vous prensentons le biographie de l'ancien PDG d'Apple", 632, "Walter Issacson", "Le Livre de Poche", 233, 1098, "SteveJob.jpg","");
Insert into Livres (Id, IdVendeur, Nom, Prix, Description, NombrePage, Auteur, Editeur, QuantiteVendue, Quantite, Image, Video) values (43383633, 20000000 , "Naruto", 11, "Manga Japonais", 60, "Masashi Kishimoto", "Shonen Jump", 203, 608, "Naruto.jpg","");