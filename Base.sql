Create database article6;

Create table admin(
	id SERIAL PRIMARY key,	
	email varchar(50),
	motdepasse varchar(50)
);

CREATE TABLE Categorie (
	id SERIAL PRIMARY KEY,
	categorie varchar(100) NOT NULL UNIQUE
);

CREATE TABLE Article (
	id SERIAL PRIMARY KEY,
	titre varchar(100),
	resume TEXT,
	CategorieId int REFERENCES Categorie(id),
	Contenu TEXT,
	photo_name text ,
   photo_path text 
);

INSERT INTO Categorie (categorie) VALUES
('Image'),
('automatisation'),
('Pratique'),
('Robotisation');


INSERT INTO Article (titre, resume, CategorieId, Contenu,photo_name,photo_path) VALUES 
('IA faible (ou etroite) : egalement appelee IA specialisee, 
', 'IA faible est conçue pour accomplir une tache specifique',2
,'<h1>Ce type dIA ne possède pas d intelligence générale 
et ne peut pas résoudre des problèmes en dehors de son domaine
 d expertise.</h1>','photo.jpg','fqlqellbe'),
('La dernière innovation technologique', 'Cette innovation technologique révolutionnaire va changer la façon dont nous vivons', 4, 'La dernière innovation technologique est une plateforme de réalité virtuelle avancée qui permet aux utilisateurs de s immerger complètement dans un environnement virtuel.'),
('La politique de l éducation en France', 'Une analyse approfondie de la politique de l éducation en France', 1, 'Le système éducatif en France est un sujet de débat constant. Dans cet article, nous allons examiner les politiques gouvernementales qui ont un impact sur l éducation en France.'),
('Comment améliorer sa santé mentale', 'Dans cet article, nous allons discuter des méthodes pour améliorer votre bien-être mental', 5, 'La santé mentale est tout aussi importante que la santé physique. Dans cet article, nous allons explorer des moyens pour améliorer votre bien-être mental et émotionnel.'),
('La culture gastronomique française', 'La France est connue pour sa gastronomie raffinée et variée. Dans cet article, nous allons explorer la culture gastronomique française', 3, 'La cuisine française est célèbre dans le monde entier pour sa sophistication et sa qualité. Dans cet article, nous allons explorer les plats les plus célèbres de la cuisine française.');


ALTER TABLE Article ADD COLUMN slug varchar(50);

CREATE OR REPLACE VIEW V_Article AS
SELECT Article.id,titre,resume,categorie,Contenu,slug FROM Article 
JOIN Categorie
ON Article.CategorieId = Categorie.id;
<
update article set titre='IA faible / etroite /IA specialisee' , contenu ='Ce type dIA ne possède pas d intelligence générale 
et ne peut pas résoudre des problèmes en dehors de son domaine
d expertise.'
,resume='IA faible est conçue pour accomplir une tache specifique';

