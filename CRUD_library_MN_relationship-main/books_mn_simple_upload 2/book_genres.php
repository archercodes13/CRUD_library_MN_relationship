<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
$book = getBook($sql, $id);
$genresBook = getGenresByBook($sql, $id);
$genres = getGenres($sql);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    addBookGenre($sql, $id, $_POST["genre_id"]);
    header("Location: book_genres.php?id=" . $id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Genres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1><?= $book["title"] ?> - Genres</h1>

    <h2>Current genres</h2>

    <?php foreach($genresBook as $genre): ?>
        <div class="row">
            <a href="genre.php?id=<?= $genre["id"] ?>"><?= $genre["name"] ?></a>
            <a class="delete" href="book_genre_delete.php?book_id=<?= $id ?>&genre_id=<?= $genre["id"] ?>">Remove</a>
        </div>
    <?php endforeach; ?>

    <h2>Add genre to book</h2>

    <form method="post">
        <label>Genre</label>
        <select name="genre_id">
            <?php foreach($genres as $genre): ?>
                <option value="<?= $genre["id"] ?>"><?= $genre["name"] ?></option>
            <?php endforeach; ?>
        </select>

        <button>Add</button>
    </form>
</div>
</body>
</html>
