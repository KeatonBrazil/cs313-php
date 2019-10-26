/* 
CREATE SCHEMA game;
*/

DROP TABLE game.message;
DROP TABLE game.relationship;
DROP TABLE game.post;
DROP TABLE game.requestBG; 
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
, first_name   VARCHAR (30)   NOT NULL
, last_name    VARCHAR (30)   NOT NULL
, email        VARCHAR (30)   NOT NULL UNIQUE
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
, complexity      INT      NOT NULL 
, num_players     INT      NOT NULL
);

CREATE TABLE game.publisher
( publisher_id SERIAL PRIMARY KEY
, pub_name   VARCHAR (30) NOT NULL
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

CREATE TABLE game.requestBG 
( requestBG_id SERIAL PRIMARY KEY
, title           VARCHAR  NOT NULL
, time_length_min INT      NOT NULL 
, complexity      INT      NOT NULL
, pub_name        VARCHAR (50) NOT NULL
, stat            INT      NOT NULL
, member_id       INT      NOT NULL REFERENCES game.member(member_id)
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


