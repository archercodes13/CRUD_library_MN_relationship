<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
$genre = getGenre($sql, $id);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    editGenre($sql, $id, $_POST["name"], $_POST["description"]);
    header("Location: genres.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Genre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1>Edit Genre</h1>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name" value="<?= $genre["name"] ?>">

        <label>Description</label>
        <textarea name="description"><?= $genre["description"] ?></textarea>

        <button>Save</button>
    </form>
</div>
</body>
</html>
