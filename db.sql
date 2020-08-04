CREATE TABLE generate (
    id int NOT NULL,
    nim int NOT NULL,
    generate varchar(255) NOT NULL,
    vote boolean NOT NULL,
    create_date date NOT NULL,
    PRIMARY KEY (id)
); 

CREATE TABLE vote (
    id int NOT NULL,
    generate_vote varchar(255) NOT NULL,
    vote int NOT NULL,
    create_date date,
    PRIMARY KEY (id)
); 

CREATE TABLE paslon (
    id int NOT NULL,
    nomer_paslon int NOT NULL,
    nama varchar(255) NOT NULL,
    ketua varchar(255) NOT NULL,
    wakil varchar(255) NOT NULL,
    foto varchar(255) NOT NULL,
    create_date date,
    PRIMARY KEY (id)
); 