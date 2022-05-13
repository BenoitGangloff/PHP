SELECT      idArt, libArt, txTArt, dtCreArt
FROM        article
ORDER BY    dtCreArt;

SELECT      idAut, nomAut, preAut
FROM        auteur
ORDER BY    nomAut ASC, preAut ASC;

SELECT      idArt, libArt, txtArt, dtCreArt
FROM        article
WHERE       idArt = 3;

SELECT      idAUt, nomAut, preAut
FROM        auteur
WHERE       idAu = 2;

SELECT      idArt, libArt, txtArt, dtCreArt
FROM        article
ORDER By    dtCreArt DESC
LIMIT       3;

SELECT      aut.idAut, aut.nomAut, aut.preAut, art.idArt, art.libArt, art.txtArt, art.dtCreArt
FROM        auteur aut
INNER JOIN  article art ON art.idAut = aut.idArt
WHERE       aut.idAut = 3;

SELECT      aut.nomAut, aut.preAut, COUNT(art.idArt)
FROM        auteur aut
INNER JOIN  article art ON art.idAut = aut.idAut
GROUP BY    aut.nomAut, aut.preAut;

SELECT      aut.nomAut, aut.preAut, COUNT(art.idArt)
FROM        auteur aut
INNER JOIN  article art ON art.idAut = aut.idAut
GROUP BY    aut.nomAut, aut.preAut
ORDER BY    COUNT(art.idArt) DESC
LIMIT 1;

DELETE
FROM    article art
WHERE   idArt = 3;

UPDATE  article
SET     libArt = "Blablabla"
WHERE   idArt = 3;

