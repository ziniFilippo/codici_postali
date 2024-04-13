CREATE DATABASE IF NOT EXISTS CODPOST;

USE CODPOST
CREATE TABLE CODICE(
    CAP INT NOT NULL PRIMARY KEY,
    REGIONE CHAR(50),
    PROVINCIA CHAR(50)
);

INSERT INTO CODICE (cap,regione,provincia) VALUES (24050, "Bergamo", "Ghisalba");
INSERT INTO CODICE (cap,regione,provincia) VALUES (24121, "Bergamo", "Bergamo")