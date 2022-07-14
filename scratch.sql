CREATE TABLE IF NOT EXISTS articles (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(128),
    content VARCHAR(128),
    publication_date DATE
);
