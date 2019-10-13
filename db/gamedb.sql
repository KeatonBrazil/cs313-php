/* 
CREATE SCHEMA game;
*/

DROP TABLE game.message;
DROP TABLE game.relationship;
DROP TABLE game.post;
DROP TABLE game.member;
DROP TABLE game.gameShelf;
DROP TABLE game.boardGame;
DROP TABLE game.publisher;
DROP TABLE game.image;

CREATE TABLE game.image 
( image_id    SERIAL PRIMARY KEY
, image_text  VARCHAR (150) NOT NULL
, picture     BYTEA NOT NULL
);

CREATE TABLE game.boardGame
( game_id         SERIAL PRIMARY KEY
, title           VARCHAR (100) NOT NULL
, time_length_min INT           NOT NULL 
, complexity      INT           NOT NULL 
);

CREATE TABLE game.publisher
( publisher_id SERIAL PRIMARY KEY
, pub_name   VARCHAR (30) NOT NULL
);

CREATE TABLE game.gameShelf 
( game_shelf_id SERIAL PRIMARY KEY
, game_id       INT NOT NULL REFERENCES game.boardGame(game_id)
, publisher_id  INT NOT NULL REFERENCES game.publisher(publisher_id)
);

CREATE TABLE game.member 
( member_id    SERIAL PRIMARY KEY
, username     VARCHAR (50)   NOT NULL UNIQUE 
, pass_word    VARCHAR (200)  NOT NULL
, first_name   VARCHAR (30)   NOT NULL
, last_name    VARCHAR (30)   NOT NULL
, email        VARCHAR (30)   NOT NULL UNIQUE
, gameShelf_id INT NOT NULL REFERENCES game.gameShelf(game_shelf_id)
);

CREATE TABLE game.post
( post_id    SERIAL PRIMARY KEY 
, comment    VARCHAR (500) 
, time_date  DATE NOT NULL   
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