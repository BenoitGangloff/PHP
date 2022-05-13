USE blog;

DROP TABLE IF EXISTS article;
DROP TABLE IF EXISTS auteur;
DROP TABLE IF EXISTS blogrole;

CREATE TABLE blogrole
(
    idRol   INT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
    libRol  VARCHAR(10) NOT NULL,
    PRIMARY KEY (idRol)
) ENGINE=InnoDB;

CREATE TABLE auteur
(
    idAut       INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
    nomAut      VARCHAR(25) NOT NULL,
    preAut      VARCHAR(25) NOT NULL,
    mailAut     VARCHAR(65) NOT NULL,
    pwdAut      VARCHAR(60) NOT NULL,
    dtCreAut    DATETIME NOT NULL,
    idRol       INT(2) UNSIGNED NOT NULL,
    PRIMARY KEY (idAut),
    CONSTRAINT fk_role
    FOREIGN KEY (idRol)
        REFERENCES blogrole(idRol)
) ENGINE=InnoDB;

CREATE TABLE article
(
    idArt       INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
    libArt      VARCHAR(100) NOT NULL,
    resArt      VARCHAR(500) NOT NULL,
    txtArt      LONGTEXT NOT NULL,
    imgArt      VARCHAR (255),
    dtCreArt    DATETIME NOT NULL,
    idAut       INT(3) UNSIGNED NOT NULL,
    PRIMARY KEY (idArt),
    CONSTRAINT fk_auteur
        FOREIGN KEY (idAut)
            REFERENCES auteur(idAut)
) ENGINE=InnoDB;
