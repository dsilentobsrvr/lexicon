SELECT word,meang,lang FROM words
WHERE MATCH (word,meang,lang)
AGAINST("english");