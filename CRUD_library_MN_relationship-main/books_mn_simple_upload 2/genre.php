<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
$genre = getGenre($sql, $id);
$books = getBooksByGenre($sql, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $genre["name"] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <div class="detail-box">
        <div></div>
        <div>
            <h1><?= $genre["name"] ?></h1>
            <p><?= $genre["description"] ?></p>
        </div>
    </div>

    <h1>Books in this genre</h1>
    <div class="grid">
        <?php foreach($books as $book): ?>
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
                    <div class="card-links">
                        <a class="detail" href="book.php?id=<?= $book["id"] ?>">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
