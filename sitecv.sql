CREATE TABLE competence (
    libelle varchar(50) UNIQUE,
    logo varchar(200),
    niveau int
);

INSERT INTO competence(libelle, logo, niveau) VALUES('PHP', 'logo/php.png', 10);
INSERT INTO competence(libelle, logo, niveau) VALUES('JavaScript', 'logo/js.png', 20); 
INSERT INTO competence(libelle, logo, niveau) VALUES('HTML5 - CSS3', 'logo/html-css.png', 30); 
INSERT INTO competence(libelle, logo, niveau) VALUES('python', 'logo/python.png', 40);

