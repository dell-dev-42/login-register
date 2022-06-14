CREATE DATABASE db_name_mail_pass;

CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
);

CREATE TABLE countries (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
);

INSERT INTO countries (name) VALUES ('USA');
INSERT INTO countries (name) VALUES ('GB');
INSERT INTO countries (name) VALUES ('Poland');
INSERT INTO countries (name) VALUES ('Germany');




CREATE TABLE weapons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
country_id VARCHAR(30) NOT NULL,
weapon VARCHAR(50) NOT NULL
);

INSERT INTO weapons (name) VALUES ('Javelin');
INSERT INTO weapons (name) VALUES ('NLAW');
INSERT INTO weapons (name) VALUES ('KRAB');
INSERT INTO weapons (name) VALUES ('BTR');

CREATE TABLE results (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id VARCHAR(30) NOT NULL,
country_id VARCHAR(30) NOT NULL,
weapon_id VARCHAR(30) NOT NULL,
amount INT(6) NOT NULL
);

ALTER TABLE
    countries
ADD
    COLUMN user_id VARCHAR(50) NOT NULL
AFTER
    id;

ALTER TABLE
    weapons
ADD
    COLUMN user_id VARCHAR(50) NOT NULL
AFTER
    id;

CREATE TABLE politics (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
);

INSERT INTO politics (politic) VALUES ('Merkel');
INSERT INTO politics (politic) VALUES ('Makaron');
INSERT INTO politics (politic) VALUES ('Zeleboba');
INSERT INTO politics (politic) VALUES ('Bidon');
INSERT INTO politics (politic) VALUES ('Pukin');
INSERT INTO politics (politic) VALUES ('Sholz');
INSERT INTO politics (politic) VALUES ('KisaIzFinlandii');

CREATE TABLE comments (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `politic_id` INT(11) NOT NULL,
    `comment` text NOT NULL
);

ALTER TABLE
    comments
ADD
    COLUMN parent_id INT(6) NOT NULL
AFTER
    id;

ALTER TABLE Comments
ALTER parent_id SET DEFAULT 0;