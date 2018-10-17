DROP TABLE IF EXISTS reklamation;
DROP TABLE IF EXISTS komponente;
DROP TABLE IF EXISTS produkt;
DROP TABLE IF EXISTS reklamateur;

CREATE TABLE produkt (
	name VARCHAR(100) PRIMARY KEY,
	typ VARCHAR(100),
	kategorie VARCHAR(100),
	preis INT
);

CREATE TABLE komponente (
	name VARCHAR(100) PRIMARY KEY,
	produkt VARCHAR(100),
	preis INT,
	FOREIGN KEY (produkt) REFERENCES produkt(name)
);

CREATE TABLE reklamateur (
	id VARCHAR(10) PRIMARY KEY,
	name VARCHAR(100),
	tel VARCHAR(100),
	anschrift VARCHAR(200)
);

CREATE TABLE reklamation (
	id VARCHAR(10) PRIMARY KEY,
	produkt VARCHAR(100),
	komponente VARCHAR(100),
	reklamateur VARCHAR(10),
	datum VARCHAR(100),
	FOREIGN KEY (produkt) REFERENCES produkt(name),
	FOREIGN KEY (komponente) REFERENCES komponente(name),
	FOREIGN KEY (reklamateur) REFERENCES reklamateur(id)
);

INSERT INTO produkt (name, typ, kategorie, preis) VALUES ('Laptop', 'Computer', 'Elektronik', 150);
INSERT INTO produkt (name, typ, kategorie, preis) VALUES ('Lampe', 'Deko', 'Haus', 30);
INSERT INTO produkt (name, typ, kategorie, preis) VALUES ('Rucksack', 'Kleidung', 'Kleidung', 150);

INSERT INTO komponente (name, produkt, preis) VALUES ('Maus', 'Laptop', 150);
INSERT INTO komponente (name, produkt, preis) VALUES ('Bildschirm', 'Laptop', 150);
INSERT INTO komponente (name, produkt, preis) VALUES ('Tastatur', 'Laptop', 150);

INSERT INTO komponente (name, produkt, preis) VALUES ('Anhaenger', 'Rucksack', 150);
INSERT INTO komponente (name, produkt, preis) VALUES ('Taschenlampe', 'Rucksack', 150);