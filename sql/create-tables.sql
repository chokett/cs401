

-- Use your webdev database.
USE webdev;

-- Drop table first.
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS comments;

-- Create a table in database.
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR (100) NOT NULL UNIQUE,
    password VARCHAR (256) NOT NULL,
    name VARCHAR (50) NOT NULL,
    age VARCHAR (4) DEFAULT 0,
	permission VARCHAR (100) NOT NULL
);

-- Use insert to populate the test table
INSERT INTO users (email, password, name, age, permission) VALUES('snoopy@doghouse.com', 'w00fWOOF', 'Snoopy', 18, 'user');
INSERT INTO users (email, password, name, age, permission) VALUES('charliebrown@doghouse.com', 'w00fWOOF', 'Scooby', 23, 'user');
INSERT INTO users (email, password, name, age, permission) VALUES('lucy@doghouse.com',' iLov3AppleZ','Snow White', 15, 'admin');
INSERT INTO users (email, password, name, age, permission) VALUES('charliebrown@doghouse2.com', 'w00fWOOF', 'charliebrown', 23, 'user');

CREATE TABLE comments (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	comment VARCHAR(255) NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO comments (user_id, created, comment) VALUES(
	(SELECT id FROM users WHERE name = 'charliebrown'), '2015-09-13 12:30:10', 'This is great');



CREATE TABLE posts (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	message VARCHAR (255) NOT NULL,
	posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO posts (user_id, message, posted) VALUES(
	(SELECT id FROM users WHERE name = 'charliebrown'), 'That''s the secret to life... replace one worry with another...', '2015-09-13 12:30:10');


