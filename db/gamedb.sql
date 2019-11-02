/* 
CREATE SCHEMA game;
*/

DROP TABLE game.message;
DROP TABLE game.relationship;
DROP TABLE game.post;
DROP TABLE game.requestBG; 
DROP TABLE game.requestG;
DROP TABLE game.requestP;
DROP TABLE game.collection;
DROP TABLE game.gameShelf;
DROP TABLE game.boardGame;
DROP TABLE game.member;
DROP TABLE game.game;
DROP TABLE game.publisher;
DROP TABLE game.image;

CREATE TABLE game.member 
( member_id    SERIAL PRIMARY KEY
, username     VARCHAR (50)   NOT NULL UNIQUE 
, pass_word    VARCHAR (250)  NOT NULL
, first_name   VARCHAR (50)   NOT NULL
, last_name    VARCHAR (50)   NOT NULL
, email        VARCHAR (50)   NOT NULL UNIQUE
);

CREATE TABLE game.image 
( image_id    SERIAL PRIMARY KEY
, image_text  VARCHAR (150) NOT NULL
, picture     BYTEA NOT NULL
);

CREATE TABLE game.game
( game_id         SERIAL PRIMARY KEY
, title           VARCHAR  NOT NULL
, time_length_min INT      NOT NULL 
, complexity      NUMERIC  NOT NULL 
, num_players     INT      NOT NULL
);

CREATE TABLE game.publisher
( publisher_id SERIAL PRIMARY KEY
, pub_name     VARCHAR  NOT NULL
);

CREATE TABLE game.boardGame 
( boardGame_id SERIAL PRIMARY KEY
, game_id       INT NOT NULL REFERENCES game.game(game_id)
, publisher_id  INT NOT NULL REFERENCES game.publisher(publisher_id) 
);

CREATE TABLE game.gameShelf 
( shelf_id SERIAL PRIMARY KEY
, member_id INT NOT NULL REFERENCES game.member(member_id) UNIQUE 
);

CREATE TABLE game.collection 
( collection_id SERIAL PRIMARY KEY
, shelf_id      INT NOT NULL REFERENCES game.gameShelf(shelf_id)
, boardGame_id  INT NOT NULL REFERENCES game.boardGame(boardGame_id)
);

CREATE TABLE game.requestG
( requestG_id SERIAL PRIMARY KEY
, title           VARCHAR  NOT NULL
, time_length_min INT      
, complexity      NUMERIC      
, num_players     INT 
, member_id       INT    NOT NULL REFERENCES game.member(member_id)     
);

CREATE TABLE game.requestP
( requestP_id SERIAL PRIMARY KEY
, pub_name    VARCHAR NOT NULL
, member_id       INT    NOT NULL REFERENCES game.member(member_id)
);

CREATE TABLE game.requestBG
( requestBG_id SERIAL PRIMARY KEY
, descript        VARCHAR  
, stat            INT    NOT NULL
, requestG_id     INT    NOT NULL REFERENCES game.requestG(requestG_id)
, requestP_id     INT    NOT NULL REFERENCES game.requestP(requestP_id)
, member_id       INT    NOT NULL REFERENCES game.member(member_id)
);

CREATE TABLE game.post
( post_id    SERIAL PRIMARY KEY 
, comment    VARCHAR (500) 
, post_time  TEXT NOT NULL 
, post_date  DATE NOT NULL  
, image_id   INT REFERENCES game.image(image_id)  
, member_id  INT NOT NULL REFERENCES game.member(member_id)  
);

CREATE TABLE game.relationship 
( relationship_id SERIAL PRIMARY KEY
, member_one_id   INT NOT NULL UNIQUE REFERENCES game.member(member_id)
, member_two_id   INT NOT NULL UNIQUE 
, r_status        INT NOT NULL 
, action_user_id  INT NOT NULL
);

CREATE TABLE game.message
( message_id      SERIAL PRIMARY KEY
, message_text    VARCHAR (500)  
, image_id        INT REFERENCES game.image(image_id)
, relationship_id INT NOT NULL REFERENCES game.relationship(relationship_id)
);


INSERT INTO game.member (username, pass_word, email, first_name, last_name) VALUES ('Admin', '$2y$10$g9T59b.l815ftxRh9FcbqOSvjPGTBWQ3zXRW1uP3Xm3XneQ8FtwEy', 'san16072@byui.edu', 'Keaton', 'Sant');
INSERT INTO game.gameShelf (member_id) VALUES (1);

INSERT INTO game.member (username, pass_word, email, first_name, last_name) VALUES ('THEBANANABOAT', '$2y$10$yO6RJNtowcJb0tQdieIAV.D0vqzgjR9bB2.RHFlKuQt1yhjsMw/um', 'hanrich9@gmail.com', 'Hannah', 'Sant');
INSERT INTO game.gameShelf (member_id) VALUES (2);

INSERT INTO game.game (title, time_length_min, complexity, num_players) VALUES ('Roll For The Galaxy', 45, 6, 5);
INSERT INTO game.publisher (pub_name) VALUES ('Rio Grande Games');
INSERT INTO game.boardGame (game_id, publisher_id) VALUES (1, 1);
INSERT INTO game.collection (shelf_id, boardGame_id) VALUES (1, 1);

INSERT INTO game.game (title, time_length_min, complexity, num_players) VALUES ('Terraforming Mars', 120, 8, 5);
INSERT INTO game.publisher (pub_name) VALUES ('Stronghold Games');
INSERT INTO game.publisher (pub_name) VALUES ('Fry X Games');
INSERT INTO game.boardGame (game_id, publisher_id) VALUES (2, 2);
INSERT INTO game.boardGame (game_id, publisher_id) VALUES (2, 3);
INSERT INTO game.collection (shelf_id, boardGame_id) VALUES (1, 2);