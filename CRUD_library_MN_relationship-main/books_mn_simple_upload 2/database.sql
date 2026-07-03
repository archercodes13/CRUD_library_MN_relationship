DROP DATABASE IF EXISTS books_mn_simple;
CREATE DATABASE books_mn_simple;
USE books_mn_simple;

CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    bio TEXT,
    photo VARCHAR(255)
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150),
    description TEXT,
    year INT,
    cover VARCHAR(255),
    author_id INT
);

CREATE TABLE genres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT
);

CREATE TABLE book_genre (
    book_id INT,
    genre_id INT,
    PRIMARY KEY (book_id, genre_id)
);

INSERT INTO authors (name, bio, photo) VALUES
('George Orwell', 'English writer known for political and dystopian novels.', ''),
('Franz Kafka', 'Writer known for strange and symbolic stories.', ''),
('William Shakespeare', 'English playwright and poet.', ''),
('Paulo Coelho', 'Brazilian author known for philosophical novels.', ''),
('Milan Kundera', 'Czech-French writer known for novels about memory, love and identity.', '');

INSERT INTO genres (name, description) VALUES
('Dystopian', 'Stories about dark or controlled societies.'),
('Drama', 'Stories focused on conflict and emotions.'),
('Classic', 'Important literary works.'),
('Novella', 'A shorter fictional prose story.'),
('Philosophical fiction', 'Stories focused on meaning, life and ideas.'),
('Political', 'Stories connected with power, society and politics.'),
('Romance', 'Stories focused on love and relationships.'),
('Letter', 'Texts written in the form of a letter.'),
('Absurdism', 'Stories focused on absurd or strange human situations.');

INSERT INTO books (title, description, year, cover, author_id) VALUES
('1984', 'A dystopian novel about surveillance, control and power.', 1949, 'uploads/1984.jpg', 1),
('Animal Farm', 'A political allegory about power and manipulation.', 1945, 'uploads/animal_farm.jpg', 1),
('The Metamorphosis', 'A story about a man who wakes up transformed into an insect.', 1915, 'uploads/the_metamorphosis.jpeg', 2),
('Letter to His Father', 'A personal letter by Franz Kafka.', 1919, 'uploads/letter_to_his_father.jpg', 2),
('Romeo and Juliet', 'A tragedy about two young lovers.', 1597, 'uploads/romeo_and_juliet.jpg', 3),
('The Alchemist', 'A philosophical novel about dreams and personal legend.', 1988, 'uploads/the_alchemist.jpg', 4),
('Laughable Loves', 'A collection of short stories about love and irony.', 1969, 'uploads/laughable_loves.jpeg', 5);

INSERT INTO book_genre (book_id, genre_id) VALUES
(1, 1), (1, 3), (1, 6),
(2, 3), (2, 6),
(3, 3), (3, 4), (3, 9),
(4, 3), (4, 8),
(5, 2), (5, 3), (5, 7),
(6, 3), (6, 5),
(7, 4), (7, 7);
