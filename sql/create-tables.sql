

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
    age VARCHAR (4) DEFAULT 0
);

-- Use insert to populate the test table
INSERT INTO users (email, password, name, age) VALUES('snoopy@doghouse.com', 'w00fWOOF', 'Snoopy', 18);
INSERT INTO users (email, password, name, age) VALUES('charliebrown@doghouse.com', 'w00fWOOF', 'charliebrown', 23);
INSERT INTO users (email, password, name, age) VALUES('lucy@doghouse.com',' iLov3AppleZ','Snow White', 15);
INSERT INTO users (email, password, name, age) VALUES('poca@doghouse.com',' iLovAppleZ','princesspocahontas', 15);
INSERT INTO users (email, password, name, age) VALUES('buggs@gmail.com',' iLoApfecsdspleZ','bugsbunny', 15);
INSERT INTO users (email, password, name, age) VALUES('blackwidow@doghouse.com',' iLoppleZ','blackwidow', 15);
INSERT INTO users (email, password, name, age) VALUES('fredflintstone@doghouse.com',' iLopphsaleZ','fredflintstone', 15);

CREATE TABLE comments (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	name VARCHAR (50) NOT NULL,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	comment VARCHAR(255) NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO comments (user_id, created, comment) VALUES(
	(SELECT id FROM users WHERE name = 'charliebrown'), '2015-09-13 12:30:10', 'This is great');



CREATE TABLE posts (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	name VARCHAR (50) NOT NULL,
	message VARCHAR (255) NOT NULL,
	posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO posts (user_id, message, posted) VALUES(
	(SELECT id FROM users WHERE name = 'charliebrown'), 'That''s the secret to life... replace one worry with another...', '2015-09-13 12:30:10');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE name = 'princesspocahontas'), 'Good grief Charlie Brown!', '2015-09-14 8:32:10');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE name='bugsbunny'), 'whats up doc?', '2015-09-15 18:18:03');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE name='snoopy'), 'woof! woof! woof!', '2015-09-15 22:55:21');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE name='blackwidow'), 'Don''t let the door hit you in the back on the way out.', '2015-09-17 22:55:21');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE name='blackwidow'), 'Ha! I see you have a sword! I have one too!', '2015-09-18 06:05:18');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE name='snoopy'), 'woof! woof!', '2015-09-14 11:18:03');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE name='blackwidow'), 'Who is that?', '2015-09-23 01:04:51');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE name='fredflintstone'), 'Yabba Dabba Doo!!', '2015-09-18 09:16:18');


