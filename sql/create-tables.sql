create or replace table authority(
    id INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    website VARCHAR(50) NOT NULL,
    address VARCHAR(150) NOT NULL,
    PRIMARY KEY(id)
);

create or replace table user(
    id INT AUTO_INCREMENT,
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

create or replace table alert(
    id INT AUTO_INCREMENT,
    longitude INT NOT NULL,
    latitude INT NOT NULL,
    type VARCHAR(10) NOT NULL,
    description VARCHAR(200),
    isSolved BOOLEAN NOT NULL,
    PRIMARY KEY(id)
);

create or replace table missing_person(
    id INT AUTO_INCREMENT,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    lastInterraction DATE,
    description VARCHAR(200),
    photo BLOB,
    isSolved BOOLEAN NOT NULL,
    id_user INT NOT NULL,
    id_alert INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id),
    FOREIGN KEY (id_alert) REFERENCES alert(id),
    PRIMARY KEY(id)
);

create or replace table user_alert(
    id INT AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_alert INT NOT NULL,
    FOREIGN KEY (id_alert) REFERENCES alert(id),
    FOREIGN KEY (id_user) REFERENCES user(id),
    PRIMARY KEY(id)
);

create or replace table authority_alert(
    id INT AUTO_INCREMENT,
    id_authority INT NOT NULL,
    id_alert INT NOT NULL,
    FOREIGN KEY (id_alert) REFERENCES alert(id),
    FOREIGN KEY (id_authority) REFERENCES authority(id),
    PRIMARY KEY(id)
);