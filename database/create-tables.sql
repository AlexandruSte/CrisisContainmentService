create table authority(
    id INT NOT NULL IDENTITY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    website VARCHAR(50) NOT NULL,
    address VARCHAR(150) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
);

create table crisis_user(
    id INT NOT NULL IDENTITY,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    country VARCHAR(20) NOT NULL,
    city VARCHAR(20) NOT NULL,
    zipcode VARCHAR(10) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    PRIMARY KEY(id)
);

create table alert(
    id INT NOT NULL IDENTITY,
    longitude FLOAT NOT NULL,
    latitude FLOAT NOT NULL,
    type VARCHAR(50) NOT NULL,
    description VARCHAR(1000),
    isSolved BIT NOT NULL,
    PRIMARY KEY(id)
);

create table missing_person(
    id INT NOT NULL IDENTITY,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    lastInterraction VARCHAR(200),
    description VARCHAR(200),
    photo IMAGE,
    isSolved BIT NOT NULL,
    id_user INT NOT NULL,
    id_alert INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES crisis_user(id),
    FOREIGN KEY (id_alert) REFERENCES alert(id),
    PRIMARY KEY(id)
);

create table user_alert(
    id INT NOT NULL IDENTITY,
    id_user INT NOT NULL,
    id_alert INT NOT NULL,
    FOREIGN KEY (id_alert) REFERENCES alert(id),
    FOREIGN KEY (id_user) REFERENCES crisis_user(id),
    PRIMARY KEY(id)
);

create table authority_alert(
    id INT NOT NULL IDENTITY,
    id_authority INT NOT NULL,
    id_alert INT NOT NULL,
    FOREIGN KEY (id_alert) REFERENCES alert(id),
    FOREIGN KEY (id_authority) REFERENCES authority(id),
    PRIMARY KEY(id)
);