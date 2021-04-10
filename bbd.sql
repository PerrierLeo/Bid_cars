CREATE TABLE users (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
),

CREATE TABLE bid (
    user_id FOREIGN KEY,
    ad_id FOREIGN KEY,
    amount_bid DECIMAL(10,2) NOT NULL
),

CREATE TABLE ads (
    ID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    date_ad DATE DEFAULT CURRENT_DATE, 
    start_price DECIMAL(10,2) NOT NULL,
    deadline DATE NOT NULL,
    brand VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    year DATE NOT NULL,
    color VARCHAR(255) NOT NULL,
    power INT NOT NULL,
    kilometers INT NOT NULL,
    picture_url VARCHAR(255) DEFAULT'https://cdn.discordapp.com/attachments/809783606791634954/830388124114878474/Pas_dimage_disponible.svg.png',
    description TEXT NOT NULL
);