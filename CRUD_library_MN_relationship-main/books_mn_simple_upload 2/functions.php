<?php

function getBooks($sql) {
    return $sql->query("
        SELECT books.*, authors.name AS author_name
        FROM books
        JOIN authors ON books.author_id = authors.id
        ORDER BY books.id DESC
    ")->fetchAll();
}

function getBook($sql, $id) {
    $stmt = $sql->prepare("
        SELECT books.*, authors.name AS author_name, authors.bio AS author_bio, authors.photo AS author_photo
        FROM books
        JOIN authors ON books.author_id = authors.id
        WHERE books.id = ?
    ");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addBook($sql, $title, $description, $year, $cover, $author_id) {
    $stmt = $sql->prepare("
        INSERT INTO books (title, description, year, cover, author_id)
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->execute([$title, $description, $year, $cover, $author_id]);
}

function editBook($sql, $id, $title, $description, $year, $cover, $author_id) {
    $stmt = $sql->prepare("
        UPDATE books
        SET title = ?, description = ?, year = ?, cover = ?, author_id = ?
        WHERE id = ?
    ");
    $stmt->execute([$title, $description, $year, $cover, $author_id, $id]);
}

function deleteBook($sql, $id) {
    $stmt = $sql->prepare("DELETE FROM book_genre WHERE book_id = ?");
    $stmt->execute([$id]);

    $stmt = $sql->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$id]);
}

function getAuthors($sql) {
    return $sql->query("SELECT * FROM authors ORDER BY name")->fetchAll();
}

function getAuthor($sql, $id) {
    $stmt = $sql->prepare("SELECT * FROM authors WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getBooksByAuthor($sql, $author_id) {
    $stmt = $sql->prepare("
        SELECT books.*, authors.name AS author_name
        FROM books
        JOIN authors ON books.author_id = authors.id
        WHERE books.author_id = ?
        ORDER BY books.title
    ");
    $stmt->execute([$author_id]);
    return $stmt->fetchAll();
}

function addAuthor($sql, $name, $bio, $photo) {
    $stmt = $sql->prepare("INSERT INTO authors (name, bio, photo) VALUES (?, ?, ?)");
    $stmt->execute([$name, $bio, $photo]);
}

function editAuthor($sql, $id, $name, $bio, $photo) {
    $stmt = $sql->prepare("UPDATE authors SET name = ?, bio = ?, photo = ? WHERE id = ?");
    $stmt->execute([$name, $bio, $photo, $id]);
}

function deleteAuthor($sql, $id) {
    $stmt = $sql->prepare("DELETE FROM authors WHERE id = ?");
    $stmt->execute([$id]);
}

function getGenres($sql) {
    return $sql->query("SELECT * FROM genres ORDER BY name")->fetchAll();
}

function getGenre($sql, $id) {
    $stmt = $sql->prepare("SELECT * FROM genres WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getGenresByBook($sql, $book_id) {
    $stmt = $sql->prepare("
        SELECT genres.*
        FROM genres
        JOIN book_genre ON genres.id = book_genre.genre_id
        WHERE book_genre.book_id = ?
        ORDER BY genres.name
    ");
    $stmt->execute([$book_id]);
    return $stmt->fetchAll();
}

function getBooksByGenre($sql, $genre_id) {
    $stmt = $sql->prepare("
        SELECT books.*, authors.name AS author_name
        FROM books
        JOIN book_genre ON books.id = book_genre.book_id
        JOIN authors ON books.author_id = authors.id
        WHERE book_genre.genre_id = ?
        ORDER BY books.title
    ");
    $stmt->execute([$genre_id]);
    return $stmt->fetchAll();
}

function addGenre($sql, $name, $description) {
    $stmt = $sql->prepare("INSERT INTO genres (name, description) VALUES (?, ?)");
    $stmt->execute([$name, $description]);
}

function editGenre($sql, $id, $name, $description) {
    $stmt = $sql->prepare("UPDATE genres SET name = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $description, $id]);
}

function deleteGenre($sql, $id) {
    $stmt = $sql->prepare("DELETE FROM book_genre WHERE genre_id = ?");
    $stmt->execute([$id]);

    $stmt = $sql->prepare("DELETE FROM genres WHERE id = ?");
    $stmt->execute([$id]);
}

function addBookGenre($sql, $book_id, $genre_id) {
    $stmt = $sql->prepare("INSERT IGNORE INTO book_genre (book_id, genre_id) VALUES (?, ?)");
    $stmt->execute([$book_id, $genre_id]);
}

function deleteBookGenre($sql, $book_id, $genre_id) {
    $stmt = $sql->prepare("DELETE FROM book_genre WHERE book_id = ? AND genre_id = ?");
    $stmt->execute([$book_id, $genre_id]);
}
?>
