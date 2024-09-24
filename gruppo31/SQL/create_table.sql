DROP TABLE IF EXISTS utente cascade;
DROP TABLE IF EXISTS arredamento cascade;
DROP TABLE IF EXISTS mobile cascade;

/*Creazione tabella utente*/
CREATE TABLE utente(
  email varchar(100) PRIMARY KEY,
  password varchar(255) NOT NULL,
  nome varchar(30),
  cognome varchar(30),
  username varchar(30) NOT NULL,
  sesso char,/*M o F*/
  telefono varchar(10),/*senza numero nazionale*/
  nascita date/* formato gg-mm-aa*/
);

/*Creazione tabella arredamento*/
CREATE TABLE arredamento(
  nome varchar(40) PRIMARY KEY,
  descrizione varchar(1000) NOT NULL,
  foto varchar(200) NOT NULL,
  slogan varchar(100) NOT NULL
);

/*Creazione tabella mobile*/
CREATE TABLE mobile(
  nome_mobile varchar(40),
  nome_arredamento varchar(40),
  descrizione varchar(1000) NOT NULL,
  foto varchar(200) NOT NULL,
  CONSTRAINT mobile_pk PRIMARY KEY (nome_mobile,nome_arredamento),
  CONSTRAINT mobile_fk FOREIGN KEY (nome_arredamento)
  REFERENCES arredamento (nome)
  ON UPDATE CASCADE
  ON DELETE SET NULL
);

/*Creazione tabella commento*/
CREATE TABLE commento(
	username varchar(30),
	testo varchar(1000),
	valutazione int,
	arredamento varchar(40),
	CONSTRAINT commento_pk PRIMARY KEY (username,arredamento),
	CONSTRAINT commento_fk FOREIGN KEY (arredamento)
	REFERENCES arredamento (nome)
	ON UPDATE CASCADE
	ON DELETE SET NULL
);

/*Do tutti i privilegi a www*/
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO postgres;/*www*/
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO postgres;/*www*/
