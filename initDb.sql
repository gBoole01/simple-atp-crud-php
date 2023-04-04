DROP TABLE players;
CREATE TABLE players (
    id INT NOT NULL AUTO_INCREMENT,
    uuid VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    rank INT NOT NULL,
    points INT NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO players (uuid, firstname, lastname, country, age, rank, points) 
VALUES 
('492e5f40-6e89-46a1-86a5-05351ff5fdea', 'Novak', 'Djokovic', 'Serbia', 35, 1, 7160),
('669177c5-ab0d-48e9-93d6-24d3d271b640', 'Carlos', 'Alcaraz', 'Spain', 19, 2,  6780),
('47677f2c-7efb-455f-bc26-dca39f133b39', 'Stefanos', 'Tsitsipas', 'Greece', 24, 3, 5770),
('dba9e4a4-7c1e-4d50-8601-791a73134137', 'Daniil', 'Medevedv', 'Russia', 27, 4, 5150),
('f4807223-9c3d-4077-9a26-fddc593d1418', 'Casper', 'Ruud', 'Norway', 24, 5, 5005),
('71301b0f-57c2-4c9a-8e80-c22d064f9e51', 'Andrey', 'Rublev', 'Russia', 25, 6, 3470),
('694b3c15-27a4-4e1f-9ad9-fcecb9891e83', 'Felix', 'Augier-Aliassime', 'Canada', 22, 7, 3450),
('0b9c45a1-ad83-45d4-b7a6-39d605907646', 'Holger', 'Rune', 'Denmark', 19, 8, 3370),
('4b946db6-011d-40af-a1db-46389141a475', 'Jannik', 'Sinner', 'Italy', 21, 9, 3345),
('e1fae30e-a572-4592-9c67-7c02e3503cf3', 'Taylor', 'Fritz', 'USA', 25, 10, 3065);