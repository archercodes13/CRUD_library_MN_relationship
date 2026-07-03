<?php
require "db.php";
require "functions.php";
$authors = getAuthors($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1>Authors</h1>
    <a class="add" href="author_add.php">Add Author</a>

    <?php foreach($authors as $author): ?>
        <div class="row">
            <a href="author.php?id=<?= $author["id"] ?>"><?= $author["name"] ?></a>
            <div>
                <a class="edit" href="author_edit.php?id=<?= $author["id"] ?>">Edit</a>
                <a class="delete" href="author_delete.php?id=<?= $author["id"] ?>">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
