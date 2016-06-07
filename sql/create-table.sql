

-- Use your webdev database.
USE webdev;

-- Drop table first.
DROP TABLE IF EXISTS users;

-- Create a table in database.
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR (100) NOT NULL UNIQUE,
    password VARCHAR (256) NOT NULL,
    name VARCHAR (50) NOT NULL
);

-- Use insert to populate the test table
INSERT INTO users (email, password, name) VALUES('snoopy@doghouse.com', 'w00fWOOF', 'Snoopy');
INSERT INTO users (email, password, name) VALUES('charliebrown@doghouse.com', 'w00fWOOF', 'Scooby');
INSERT INTO users (email, password, name) VALUES('lucy@doghouse.com',' iLov3AppleZ','Snow White');


