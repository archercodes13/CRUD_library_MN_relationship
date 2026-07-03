<?php
require "db.php";
require "functions.php";
$genres = getGenres($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Genres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1>Genres</h1>
    <a class="add" href="genre_add.php">Add Genre</a>

    <?php foreach($genres as $genre): ?>
        <div class="row">
            <a href="genre.php?id=<?= $genre["id"] ?>"><?= $genre["name"] ?></a>
            <div>
                <a class="edit" href="genre_edit.php?id=<?= $genre["id"] ?>">Edit</a>
                <a class="delete" href="genre_delete.php?id=<?= $genre["id"] ?>">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
