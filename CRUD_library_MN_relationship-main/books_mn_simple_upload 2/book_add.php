<?php
require "db.php";
require "functions.php";
$authors = getAuthors($sql);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $cover = $_FILES["cover"]["name"];

    if($cover != "") {
        move_uploaded_file($_FILES["cover"]["tmp_name"], "uploads/" . $cover);
        $cover = "uploads/" . $cover;
    }

    addBook($sql, $_POST["title"], $_POST["description"], $_POST["year"], $cover, $_POST["author_id"]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1>Add Book</h1>

    <form method="post" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" name="title">

        <label>Description</label>
        <textarea name="description"></textarea>

        <label>Year</label>
        <input type="number" name="year">

        <label>Author</label>
        <select name="author_id">
            <?php foreach($authors as $author): ?>
                <option value="<?= $author["id"] ?>"><?= $author["name"] ?></option>
            <?php endforeach; ?>
        </select>

        <label>Cover</label>
        <input type="file" name="cover">

        <button>Add</button>
    </form>
</div>
</body>
</html>
