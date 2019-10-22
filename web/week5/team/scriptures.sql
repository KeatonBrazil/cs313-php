DROP TABLE scr.link;
DROP TABLE scr.topics;
DROP TABLE scr.scriptures;
DROP SCHEMA scr;

CREATE SCHEMA scr;

CREATE TABLE scr.scriptures
( id SERIAL PRIMARY KEY
, book VARCHAR (50) NOT NULL
, chapter INT NOT NULL
, verse INT NOT NULL
, content VARCHAR NOT NULL 
);

CREATE TABLE scr.topics
( topic_id SERIAL PRIMARY KEY
, topic VARCHAR (50) NOT NULL
);

CREATE TABLE scr.link
( link_id SERIAL PRIMARY KEY
, topic_id INT NOT NULL REFERENCES scr.topics(topic_id)
, scr_id INT NOT NULL REFERENCES scr.scriptures(id)
);

INSERT INTO scr.scriptures 
(book, chapter, verse, content) VALUES ('John', 1, 5, 'And the alight shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scr.scriptures 
(book, chapter, verse, content) VALUES ('Doctrine and Covenants', 88, 49, 'The alight shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scr.scriptures 
(book, chapter, verse, content) VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth btruth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO scr.scriptures 
(book, chapter, verse, content) VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

INSERT INTO scr.topics (topic) VALUES ('Faith');
INSERT INTO scr.topics (topic) VALUES ('Sacrifice');
INSERT INTO scr.topics (topic) VALUES ('Charity');






