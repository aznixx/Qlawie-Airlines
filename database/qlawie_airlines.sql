CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

DROP TABLE IF EXISTS wachtwoord_resets;
DROP TABLE IF EXISTS recensies;
DROP TABLE IF EXISTS boekingen;
DROP TABLE IF EXISTS contact_berichten;
DROP TABLE IF EXISTS vluchten;
DROP TABLE IF EXISTS reizen;
DROP TABLE IF EXISTS gebruikers;

CREATE TABLE gebruikers (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    voornaam VARCHAR(100) NOT NULL,
    achternaam VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefoon VARCHAR(30),
    rol ENUM('klant','beheerder') NOT NULL DEFAULT 'klant',
    wachtwoord VARCHAR(255)
);

CREATE TABLE reizen (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(160) NOT NULL,
    korte_beschrijving VARCHAR(255) NOT NULL,
    beschrijving TEXT NOT NULL,
    vertrek_luchthaven VARCHAR(120) NOT NULL,
    aankomst_luchthaven VARCHAR(120) NOT NULL,
    vertrekdatum DATE NOT NULL,
    terugkomstdatum DATE,
    duur_dagen SMALLINT UNSIGNED NOT NULL,
    reisklasse ENUM('Economy','Premium Economy','Business') NOT NULL,
    prijs_vanaf DECIMAL(10,2) NOT NULL,
    beschikbare_plekken SMALLINT UNSIGNED NOT NULL,
    bagage_inbegrepen VARCHAR(120) NOT NULL,
    afbeelding VARCHAR(255) NOT NULL
);

CREATE TABLE vluchten (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vertrek_luchthaven VARCHAR(100) NOT NULL,
    aankomst_luchthaven VARCHAR(100) NOT NULL,
    vertrek_datum DATE NOT NULL,
    aankomst_datum DATE NOT NULL,
    prijs DECIMAL(10,2) NOT NULL,
    stoelen INT NOT NULL,
    vlucht_nummer VARCHAR(50) NOT NULL,
    afbeelding VARCHAR(255)
);

CREATE TABLE boekingen (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    boekingsnummer VARCHAR(24) NOT NULL UNIQUE,
    gebruiker_id INT UNSIGNED,
    reis_id INT UNSIGNED,
    klant_naam VARCHAR(180) NOT NULL,
    klant_email VARCHAR(255) NOT NULL,
    klant_telefoon VARCHAR(30),
    aantal_reizigers TINYINT UNSIGNED NOT NULL DEFAULT 1,
    reisklasse ENUM('Economy','Premium Economy','Business') NOT NULL DEFAULT 'Economy',
    bagage_keuze VARCHAR(120) NOT NULL DEFAULT 'Handbagage',
    totaalprijs DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    status ENUM('aangevraagd','bevestigd','geannuleerd') NOT NULL DEFAULT 'aangevraagd',
    opmerkingen TEXT,
    vlucht_id INT,
    FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id) ON DELETE SET NULL,
    FOREIGN KEY (reis_id) REFERENCES reizen(id) ON DELETE SET NULL,
    FOREIGN KEY (vlucht_id) REFERENCES vluchten(id)
);

CREATE TABLE recensies (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reis_id INT UNSIGNED NOT NULL,
    gebruiker_id INT UNSIGNED,
    naam VARCHAR(180) NOT NULL,
    rating TINYINT UNSIGNED NOT NULL,
    bericht TEXT NOT NULL,
    status ENUM('in_afwachting','goedgekeurd','afgekeurd') NOT NULL DEFAULT 'in_afwachting',
    FOREIGN KEY (reis_id) REFERENCES reizen(id) ON DELETE CASCADE,
    FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id) ON DELETE SET NULL
);

CREATE TABLE contact_berichten (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(180) NOT NULL,
    email VARCHAR(255) NOT NULL,
    onderwerp VARCHAR(180),
    bericht TEXT NOT NULL,
    status ENUM('nieuw','gelezen','beantwoord') NOT NULL DEFAULT 'nieuw'
);

CREATE TABLE wachtwoord_resets (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gebruiker_id INT UNSIGNED NOT NULL,
    gebruikt_op DATETIME,
    tijdelijkeKey INT,
    FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id) ON DELETE CASCADE
);

INSERT INTO gebruikers (voornaam, achternaam, email, telefoon, rol, wachtwoord) VALUES
('Admin', 'Qlawie', 'admin@qlawie.test', NULL, 'beheerder', 'admin'),
('Klant', 'Qlawie', 'klant@qlawie.test', '0612345678', 'klant', 'klant');

INSERT INTO reizen (titel, korte_beschrijving, beschrijving, vertrek_luchthaven, aankomst_luchthaven, vertrekdatum, terugkomstdatum, duur_dagen, reisklasse, prijs_vanaf, beschikbare_plekken, bagage_inbegrepen, afbeelding) VALUES
('Barcelona citytrip', 'Een korte reis naar Barcelona.', 'Bezoek Barcelona en geniet van strand, stad en cultuur.', 'Amsterdam Schiphol', 'Barcelona-El Prat', '2026-07-12', '2026-07-16', 4, 'Economy', 299.00, 20, 'Handbagage', 'assets/barcelona.jpg'),
('Rome weekend', 'Een weekend naar Rome.', 'Bekijk oude gebouwen, pleinen en lekker eten in Rome.', 'Amsterdam Schiphol', 'Rome Fiumicino', '2026-08-02', '2026-08-05', 3, 'Economy', 349.00, 18, 'Handbagage', 'assets/rome.jpg'),
('Marrakech vakantie', 'Een warme vakantie naar Marrakech.', 'Ontdek markten, eten en cultuur in Marrakech.', 'Amsterdam Schiphol', 'Marrakech Menara', '2026-09-10', '2026-09-17', 7, 'Premium Economy', 499.00, 15, 'Ruimbagage', 'assets/marrakech.jpg'),
('Istanbul cultuurreis', 'Een cultuurreis naar Istanbul.', 'Bekijk de stad, de bazaars en de bekende moskeeen.', 'Amsterdam Schiphol', 'Istanbul Airport', '2026-10-05', '2026-10-11', 6, 'Economy', 429.00, 16, 'Handbagage', 'assets/istanbul.jpg');

INSERT INTO vluchten (vertrek_luchthaven, aankomst_luchthaven, vertrek_datum, aankomst_datum, prijs, stoelen, vlucht_nummer, afbeelding) VALUES
('Amsterdam Schiphol', 'Barcelona El Prat', '2026-07-12', '2026-07-12', 129.00, 80, 'QL202', 'assets/barcelona.jpg'),
('Amsterdam Schiphol', 'Marrakech Menara', '2026-07-15', '2026-07-15', 199.00, 70, 'QL303', 'assets/marrakech.jpg'),
('Amsterdam Schiphol', 'Istanbul Airport', '2026-07-18', '2026-07-18', 179.00, 75, 'QL404', 'assets/istanbul.jpg');

INSERT INTO recensies (reis_id, gebruiker_id, naam, rating, bericht, status) VALUES
(1, 2, 'Klant Qlawie', 5, 'Duidelijke informatie en een fijne reis.', 'goedgekeurd'),
(2, NULL, 'Sara', 4, 'Goede prijs en genoeg informatie over de locatie.', 'goedgekeurd');
