<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
$book = getBook($sql, $id);
$authors = getAuthors($sql);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $cover = $book["cover"];

    if($_FILES["cover"]["name"] != "") {
        $cover = $_FILES["cover"]["name"];
        move_uploaded_file($_FILES["cover"]["tmp_name"], "uploads/" . $cover);
        $cover = "uploads/" . $cover;
    }

    editBook($sql, $id, $_POST["title"], $_POST["description"], $_POST["year"], $cover, $_POST["author_id"]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1>Edit Book</h1>

    <form method="post" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" name="title" value="<?= $book["title"] ?>">

        <label>Description</label>
        <textarea name="description"><?= $book["description"] ?></textarea>

        <label>Year</label>
        <input type="number" name="year" value="<?= $book["year"] ?>">

        <label>Author</label>
        <select name="author_id">
            <?php foreach($authors as $author): ?>
                <option value="<?= $author["id"] ?>" <?= $author["id"] == $book["author_id"] ? "selected" : "" ?>>
                    <?= $author["name"] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>New cover</label>
        <input type="file" name="cover">

        <button>Save</button>
    </form>
</div>
</body>
</html>
