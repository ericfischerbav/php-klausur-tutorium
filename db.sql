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

INSERT INTO produkt (name, typ, kategorie, preis) VALUES ('Laptop', 'Computer', 'Elektronik', 150);
INSERT INTO produkt (name, typ, kategorie, preis) VALUES ('Lampe', 'Deko', 'Haus', 30);
INSERT INTO produkt (name, typ, kategorie, preis) VALUES ('Rucksack', 'Kleidung', 'Kleidung', 150);

INSERT INTO komponente (name, produkt, preis) VALUES ('Maus', 'Laptop', 150);
INSERT INTO komponente (name, produkt, preis) VALUES ('Bildschirm', 'Laptop', 150);
INSERT INTO komponente (name, produkt, preis) VALUES ('Tastatur', 'Laptop', 150);

INSERT INTO komponente (name, produkt, preis) VALUES ('Anhaenger', 'Rucksack', 150);
INSERT INTO komponente (name, produkt, preis) VALUES ('Taschenlampe', 'Rucksack', 150);