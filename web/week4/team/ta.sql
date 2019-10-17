
DROP TABLE notes;
DROP TABLE member;
DROP TABLE speaker;
DROP TABLE conference;

CREATE TABLE member (
    member_id  SERIAL PRIMARY KEY,
    f_name   VARCHAR(50) NOT NULL,
    l_name   VARCHAR(50) NOT NULL
);

CREATE TABLE speaker (
    speaker_id SERIAL PRIMARY KEY,
    f_name     VARCHAR(50) NOT NULL,
    l_name     VARCHAR(50) NOT NULL
);

CREATE TABLE conference (
    conf_id    SERIAL PRIMARY KEY,
    conf_date  DATE NOT NULL
);

CREATE TABLE notes (
    note_id    SERIAL PRIMARY KEY,
    notes      VARCHAR(256) NOT NULL,
    member_id    INT NOT NULL REFERENCES member(member_id),
    speaker_id INT NOT NULL REFERENCES speaker(speaker_id),
    conf_id    INT NOT NULL REFERENCES conference(conf_id)
);