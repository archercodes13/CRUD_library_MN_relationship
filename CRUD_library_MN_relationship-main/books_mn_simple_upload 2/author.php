<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
$author = getAuthor($sql, $id);
$books = getBooksByAuthor($sql, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $author["name"] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <div class="detail-box">
        <div class="cover-wrap">
            <?php if($author["photo"] != "" && file_exists($author["photo"])): ?>
                <img src="<?= $author["photo"] ?>" alt="Author photo">
            <?php else: ?>
                No photo
            <?php endif; ?>
        </div>

        <div>
            <h1><?= $author["name"] ?></h1>
            <p><?= $author["bio"] ?></p>
        </div>
    </div>

    <h1>Books by this author</h1>
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
                    <?php if(isset($book["year"]) && $book["year"] != ""): ?>
                        <p>Year: <?= $book["year"] ?></p>
                    <?php endif; ?>
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
