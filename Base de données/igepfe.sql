--
-- Nom de la base de données : IGEPFE
--

-- --------------------------------------------------------------------------------

-- Tableau : articles

DROP TABLE IF EXISTS articles;
CREATE TABLE IF NOT EXISTS articles (
  id int(11) NOT NULL AUTO_INCREMENT,
  libelle varchar(500) NOT NULL,
  echeance date NOT NULL,
  quantite int(11) NOT NULL,
  compagne varchar(300) NOT NULL,
  categorie varchar(300) NOT NULL,
  prix double NOT NULL,
  PRIMARY KEY (id)
);




-- Insertion des articles :

INSERT INTO articles (libelle, echeance, quantite, compagne, categorie, prix) VALUES
('Galaxy S21 5G', '2030-10-31', 2500, 'Samsung', 'Phones', 4500.99),
('IPhone 12 PRO', '2030-05-03', 1200, 'Apple', 'Phones', 6320.80),
('IPhone 11', '2042-6-9', 600, 'Apple', 'Phones', 3200),
('Pixel 4A', '2035-10-31', 630, 'Google', 'Phones', 2350.75),
('Acer Aspire 5 Slim', '2050-9-8', 1300, 'Acer', 'Laptops', 8500.99),
('MacBook Air', '2060-5-5', 300, 'Apple', 'Laptops', 6500.99),
('Velvet 5G', '2030-10-8', 150, 'LG', 'Phones', 1200.99),
('Lenovo Flex 5', '2055-10-31', 960, 'Lenovo', 'Laptops', 6540.25),
('HP 15', '2048-10-8', 600, 'HP', 'Laptops', 5600.85),
('Canon EOS R5 Full-Frame', '2050-5-31', 600, 'Canon', 'Cameras', 6350.99),
('Nikon AF-S Nikkor 50mm', '2048-10-31', 680, 'Nikon', 'Cameras', 3600.25),
('ARTISTE Wireless Headphone', '2030-6-8', 6980, 'NIA', 'Ecouteurs', 300.99);





-- --------------------------------------------------------------------------------

-- Tableau : utilisateurs

DROP TABLE IF EXISTS utilisateurs;
CREATE TABLE IF NOT EXISTS utilisateurs (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(200) NOT NULL,
  password varchar(200) NOT NULL,
  PRIMARY KEY (id)
);




-- Insertion des utilisateurs :

INSERT INTO utilisateurs (username, password) VALUES
('admin', '12345');



