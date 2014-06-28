CREATE table words(
word_id mediumint NOT NULL AUTO_INCREMENT,
word VARCHAR(30) NOT NULL,
meang VARCHAR(150) NOT NULL,
lang VARCHAR(20) NOT NULL,
PRIMARY KEY(word_id)
);

//to drop table
DROP TABLE words;

//chnage database engine
ALTER TABLE words ENGINE = MYISAM;

//to implement full text search

ALTER TABLE words
ADD FULLTEXT(word,lang);