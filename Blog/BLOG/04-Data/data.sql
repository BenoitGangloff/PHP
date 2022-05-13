USE blog;

SET FOREIGN_KEY_CHECKS=0;

TRUNCATE TABLE article;
TRUNCATE TABLE auteur;
TRUNCATE TABLE blogrole;

SET FOREIGN_KEY_CHECKS=1;

INSERT INTO blogrole(libRol)
VALUES
    ('ADMIN'),
    ('SUPERADMIN'),
    ('AUTEUR'),
    ('VISITEUR');

INSERT INTO auteur(nomAut, preAut, mailAut, pwdAut, dtCreAut, idRol)
VALUES
    ('GANGLOFF', 'Benoît', 'benoit.gangloff@orange.fr','$2y$10$7SULSKgVvvDOl5RD9tjYB.nOXiF7Bjfj5pEe0.9EW1tOf3hH4M59u',
     '2022-04-20 17:00:00.000', 2),
    ('DUPONT', 'Albert', 'albert.dupont@gmail.com', '$2y$10$wnjUQ0mHlNz\/bqQmzknem.MGV6\/1aH6Wxz66ydrDmQK4DvKL6dWCy',
     '2022-04-22 08:12:00.000', 1),
    ('DELAVEGA', 'Bernardo', 'bernardo.delavega@gmail.com', '$2y$10$BnV410lP4oBwwtePfvRr1eme9oe070H2uihoPt4K8VqhwyaruB35.',
     '2022-04-22 11:32:00.000', 3),
    ('DISNEY', 'Walt', 'walt.disney@gmail.com', '$2y$10$11nKs\/.uM0w6J\/FY8DTKDuq2fCIIYtW\/SOhgcoPFHlLb3y1jdbAPC',
     '2022-05-13 15:02:00.000', 3),
    ('ROGERS', 'Buck', 'buck.rogers@gmail.com', '$2y$10$G60MTZajkm8skMq2of\/edOkrVUXtvAkusFUO3HwNB.0B.qfb466E.',
     '2022-05-13 17:14:00.000', 4);

INSERT INTO article(libArt, resArt, txtArt, imgArt, dtCreArt, idAut)
VALUES
    ('Biches', ' Résumé Biches', 'Texte Article Biche', 'deer.jpg', '2022-04-21 10:00:00.000', 3),
    ('Flamingo', 'Résumé Flamingo', 'Texte Article Flamingo', 'flamingo.jpg', '2022-05-02 09:30:00.000', 3),
    ('Cats', 'Résumé Cats', 'Texte Article Cats', 'cats.jpg', '2022-05-10 15:45:00.000', 4);
