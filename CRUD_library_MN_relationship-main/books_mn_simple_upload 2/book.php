<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
$book = getBook($sql, $id);
$genres = getGenresByBook($sql, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $book["title"] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <div class="detail-box">
        <div class="cover-wrap">
            <?php if($book["cover"] != "" && file_exists($book["cover"])): ?>
                <img src="<?= $book["cover"] ?>" alt="Book cover">
            <?php else: ?>
                No cover
            <?php endif; ?>
        </div>

        <div>
            <h1><?= $book["title"] ?></h1>
            <p>Author: <a href="author.php?id=<?= $book["author_id"] ?>"><?= $book["author_name"] ?></a></p>

            <?php if(isset($book["year"]) && $book["year"] != ""): ?>
                <p>Year: <?= $book["year"] ?></p>
            <?php endif; ?>

            <p><?= $book["description"] ?></p>

            <h3>Genres</h3>
            <?php foreach($genres as $genre): ?>
                <a class="tag" href="genre.php?id=<?= $genre["id"] ?>"><?= $genre["name"] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>
