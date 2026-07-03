<?php
require "db.php";
require "functions.php";
$books = getBooks($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1>Books</h1>

    <div class="grid">
        <?php foreach($books as $book): ?>
            <?php $genres = getGenresByBook($sql, $book["id"]); ?>
            <div class="card">
                <div class="cover-wrap">
                    <?php if($book["cover"] != "" && file_exists($book["cover"])): ?>
                        <img src="<?= $book["cover"] ?>" alt="Book cover">
                    <?php else: ?>
                        No cover
                    <?php endif; ?>
                </div>

                <div class="card-content">
                    <h2><?= $book["title"] ?></h2>

                    <p>Author: <a href="author.php?id=<?= $book["author_id"] ?>"><?= $book["author_name"] ?></a></p>

                    <?php if(isset($book["year"]) && $book["year"] != ""): ?>
                        <p>Year: <?= $book["year"] ?></p>
                    <?php endif; ?>

                    <div>
                        <?php foreach($genres as $genre): ?>
                            <a class="tag" href="genre.php?id=<?= $genre["id"] ?>"><?= $genre["name"] ?></a>
                        <?php endforeach; ?>
                    </div>

                    <div class="card-links">
                        <a class="detail" href="book.php?id=<?= $book["id"] ?>">Detail</a>
                        <a class="manage" href="book_genres.php?id=<?= $book["id"] ?>">Genres</a>
                    </div>
                </div>

                <div class="buttons">
                    <a class="edit" href="book_edit.php?id=<?= $book["id"] ?>">Edit</a>
                    <a class="delete" href="book_delete.php?id=<?= $book["id"] ?>">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
