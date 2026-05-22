CREATE DATABASE IF NOT EXISTS mydb
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE mydb;

CREATE TABLE IF NOT EXISTS gebruikers (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    voornaam VARCHAR(100) NOT NULL,
    achternaam VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefoon VARCHAR(30) NULL,
    wachtwoord_hash VARCHAR(255) NOT NULL,
    rol ENUM('klant', 'beheerder') NOT NULL DEFAULT 'klant',
    is_actief TINYINT(1) NOT NULL DEFAULT 1,
    aangemaakt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    bijgewerkt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_gebruikers_rol (rol)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS wachtwoord_resets (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gebruiker_id INT UNSIGNED NOT NULL,
    token_hash VARCHAR(255) NOT NULL UNIQUE,
    verloopt_op DATETIME NOT NULL,
    gebruikt_op DATETIME NULL,
    aangemaakt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_wachtwoord_resets_gebruiker
        FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS bestemmingen (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(140) NOT NULL UNIQUE,
    naam VARCHAR(140) NOT NULL,
    stad VARCHAR(140) NOT NULL,
    land VARCHAR(140) NOT NULL,
    korte_beschrijving VARCHAR(255) NOT NULL,
    beschrijving TEXT NOT NULL,
    klimaat VARCHAR(120) NULL,
    highlights TEXT NULL,
    afbeelding VARCHAR(255) NOT NULL DEFAULT 'assets/landingpage.jpg',
    is_actief TINYINT(1) NOT NULL DEFAULT 1,
    aangemaakt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    bijgewerkt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_bestemmingen_naam (naam),
    INDEX idx_bestemmingen_land (land),
    FULLTEXT INDEX ft_bestemmingen_zoeken (naam, stad, land, korte_beschrijving, beschrijving)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reizen (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    bestemming_id INT UNSIGNED NOT NULL,
    titel VARCHAR(160) NOT NULL,
    slug VARCHAR(180) NOT NULL UNIQUE,
    korte_beschrijving VARCHAR(255) NOT NULL,
    beschrijving TEXT NOT NULL,
    vertrek_luchthaven VARCHAR(120) NOT NULL DEFAULT 'Amsterdam Schiphol',
    aankomst_luchthaven VARCHAR(120) NOT NULL,
    vertrekdatum DATE NOT NULL,
    terugkomstdatum DATE NULL,
    duur_dagen SMALLINT UNSIGNED NOT NULL,
    reisklasse ENUM('Economy', 'Premium Economy', 'Business') NOT NULL DEFAULT 'Economy',
    prijs_vanaf DECIMAL(10,2) NOT NULL,
    beschikbare_plekken SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    bagage_inbegrepen VARCHAR(120) NOT NULL DEFAULT 'Handbagage',
    accommodatie VARCHAR(180) NULL,
    afbeelding VARCHAR(255) NOT NULL DEFAULT 'assets/landingpage.jpg',
    status ENUM('concept', 'actief', 'uitverkocht', 'geannuleerd', 'archief') NOT NULL DEFAULT 'actief',
    aangemaakt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    bijgewerkt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_reizen_bestemming
        FOREIGN KEY (bestemming_id) REFERENCES bestemmingen(id)
        ON DELETE RESTRICT,
    INDEX idx_reizen_bestemming (bestemming_id),
    INDEX idx_reizen_status_datum (status, vertrekdatum),
    INDEX idx_reizen_prijs (prijs_vanaf),
    FULLTEXT INDEX ft_reizen_zoeken (titel, korte_beschrijving, beschrijving, aankomst_luchthaven)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS boekingen (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    boekingsnummer VARCHAR(24) NOT NULL UNIQUE,
    gebruiker_id INT UNSIGNED NULL,
    reis_id INT UNSIGNED NULL,
    klant_naam VARCHAR(180) NOT NULL,
    klant_email VARCHAR(255) NOT NULL,
    klant_telefoon VARCHAR(30) NULL,
    aantal_reizigers TINYINT UNSIGNED NOT NULL DEFAULT 1,
    reisklasse ENUM('Economy', 'Premium Economy', 'Business') NOT NULL DEFAULT 'Economy',
    bagage_keuze VARCHAR(120) NOT NULL DEFAULT 'Handbagage',
    totaalprijs DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    status ENUM('aangevraagd', 'bevestigd', 'geannuleerd') NOT NULL DEFAULT 'aangevraagd',
    opmerkingen TEXT NULL,
    aangemaakt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    bijgewerkt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    geannuleerd_op DATETIME NULL,
    CONSTRAINT fk_boekingen_gebruiker
        FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id)
        ON DELETE SET NULL,
    CONSTRAINT fk_boekingen_reis
        FOREIGN KEY (reis_id) REFERENCES reizen(id)
        ON DELETE SET NULL,
    INDEX idx_boekingen_gebruiker (gebruiker_id),
    INDEX idx_boekingen_reis (reis_id),
    INDEX idx_boekingen_status (status),
    INDEX idx_boekingen_email (klant_email)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS extra_opties (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(120) NOT NULL,
    beschrijving VARCHAR(255) NULL,
    prijs DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    prijs_per ENUM('boeking', 'reiziger') NOT NULL DEFAULT 'boeking',
    is_actief TINYINT(1) NOT NULL DEFAULT 1,
    aangemaakt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS boeking_extra_opties (
    boeking_id INT UNSIGNED NOT NULL,
    extra_optie_id INT UNSIGNED NOT NULL,
    aantal SMALLINT UNSIGNED NOT NULL DEFAULT 1,
    prijs_op_moment DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (boeking_id, extra_optie_id),
    CONSTRAINT fk_boeking_extra_opties_boeking
        FOREIGN KEY (boeking_id) REFERENCES boekingen(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_boeking_extra_opties_extra_optie
        FOREIGN KEY (extra_optie_id) REFERENCES extra_opties(id)
        ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS recensies (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reis_id INT UNSIGNED NOT NULL,
    gebruiker_id INT UNSIGNED NULL,
    naam VARCHAR(180) NOT NULL,
    rating TINYINT UNSIGNED NOT NULL,
    titel VARCHAR(160) NULL,
    bericht TEXT NOT NULL,
    status ENUM('in_afwachting', 'goedgekeurd', 'afgekeurd') NOT NULL DEFAULT 'in_afwachting',
    aangemaakt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    bijgewerkt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT chk_recensies_rating CHECK (rating BETWEEN 1 AND 5),
    CONSTRAINT fk_recensies_reis
        FOREIGN KEY (reis_id) REFERENCES reizen(id)
        ON DELETE CASCADE,
    CONSTRAINT fk_recensies_gebruiker
        FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id)
        ON DELETE SET NULL,
    INDEX idx_recensies_reis_status (reis_id, status)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS contact_berichten (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gebruiker_id INT UNSIGNED NULL,
    naam VARCHAR(180) NOT NULL,
    email VARCHAR(255) NOT NULL,
    onderwerp VARCHAR(180) NULL,
    bericht TEXT NOT NULL,
    status ENUM('nieuw', 'gelezen', 'beantwoord') NOT NULL DEFAULT 'nieuw',
    aangemaakt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    beantwoord_op DATETIME NULL,
    CONSTRAINT fk_contact_berichten_gebruiker
        FOREIGN KEY (gebruiker_id) REFERENCES gebruikers(id)
        ON DELETE SET NULL,
    INDEX idx_contact_berichten_status (status),
    INDEX idx_contact_berichten_email (email)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS site_paginas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(120) NOT NULL UNIQUE,
    titel VARCHAR(180) NOT NULL,
    inhoud MEDIUMTEXT NOT NULL,
    bijgewerkt_op DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT IGNORE INTO gebruikers
    (id, voornaam, achternaam, email, telefoon, wachtwoord_hash, rol)
VALUES
    (1, 'Admin', 'Qlawie', 'admin@qlawie.test', NULL, '$2y$10$e0NRJ2lZswXFHULcAE3lBuB8dWcLu1sC5s2KkgcA54lCzUbnZpLna', 'beheerder'),
    (2, 'Test', 'Klant', 'klant@qlawie.test', '0612345678', '$2y$10$e0NRJ2lZswXFHULcAE3lBuB8dWcLu1sC5s2KkgcA54lCzUbnZpLna', 'klant');

INSERT IGNORE INTO bestemmingen
    (id, slug, naam, stad, land, korte_beschrijving, beschrijving, klimaat, highlights, afbeelding)
VALUES
    (1, 'barcelona-citytrip', 'Barcelona citytrip', 'Barcelona', 'Spanje', 'Zon, tapas en een hotel dicht bij het centrum.', 'Ontdek Barcelona met een korte stedentrip vol cultuur, strand en goed eten.', 'Mediterraan', 'Sagrada Familia, Park Guell, La Rambla, Barceloneta', 'assets/landingpage.jpg'),
    (2, 'rome-weekend', 'Rome weekend', 'Rome', 'Italie', 'Een korte reis langs oude gebouwen, pleinen en lekker eten.', 'Een compacte reis naar Rome met tijd voor historie, pleinen en Italiaanse restaurants.', 'Mediterraan', 'Colosseum, Trevifontein, Pantheon, Vaticaanstad', 'assets/landingpage.jpg'),
    (3, 'marrakech-vakantie', 'Marrakech vakantie', 'Marrakech', 'Marokko', 'Warme avonden, markten en een rustig verblijf met ontbijt.', 'Beleef Marrakech met kleurrijke souks, riads en excursies buiten de stad.', 'Warm en droog', 'Jemaa el-Fna, souks, Majorelletuin, Atlasgebergte', 'assets/landingpage.jpg'),
    (4, 'istanbul-cultuurreis', 'Istanbul cultuurreis', 'Istanbul', 'Turkije', 'Een reis tussen Europa en Azie met bazaars, moskeeen en uitzicht over de Bosporus.', 'Istanbul combineert historie, eten en drukke markten in een stad vol contrast.', 'Mild zeeklimaat', 'Hagia Sophia, Blauwe Moskee, Grote Bazaar, Bosporus', 'assets/landingpage.jpg');

INSERT IGNORE INTO reizen
    (id, bestemming_id, titel, slug, korte_beschrijving, beschrijving, aankomst_luchthaven, vertrekdatum, terugkomstdatum, duur_dagen, reisklasse, prijs_vanaf, beschikbare_plekken, bagage_inbegrepen, accommodatie, status)
VALUES
    (1, 1, 'Barcelona citytrip', 'barcelona-citytrip-4-dagen', 'Zon, tapas en een hotel dicht bij het centrum.', 'Vier dagen Barcelona inclusief vlucht, handbagage en hotel in de buurt van het centrum.', 'Barcelona-El Prat', '2026-07-08', '2026-07-11', 4, 'Economy', 299.00, 18, 'Handbagage', '3-sterren hotel centrum', 'actief'),
    (2, 2, 'Rome weekend', 'rome-weekend-3-dagen', 'Een korte reis langs oude gebouwen, pleinen en lekker eten.', 'Drie dagen Rome met retourvlucht en verblijf dichtbij openbaar vervoer.', 'Rome Fiumicino', '2026-08-14', '2026-08-16', 3, 'Economy', 349.00, 12, 'Handbagage', '3-sterren hotel', 'actief'),
    (3, 3, 'Marrakech vakantie', 'marrakech-vakantie-6-dagen', 'Warme avonden, markten en een rustig verblijf met ontbijt.', 'Zes dagen Marrakech met ontbijt en ruimte voor excursies naar de omgeving.', 'Marrakech Menara', '2026-09-03', '2026-09-08', 6, 'Economy', 499.00, 20, 'Handbagage', 'Riad met ontbijt', 'actief'),
    (4, 4, 'Istanbul cultuurreis', 'istanbul-cultuurreis-5-dagen', 'Bazaars, historie en uitzicht over de Bosporus.', 'Vijf dagen Istanbul met vlucht, hotel en vrije tijd voor cultuur en eten.', 'Istanbul Airport', '2026-10-19', '2026-10-23', 5, 'Economy', 429.00, 15, 'Handbagage', '4-sterren hotel', 'actief');

INSERT IGNORE INTO extra_opties
    (id, naam, beschrijving, prijs, prijs_per)
VALUES
    (1, 'Ruimbagage', 'Een koffer van maximaal 23 kg.', 39.00, 'reiziger'),
    (2, 'Extra beenruimte', 'Stoel met meer beenruimte in het vliegtuig.', 24.50, 'reiziger'),
    (3, 'Reisverzekering', 'Kortlopende reisverzekering voor deze boeking.', 19.95, 'boeking'),
    (4, 'Hoteltransfer', 'Vervoer tussen vliegveld en hotel.', 29.00, 'boeking');

INSERT IGNORE INTO boekingen
    (id, boekingsnummer, gebruiker_id, reis_id, klant_naam, klant_email, klant_telefoon, aantal_reizigers, reisklasse, bagage_keuze, totaalprijs, status)
VALUES
    (1, 'QLA-2026-0001', 2, 1, 'Test Klant', 'klant@qlawie.test', '0612345678', 2, 'Economy', 'Ruimbagage', 676.00, 'bevestigd');

INSERT IGNORE INTO boeking_extra_opties
    (boeking_id, extra_optie_id, aantal, prijs_op_moment)
VALUES
    (1, 1, 2, 39.00);

INSERT IGNORE INTO recensies
    (id, reis_id, gebruiker_id, naam, rating, titel, bericht, status)
VALUES
    (1, 1, 2, 'Test Klant', 5, 'Leuke citytrip', 'Duidelijke informatie en een fijne korte reis.', 'goedgekeurd'),
    (2, 3, NULL, 'Sara', 4, 'Mooie bestemming', 'Goede prijs en genoeg informatie over de locatie.', 'in_afwachting');

INSERT IGNORE INTO contact_berichten
    (id, gebruiker_id, naam, email, onderwerp, bericht, status)
VALUES
    (1, NULL, 'Voorbeeld Bezoeker', 'bezoeker@example.com', 'Vraag over bagage', 'Welke bagage zit standaard bij de reis inbegrepen?', 'nieuw');

INSERT IGNORE INTO site_paginas
    (id, slug, titel, inhoud)
VALUES
    (1, 'privacy-policy', 'Privacy policy', 'Qlawie Airlines gebruikt persoonsgegevens alleen voor accounts, boekingen en contactverzoeken. Gegevens worden niet verkocht aan derden.'),
    (2, 'algemene-voorwaarden', 'Algemene voorwaarden', 'Boekingen zijn pas definitief na bevestiging. Annuleren kan volgens de voorwaarden die bij de reis staan vermeld.');
