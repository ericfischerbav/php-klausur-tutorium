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